<?php


namespace Modules\FrontPage\Services;


use App\Mail\BookingDone;
use Illuminate\Support\Facades\Mail;
use Modules\Agency\Repositories\Contracts\AgencyRepositoryInterface;
use Modules\Booking\Entities\Booking;
use Modules\Booking\Events\OfferRequestCreatedEvent;
use Modules\Booking\Events\ServiceRequestCreatedEvent;
use Modules\Booking\Repositories\Contracts\OfferRequestRepositoryInterface;
use Modules\Booking\Repositories\Contracts\ServiceRequestRepositoryInterface;
use Modules\Booking\Services\Contracts\BookingServiceInterface;
use Modules\Cms\Entities\ConfigCms;
use Modules\Cms\Entities\ImageCms;
use Modules\Cms\Repositories\Contracts\ConfigCmsRepositoryInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Feedback\Repositories\FeedbackRepository;
use Modules\FrontPage\Repositories\Contracts\PapiuRepositoryInterface;
use Modules\FrontPage\Repositories\Contracts\SpecialExperienceRepositoryInterface;
use Modules\FrontPage\Services\Contracts\FrontPageServiceInterface;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;
use Modules\Product\Services\Contracts\ProductServiceInterface;
use Modules\Service\Entities\Service;
use Modules\Service\Repositories\Contracts\OfferRepositoryInterface;
use Modules\Service\Repositories\Contracts\ServiceRepositoryInterface;

