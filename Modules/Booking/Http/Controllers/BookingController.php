<?php

namespace Modules\Booking\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Booking\Entities\Booking;
use Modules\Booking\Events\BookingCompletedEvent;
use Modules\Booking\Http\Requests\CreateBookingRequest;
use Modules\Booking\Http\Requests\UpdateBookingRequest;
use Modules\Booking\Http\Requests\UpdateStatusRequest;
use Modules\Booking\Repositories\Contracts\BookingRepositoryInterface;
use Modules\Booking\Services\Contracts\BookingServiceInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * @var BookingRepositoryInterface
     */
    private $bookingRepository;
    /**
     * @var BookingServiceInterface
     */
    private $bookingService;

    /**
     * BookingController constructor.
     * @param BookingRepositoryInterface $bookingRepository
     * @param BookingServiceInterface $bookingService
     */
    public function __construct(BookingRepositoryInterface $bookingRepository,
                                BookingServiceInterface $bookingService)
    {
        $this->bookingRepository = $bookingRepository;
        $this->bookingService = $bookingService;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $bookings = $this->genPagination($request, $this->bookingRepository);
        $status = Booking::statusName();

        return view('booking::bookings.index', compact('bookings', 'status'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('booking::bookings.create', $this->bookingService->dataForm());
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateBookingRequest $request
     * @return void
     */
    public function store(CreateBookingRequest $request)
    {
        $this->bookingService->create($request->all());

        return redirect()->route('bookings.index')
            ->with(config('core.session_success'), __('booking::labels.booking') . ' ' . __('core::labels.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $data['booking'] = $this->bookingRepository->findById($id);
        $data = $this->bookingService->dataForm($data['booking']);

        return view('booking::bookings.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateBookingRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateBookingRequest $request, $id)
    {
        $this->bookingService->updateById($id, $request->all());

        return redirect()->route('bookings.index')
            ->with(config('core.session_success'), __('booking::labels.booking') . ' ' . __('core::labels.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->bookingRepository->deleteById($id);

        return redirect()->route('bookings.index')
            ->with(config('core.session_success'), __('booking::labels.booking') . ' ' . __('core::labels.delete_success'));
    }

    /**
     * @param UpdateStatusRequest $request
     * @return RedirectResponse
     */
    public function updateStatus(UpdateStatusRequest $request)
    {
        if ($request->ajax()) {
            $booking = $this->bookingService->updateStatus($request->id, $request->status);

            if ($booking->status == Booking::STATUS_CHECKED_COMPLETED) {
                event(new BookingCompletedEvent($booking));
            }

            return response()->json([
                'message' => __('booking::labels.booking') . ' ' . __('core::labels.update_success'),
                'data'    => [
                    'next_status' => $this->bookingService->getNextStatus($request->status),
                ]
            ]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getTotalPrice(Request $request)
    {
        if ($request->ajax()) {
            $price = format_currency($this->bookingService->handlePrice($request->all())['total_price']);

            return response()->json([
                'message' => __('booking::labels.booking') . ' ' . __('core::labels.search'),
                'data'    => [
                    'total_price' => $price
                ]
            ]);
        }
    }


}
