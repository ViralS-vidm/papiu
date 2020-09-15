<?php

namespace Modules\Service\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Service\Http\Requests\CreateOfferRequest;
use Modules\Service\Http\Requests\UpdateOfferRequest;
use Modules\Service\Repositories\Contracts\OfferRepositoryInterface;
use Modules\Service\Services\Contracts\OfferServiceInterface;

class OfferController extends Controller
{
    /**
     * @var OfferRepositoryInterface
     */
    private $offerRepository;
    /**
     * @var OfferServiceInterface
     */
    private $offerService;

    /**
     * OfferController constructor.
     * @param OfferRepositoryInterface $offerRepository
     * @param OfferServiceInterface $offerService
     */
    public function __construct(OfferRepositoryInterface $offerRepository,
                                OfferServiceInterface $offerService)
    {

        $this->offerRepository = $offerRepository;
        $this->offerService = $offerService;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $offers = $this->genPagination($request, $this->offerRepository);

        return view('service::offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('service::offers.create', $this->offerService->dataForm());
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateOfferRequest $request
     * @return RedirectResponse
     */
    public function store(CreateOfferRequest $request)
    {
        $this->offerService->create($request->except('_token'));

        return redirect()->route('offers.index')
            ->with(config('core.session_success'), __('service::labels.offer') . ' ' . __('core::labels.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $offer = $this->offerRepository->findById($id);

        return view('service::offers.edit', $this->offerService->dataForm($offer));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateOfferRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateOfferRequest $request, $id)
    {
        $this->offerService->updateById($id, $request->except(['_token', '_method']));

        return redirect()->route('offers.index')
            ->with(config('core.session_success'), __('service::labels.offer') . ' ' . __('core::labels.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->offerRepository->deleteById($id);

        return redirect()->route('offers.index')
            ->with(config('core.session_success'), __('service::labels.offer') . ' ' . __('core::labels.delete_success'));
    }
}
