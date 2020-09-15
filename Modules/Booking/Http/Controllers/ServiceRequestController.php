<?php

namespace Modules\Booking\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Booking\Events\ServiceRequestCreatedEvent;
use Modules\Booking\Http\Requests\CreateServiceRequestRequest;
use Modules\Booking\Http\Requests\UpdateServiceRequestRequest;
use Modules\Booking\Repositories\Contracts\ServiceRequestRepositoryInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Service\Repositories\Contracts\ServiceRepositoryInterface;

class ServiceRequestController extends Controller
{
    /**
     * @var ServiceRequestRepositoryInterface
     */
    private $serviceRequestRepository;
    /**
     * @var ServiceRepositoryInterface
     */
    private $serviceRepository;

    /**
     * ServiceRequestController constructor.
     * @param ServiceRequestRepositoryInterface $serviceRequestRepository
     * @param ServiceRepositoryInterface $serviceRepository
     */
    public function __construct(ServiceRequestRepositoryInterface $serviceRequestRepository, ServiceRepositoryInterface $serviceRepository)
    {

        $this->serviceRequestRepository = $serviceRequestRepository;
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $request->attributes->set('sort', ['is_completed' => 'asc']);

        $serviceRequests = $this->genPagination($request, $this->serviceRequestRepository);

        return view('booking::service-requests.index', compact('serviceRequests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $services = $this->serviceRepository->toArray('id', 'name', 'publish');

        return view('booking::service-requests.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateServiceRequestRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateServiceRequestRequest $request)
    {
        $this->serviceRequestRepository->create($request->all());

        event(new ServiceRequestCreatedEvent());

        return redirect()->route('service-requests.index')
            ->with(config('core.session_success'), __('booking::labels.service_request') . ' ' . __('core::labels.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $serviceRequest = $this->serviceRequestRepository->findById($id);
        $services = $this->serviceRepository->toArray('id', 'name', 'publish');

        return view('booking::service-requests.edit', compact('serviceRequest', 'services'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateServiceRequestRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateServiceRequestRequest $request, $id)
    {
        $this->serviceRequestRepository->updateById($id, $request->all());

        return redirect()->route('service-requests.index')
            ->with(config('core.session_success'), __('booking::labels.service_request') . ' ' . __('core::labels.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->serviceRequestRepository->deleteById($id);

        return redirect()->route('service-requests.index')
            ->with(config('core.session_success'), __('booking::labels.service_request') . ' ' . __('core::labels.delete_success'));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function complete($id)
    {
        $serviceRequest = $this->serviceRequestRepository->findById($id);
        $serviceRequest->is_completed = true;
        $serviceRequest->save();

        return redirect()->route('service-requests.index')
            ->with(config('core.session_success'), __('booking::labels.service_request') . ' ' . __('core::labels.update_success'));
    }
}
