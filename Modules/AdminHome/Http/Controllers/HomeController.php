<?php

namespace Modules\AdminHome\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Modules\Booking\Entities\Booking;
use Modules\Core\Http\Controllers\Controller;
use Modules\Product\Entities\Product;
use Modules\Report\Entities\Report;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $products = Product::get()->pluck('id', 'id');
        $report = Report::firstOrCreate(["id" => 1]);
        $bookings = Booking::latest()->limit(5)->get();

        return view('adminhome::home', compact('products', 'report', 'bookings'));
    }
}
