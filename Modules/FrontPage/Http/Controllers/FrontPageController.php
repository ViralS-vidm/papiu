<?php

namespace Modules\FrontPage\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Modules\Cms\Entities\ConfigCms;
use Modules\Cms\Entities\ImageCms;
use Modules\Cms\Entities\MetaCms;
use Modules\Cms\Entities\VideoCms;
use Modules\FrontPage\Services\Contracts\FrontPageServiceInterface;

class FrontPageController extends Controller
{
    /**
     * @var FrontPageServiceInterface
     */
    private $frontPageService;

    public function __construct(FrontPageServiceInterface $frontPageService)
    {
        $this->middleware('setTheme:papiu');
        $this->frontPageService = $frontPageService;
        $metas = MetaCms::all();
        $configs = ConfigCms::all();
        $images = ImageCms::get();
        $logos = ImageCms::with('imageCms')->whereIn('key', [ImageCms::KEY_SITE_LOGO, ImageCms::KEY_SITE_LOGO_WHITE,
            ImageCms::KEY_SITE_BACKGROUND])->get();
        $configMeta = [];
        $configCms = [];
        $logoCms = [];
        foreach ($metas as $meta) {
            $configMeta[$meta->key] = [
                'description' => $meta->description,
                'title' => $meta->title,
                'key_word' => $meta->key_word,
                'tag' => $meta->tag,
            ];
        }
        foreach ($configs as $config) {
            $configCms[$config->key] = $config;
        }
        foreach ($logos as $logo) {
            $logoCms[$logo->key] = $logo;
        }
        View::share('configCmsFontPage', $configMeta);
        View::share('configCms', $configCms);
        View::share('imageCms', $images);
        View::share('logoCms', $logoCms);
    }

    /**
     * /**
     * Homepage.
     * @return Response
     */
    public function home()
    {
        return view('frontpage::index', $this->frontPageService->getDataHome());
    }

    /**
     * Product List.
     * @return Response
     */
    public function productList()
    {
        return view('frontpage::product-list', $this->frontPageService->getDataProductList());
    }

    /**
     * Product Detail.
     * @return Response
     */
    public function productDetail($id)
    {
        return view('frontpage::product-detail', $this->frontPageService->getDetailProduct($id));
    }

    /**
     * Introduction.
     * @return Response
     */
    public function introduction()
    {
        return view('frontpage::introduction', $this->frontPageService->getDataIntroduce());
    }

    /**
     * Expericence.
     * @return Response
     */
    public function offers()
    {
        return view('frontpage::offer', $this->frontPageService->getDataOffer());
    }

    /**
     * Book.
     * @param Request $request
     * @return Response
     */
    public function offerConfirmPersonal(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('frontpage.offer');
        }

        return view('frontpage::offer-confirm-personal', $this->frontPageService->getDataOfferConfirm($request->except(['_token', '_method'])));
    }

    /**
     * Book.
     * @param Request $request
     * @return Response
     */
    public function offerConfirm(Request $request)
    {
        return view('frontpage::offer-confirm-done', $this->frontPageService->offerConfirm($request->all()));
    }

    /**
     * Contact.
     * @return Response
     */
    public function contact()
    {
        return view('frontpage::contact');
    }

    /**
     * condition.
     * @return Response
     */
    public function condition()
    {
        return view('frontpage::condition');
    }

    /**
     * @param Request $request
     * @return Factory|\Illuminate\View\View
     */
    public function createContact(Request $request)
    {
        $this->frontPageService->createContact($request->except(['_token', '_method']));

        return view('frontpage::contact-create-done');
    }

    /**
     * Agency.
     * @return Response
     */
    public function agency()
    {
        return view('frontpage::agency');
    }


    /**
     * @param Request $request
     * @return Factory|\Illuminate\View\View
     */
    public function createAgency(Request $request)
    {
        $this->frontPageService->createAgency($request->except(['_token', '_method']));

        return view('frontpage::agency-create-done');
    }

    /**
     * Policy.
     * @return Response
     */
    public function policy()
    {
        return view('frontpage::policy');
    }

    /**
     * Search Result.
     * @return Response
     */
    public function searchResult()
    {
        return view('frontpage::search-result');
    }

    /**
     * Book.
     * @return Response
     */
    public function book()
    {
        return view('frontpage::book');
    }

    /**
     * Book.
     * @return Factory|\Illuminate\View\View
     */
    public function service()
    {
        return view('frontpage::service', $this->frontPageService->getDataService());
    }

    /**
     * Book.
     * @param Request $request
     * @return Response
     */
    public function serviceConfirmPersonal(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('frontpage.service');
        }

        return view('frontpage::service-confirm-personal', $this->frontPageService->getDataServiceConfirm($request->except(['_token', '_method'])));
    }

    /**
     * Book.
     * @param Request $request
     * @return Response
     */
    public function serviceConfirm(Request $request)
    {
        return view('frontpage::service-confirm-done', $this->frontPageService->serviceConfirm($request->except(['_token', '_method'])));
    }


    /**
     * Gallery.
     * @return Response
     */
    public function gallery()
    {
        $videos = VideoCms::all();
        return view('frontpage::gallery', compact('videos'));
    }

    /**
     * Book-List.
     * @param Request $request
     * @return Response
     */
    public function bookList(Request $request)
    {
        $timeStart = Carbon::create($request->get('time_start'));
        $timeEnd = Carbon::create($request->get('time_end'));
        $diff = $timeEnd->diffInDays($timeStart);

        return view('frontpage::booking-list', $this->frontPageService->getDataBookingList($request->except(['_token', '_method'])))->withDiff($diff);
    }


    /**
     * Confirm Personal.
     * @return Response
     */
    public function confirmPersonalView()
    {
        return redirect()->route('frontpage.booking-list');
    }

    /**
     * Confirm Personal.
     * @param Request $request
     * @return Response
     */
    public function confirmPersonal(Request $request)
    {
        try {
            return view('frontpage::confirm-personal', $this->frontPageService->getDataConfirmPersonal($request->except(['_token', '_method'])));
        } catch (\Exception $e) {
            return redirect()->route('frontpage.booking-list');
        }
    }

    /**
     * Done Book.
     * @return Response
     */
    public function doneBookView()
    {
        return redirect()->route('frontpage.booking-list');
    }

    /**
     * Done Book.
     * @param Request $request
     * @return Response
     */
    public function doneBook(Request $request)
    {
        return view('frontpage::booking-done', $this->frontPageService->confirmPersonal($request->except(['_token', '_method'])));
    }
}
