<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use DB;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('Bookings')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }


    public function allBookingInfo(){
        return DB::select('SELECT bookings.id as id ,bookings.name as name ,bookings.created_at as dateof,  hotels.price as price FROM bookings JOIN hotels ON bookings.hotel_id = hotels.id LIMIT 13');
    }

    public function getBookingNumber(){

        return DB::table('Bookings')->count(); 
    }   


    public function getBalance(){
        $data = DB::select('SELECT sum(hotels.price) as balance FROM bookings JOIN hotels ON bookings.hotel_id = hotels.id');
        return $data;
    }

    public function getGoogleChartInfo(){
        $data =  DB::select('select date_format(created_at,"%M - %Y") as month, count(distinct created_at) as bookingsNumber from bookings group by month ORDER by created_at');
        return $data;
    }

    public function getMapinfo(){
        $data = DB::select('SELECT bookings.id ,cities.name as name, count(bookings.hotel_id) as numberOfBooking from bookings JOIN hotels on bookings.hotel_id = hotels.id JOIN cities on hotels.city_id = cities.id group by cities.name');
        return $data;
    }
}

//select created_at as month, count(distinct created_at) as bookingNumber from bookings group by month ORDER BY bookingNumber DESC
