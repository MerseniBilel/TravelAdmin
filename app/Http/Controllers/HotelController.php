<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;
use DB;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getall(){
        return DB::table('hotels')
                    ->orderBy('id', 'desc')
                    ->get();
    }

    public function index()
    {
        //
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


    public function validationRules(){
        return [
            'name' => 'required',
            'address' => 'required',
            'price' => 'required',
            'rating' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'city' => 'required',
        ];
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate($this->validationRules());
        $hotel  = new Hotel;
        $hotel->name = $request->name;
        $hotel->description = $request->description;
        $hotel->imageurl = $request->file('image')->store('uploads' , 'public');
        $hotel->price = $request->price;
        $hotel->address = $request->address;
        $hotel->rating = $request->rating;
        $hotel->city_id = $request->city;
        $hotel->save();
        return redirect()->back()->with('hotelAdded' , 'hotel ADDED successfully');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $city = new CityController;
        $allcities = $city->getall();
        $cityOfHotel =  DB::table('cities')
                        ->where('id', '=', $hotel->city_id)
                        ->get();
        return view('adminpanelcenter.edithotel',[
            'hotel' => $hotel,
            'cities' => $allcities,
            'cityofhotel' => $cityOfHotel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        if($request->file('image') == null){
            $hotel->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'rating' => $request->rating,
                'city_id' => $request->city,
                'address' => $request->address,
                'updated_at' => now(),
            ]);
            
        }else{
            $hotel->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'rating' => $request->rating,
                'city_id' => $request->city,
                'address' => $request->address,
                'imageurl' => $request->file('image')->store('uploads' , 'public'),
                'updated_at' => now(),
            ]);
        }

        return redirect()->back()->with('hotelupdate', 'hotel UPDATED successfully');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->back()->with('hoteldeleted' , 'hotel DELETED successfully');

    }


    public function getHotelNumber(){
        return DB::table('hotels')->count(); 
    }
}
