<?php

namespace Modules\Report\Listeners;

use Carbon\Carbon;
use Modules\Report\Entities\Report;
use Modules\Report\Entities\ReportRevenueDaily;
use Modules\Report\Entities\ReportRevenueMonthly;

class UpdateBookingCompletedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        $booking = $event->model;
        $today = Carbon::now();

        $reportDaily = ReportRevenueDaily::firstOrCreate([
            "day" => $today->toDateString()
        ]);

        $reportDaily->total_revenue += $booking->total_price;
        $reportDaily->room_booking_count += 1;
        $reportDaily->room_revenue += $booking->room_price;

        $reportMonthly = ReportRevenueMonthly::firstOrCreate([
            "month" => $today->month,
            "year"  => $today->year,
        ]);

        $reportMonthly->total_revenue += $booking->total_price;
        $reportMonthly->room_booking_count += 1;
        $reportMonthly->room_revenue += $booking->room_price;

        $report = Report::firstOrCreate(["id" => 1]);
        $report->total_revenue += $booking->total_price;
        $report->room_booking_count += 1;
        $report->room_revenue += $booking->room_price;


        if ($booking->service_price > 0) {
            $reportDaily->service_booking_count += $booking->services->count();
            $reportDaily->service_revenue += $booking->service_price;
            $reportMonthly->service_booking_count += $booking->services->count();
            $reportMonthly->service_revenue += $booking->service_price;
            $report->service_booking_count += $booking->services->count();
            $report->service_revenue += $booking->service_price;
        }

        $reportDaily->save();
        $reportMonthly->save();
        $report->save();
    }
}
