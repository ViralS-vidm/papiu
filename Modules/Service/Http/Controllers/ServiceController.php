<?php

namespace Modules\Service\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Service\Http\Requests\CreateServiceRequest;
use Modules\Service\Http\Requests\UpdateServiceRequest;
use Modules\Service\Repositories\Contracts\ServiceRepositoryInterface;

class ServiceController extends Controller
{
    /**
     * @var ServiceRepositoryInterface
     */
    private $serviceRepository;

    /**
     * ServiceController constructor.
     * @param ServiceRepositoryInterface $serviceRepository
     */
    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $this->sortAscById($request);
        $services = $this->genPagination($request, $this->serviceRepository);

        return view('service::services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('service::services.create', $this->serviceRepository->dataSelect());
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateServiceRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateServiceRequest $request)
    {
        $this->serviceRepository->create($request->all());

        return redirect()->route('services.index')
            ->with(config('core.session_success'), __('service::labels.service') . ' ' . __('core::labels.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $data['service'] = $this->serviceRepository->findById($id);
        $data = array_merge($data, $this->serviceRepository->dataSelect($data['service']));

        return view('service::services.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateServiceRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateServiceRequest $request, $id)
    {
        $this->serviceRepository->updateById($id, $request->all());

        return redirect()->route('services.index')
            ->with(config('core.session_success'), __('service::labels.service') . ' ' . __('core::labels.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->serviceRepository->deleteById($id);

        return redirect()->route('services.index')
            ->with(config('core.session_success'), __('service::labels.service') . ' ' . __('core::labels.delete_success'));
    }
}
