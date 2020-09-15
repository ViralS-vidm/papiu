<?php

namespace Modules\Service\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Service\Http\Requests\CreateServiceItemRequest;
use Modules\Service\Http\Requests\UpdateServiceItemRequest;
use Modules\Service\Repositories\Contracts\ServiceItemRepositoryInterface;

class ServiceItemController extends Controller
{
    /**
     * @var ServiceItemRepositoryInterface
     */
    private $serviceItemRepository;

    /**
     * ServiceItemController constructor.
     * @param ServiceItemRepositoryInterface $serviceItemRepository
     */
    public function __construct(ServiceItemRepositoryInterface $serviceItemRepository)
    {

        $this->serviceItemRepository = $serviceItemRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $this->sortAscById($request);
        $serviceItems = $this->genPagination($request, $this->serviceItemRepository);

        return view('service::service-items.index', compact('serviceItems'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('service::service-items.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateServiceItemRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateServiceItemRequest $request)
    {
        $this->serviceItemRepository->create($request->except('_token'));

        return redirect()->route('service-items.index')
            ->with(config('core.session_success'), __('labels.service') . ' ' . __('core::labels.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $serviceItem = $this->serviceItemRepository->findById($id);

        return view('service::service-items.edit', compact('serviceItem'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateServiceItemRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateServiceItemRequest $request, $id)
    {
        $this->serviceItemRepository->updateById($id, $request->except(['_token', '_method']));

        return redirect()->route('service-items.index')
            ->with(config('core.session_success'), __('labels.service') . ' ' . __('core::labels.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->serviceItemRepository->deleteById($id);

        return redirect()->route('service-items.index')
            ->with(config('core.session_success'), __('labels.service') . ' ' . __('core::labels.delete_success'));
    }
}
