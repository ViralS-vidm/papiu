<?php

namespace Modules\Booking\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Booking\Events\OfferRequestCreatedEvent;
use Modules\Booking\Http\Requests\CreateOfferRequestRequest;
use Modules\Booking\Http\Requests\UpdateOfferRequestRequest;
use Modules\Booking\Repositories\Contracts\OfferRequestRepositoryInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Service\Repositories\Contracts\OfferRepositoryInterface;

class OfferRequestController extends Controller
{
    /**
     * @var OfferRequestRepositoryInterface
     */
    private $offerRequestRepository;
    /**
     * @var OfferRepositoryInterface
     */
    private $offerRepository;

    /**
     * OfferRequestController constructor.
     * @param OfferRequestRepositoryInterface $offerRequestRepository
     * @param OfferRepositoryInterface $offerRepository
     */
    public function __construct(OfferRequestRepositoryInterface $offerRequestRepository, OfferRepositoryInterface $offerRepository)
    {

        $this->offerRequestRepository = $offerRequestRepository;
        $this->offerRepository = $offerRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $request->attributes->set('sort', ['is_completed' => 'asc']);

        $offerRequests = $this->genPagination($request, $this->offerRequestRepository);

        return view('booking::offer-requests.index', compact('offerRequests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $offers = $this->offerRepository->toArray('id', 'name');

        return view('booking::offer-requests.create', compact('offers'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateOfferRequestRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateOfferRequestRequest $request)
    {
        $this->offerRequestRepository->create($request->all());

        event(new OfferRequestCreatedEvent());

        return redirect()->route('offer-requests.index')
            ->with(config('core.session_success'), __('booking::labels.offer_request') . ' ' . __('core::labels.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $offerRequest = $this->offerRequestRepository->findById($id);
        $offers = $this->offerRepository->toArray('id', 'name');

        return view('booking::offer-requests.edit', compact('offerRequest', 'offers'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateOfferRequestRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateOfferRequestRequest $request, $id)
    {
        $this->offerRequestRepository->updateById($id, $request->all());

        return redirect()->route('offer-requests.index')
            ->with(config('core.session_success'), __('booking::labels.offer_request') . ' ' . __('core::labels.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->offerRequestRepository->deleteById($id);

        return redirect()->route('offer-requests.index')
            ->with(config('core.session_success'), __('booking::labels.offer_request') . ' ' . __('core::labels.delete_success'));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function complete($id)
    {
        $offerRequest = $this->offerRequestRepository->findById($id);
        $offerRequest->is_completed = true;
        $offerRequest->save();

        return redirect()->route('offer-requests.index')
            ->with(config('core.session_success'), __('booking::labels.offer_request') . ' ' . __('core::labels.update_success'));
    }
}
