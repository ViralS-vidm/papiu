<?php

namespace Modules\Booking\Listeners;

use App\Helpers\Common\CommonHelper;
use Modules\Booking\Repositories\Contracts\BookingRepositoryInterface;

class BookingCreatedListener
{
    /**
     * @var BookingRepositoryInterface
     */
    private $bookingRepository;

    /**
     * Create the event listener.
     *
     * @param BookingRepositoryInterface $bookingRepository
     */
    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        $lastBooking = $this->bookingRepository->getLasRecordWithTrashed();
        $shortCode = $lastBooking ? '#' . ((int)filter_var($lastBooking->short_code, FILTER_SANITIZE_NUMBER_INT) + 1) : '#1000';
        $event->model->update([
            'short_code' => $shortCode
        ]);
    }
}
