<?php

namespace Modules\Report\Listeners;

use Carbon\Carbon;
use Modules\Report\Entities\ReportRequestDaily;
use Modules\Report\Entities\ReportRequestMonthly;

class UpdateServiceRequestListener
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
        $today = Carbon::now();
        $reportDaily = ReportRequestDaily::firstOrCreate([
            "day" => $today->toDateString()
        ]);
        $reportDaily->total_request += 1;
        $reportDaily->service_request += 1;
        $reportDaily->save();

        $reportMonthly = ReportRequestMonthly::firstOrCreate([
            "month" => $today->month,
            "year"  => $today->year,
        ]);
        $reportMonthly->total_request += 1;
        $reportMonthly->service_request += 1;
        $reportMonthly->save();
    }
}
