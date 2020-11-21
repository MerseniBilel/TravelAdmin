<?php

namespace App\Http\Controllers\api;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $data = new Booking;
        $data->email = $request->email;
        $data->creditcard = $request->creditcard;
        $data->cvv = $request->cvv;
        $data->expirationdate = $request->expirationdate;
        $data->hotel_id = $request->hotel_id;
        $data->created_at = now();
        $data->updated_at = now();

        $booking = $data->save();

         return response()->json($booking, 201);
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
}
