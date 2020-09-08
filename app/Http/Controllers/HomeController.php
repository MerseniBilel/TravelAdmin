<?php

use App\Booking;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

  
    public function index()
    {
        $booking = new BookingController;
        $googlechartBookings =  $booking->getGoogleChartInfo();


        $hotel   = new HotelController;
        $activity   = new ActivityController;
        $city   = new CityController;


        $cityNumber = $city->getCityNumber();
        $hotelNumber = $hotel->getHotelNumber();
        $ActivityNumber = $activity->getActivityNumber();
        $bookingNumber =  $booking->getBookingNumber();

        return view('adminpanelcenter.dashboard',[
            'bookingNumber' => $bookingNumber,
            'hotelNumber' => $hotelNumber,
            'cityNumber' => $cityNumber,
            'activityNumber' => $ActivityNumber,
            'googlechartBookings' => $googlechartBookings
        ]);

       
        
    }
}
