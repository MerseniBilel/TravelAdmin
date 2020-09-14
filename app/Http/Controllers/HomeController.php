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
        $city   = new CityController;



        $cityNumber = $city->getCityNumber();
        $hotelNumber = $hotel->getHotelNumber();
        $bookingNumber =  $booking->getBookingNumber();
        $topcitiesVisited =  $booking->getMapinfo();
        $ourBalance = $booking->getBalance();
        $allbookings = $booking->allBookingInfo();
        $allcities = $city->getall();
        $allhotels =  $hotel->getall();
        
        return view('adminpanelcenter.dashboard',[
            'bookingNumber' => $bookingNumber,
            'hotelNumber' => $hotelNumber,
            'cityNumber' => $cityNumber,
            'googlechartBookings' => $googlechartBookings,
            'topCitisVisited' => $topcitiesVisited,
            'ourbalance' => $ourBalance,
            'allbookings' => $allbookings,
            'allcities' => $allcities,
            'allhotels' => $allhotels,
        ]);

       
        
    }
}