class FrontPageService implements FrontPageServiceInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var PapiuRepositoryInterface
     */
    private $papiuRepository;
    /**
     * @var SpecialExperienceRepositoryInterface
     */
    private $specialExperienceRepository;
    /**
     * @var ServiceRepositoryInterface
     */
    private $serviceRepository;
    /**
     * @var ProductServiceInterface
     */
    private $productService;
    /**
     * @var BookingServiceInterface
     */
    private $bookingService;
    /**
     * @var ServiceRequestRepositoryInterface
     */
    private $serviceRequestRepository;
    /**
     * @var ConfigCmsRepositoryInterface
     */
    private $configCmsRepository;
    /**
     * @var OfferRepositoryInterface
     */
    private $offerRepository;
    /**
     * @var OfferRequestRepositoryInterface
     */
    private $offerRequestRepository;
    /**
     * @var FeedbackRepository
     */
    private $feedbackRepository;
    /**
     * @var AgencyRepositoryInterface
     */
    private $agencyRepository;

    public function __construct(PapiuRepositoryInterface $papiuRepository,
                                ProductRepositoryInterface $productRepository,
                                SpecialExperienceRepositoryInterface $specialExperienceRepository,
                                ServiceRepositoryInterface $serviceRepository,
                                ProductServiceInterface $productService,
                                BookingServiceInterface $bookingService,
                                ServiceRequestRepositoryInterface $serviceRequestRepository,
                                ConfigCmsRepositoryInterface $configCmsRepository,
                                OfferRepositoryInterface $offerRepository,
                                OfferRequestRepositoryInterface $offerRequestRepository,
                                FeedbackRepository $feedbackRepository,
                                AgencyRepositoryInterface $agencyRepository)
    {
        $this->papiuRepository = $papiuRepository;
        $this->productRepository = $productRepository;
        $this->specialExperienceRepository = $specialExperienceRepository;
        $this->serviceRepository = $serviceRepository;
        $this->productService = $productService;
        $this->bookingService = $bookingService;
        $this->serviceRequestRepository = $serviceRequestRepository;
        $this->configCmsRepository = $configCmsRepository;
        $this->offerRepository = $offerRepository;
        $this->offerRequestRepository = $offerRequestRepository;
        $this->feedbackRepository = $feedbackRepository;
        $this->agencyRepository = $agencyRepository;
    }

    /**
     * @return array
     */
    public function getDataProductList()
    {
        $papiu = $this->papiuRepository->with('images')->get()->first();
        $products = $this->productRepository->all();
        $specialExperience = $this->specialExperienceRepository->all();

        return compact('papiu', 'products', 'specialExperience');
    }

    /**
     * @param $id
     * @return array
     */
    public function getDetailProduct($id)
    {
        $products = $this->productRepository->all();
        $product = $products->firstWhere('id', $id);
        $otherProducts = $products->whereNotIn('id', [$id]);
        $papiu = $this->papiuRepository->with('images')->get()->first();
        $services = $this->serviceRepository->servicesPublic();

        return compact('papiu', 'product', 'services', 'otherProducts');
    }

    /**
     * @return array
     */
    public function getDataHome()
    {
        $papiu = $this->papiuRepository->with('images')->get()->first();
        $products = $this->productRepository->all()->sortByDesc('id');
        $offers = $this->offerRepository->all();
        $config = ConfigCms::where('type', ConfigCms::TYPE_SERVICE_CMS)->get()->pluck('value', 'key');

        return compact('papiu', 'products', 'offers', 'config');
    }

    /**
     * @param $params
     * @return array
     */
    public function getDataBookingList($params)
    {
        $products = $this->productService->findFree($params);
        $services = $this->serviceRepository->servicesPublic();
        $products = $products->map(function ($product) use ($params) {
            $params['product_id'] = $product->id;
            $product->current_price = format_currency($this->bookingService->handlePrice($params)['total_price']);

            return $product;
        });

        return compact('products', 'services');
    }

    /**
     * @param $params
     * @return
     */
    public function getDataConfirmPersonal($params)
    {
        if (is_array($params['services'])) $params['services'] = implode(',', $params['services']);

        return $params;
    }

    /**
     * @param $params
     * @return array
     */
    public function confirmPersonal($params)
    {
        if ($params['services']) {
            $params['services'] = explode(',', $params['services']);
        }
        $params['status'] = Booking::STATUS_NEW;
        $booking = $this->bookingService->create($params);
        $statusMail = ConfigCms::where('key', ConfigCms::KEY_MAIL_CONTENT_CMS)->first();
        if ($statusMail->status == ConfigCms::STATUS_ENABLE) {
            Mail::to($booking->contact_email)->send(new BookingDone($booking));
        }
        $params['services_combo'] = $booking->services->implode('name', ', ');
        $params['url_home'] = @$booking->product->homeImage->first()->original_url;

        return $params;
    }

    /**
     * @return array
     */
    public function getDataService()
    {
        $services = Service::publish()->get();
        $slides = ImageCms::with('imageCms')->where('key', ImageCms::KEY_SERVICE_CMS)->get();
        $config = ConfigCms::where('type', ConfigCms::TYPE_SERVICE_CMS)->get()->pluck('value', 'key');

        return compact('services', 'slides', 'config');

    }

    /**
     * @param $params
     * @return array
     * @throws RepositoryException
     */
    public function serviceConfirm($params)
    {
        $service = $this->serviceRequestRepository->create($params);
        event(new ServiceRequestCreatedEvent());

        $params['url_home'] = @$service->service->homeImage->first()->original_url;

        return $params;
    }

    /**
     * @param $params
     * @return array
     */
    public function getDataServiceConfirm($params)
    {
        return $params;
    }

    /**
     *
     */
    public function getDataIntroduce()
    {
        $config = $this->configCmsRepository->getModel()->type(ConfigCms::TYPE_INTRODUCE_CMS)->get();

        return compact('config');
    }

    /**
     * @return array
     */
    public function getDataOffer()
    {
        $offers = $this->offerRepository->all();

        return compact('offers');
    }

    /**
     * @param $params
     * @return mixed
     */
    public function getDataOfferConfirm($params)
    {
        return $params;
    }

    /**
     * @param $params
     * @return mixed
     * @throws RepositoryException
     */
    public function offerConfirm($params)
    {
        $offer = $this->offerRequestRepository->create($params);
        event(new OfferRequestCreatedEvent());

        $params['url_home'] = @$offer->offer->homeImage->first()->original_url;

        return $params;
    }

    /**
     * @param $param
     * @throws RepositoryException
     */
    public function createContact($param)
    {
        $this->feedbackRepository->create($param);

        return $param;
    }

    /**
     * @param $param
     * @throws RepositoryException
     */
    public function createAgency($param)
    {
        $this->agencyRepository->create($param);

        return $param;
    }
}
