<?php

namespace App\Http\Controllers;

use App\City;
use App\CityImage;
use Illuminate\Http\Request;
use DB;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getall(){
        return DB::table('cities')
                        ->orderBy('id', 'desc')
                        ->get();
    }

    public function index()
    {
        
        
        $data = DB::table('cities')->orderBy('id', 'desc')->get();
        return view('adminpanelcenter/city', [
           'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }



    public function validationRules(){
        return [
            'country' => 'required',
            'description' => 'required',
            'image' => 'required|image',
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
        $test = DB::table('cities')->where('name' , $request->country)->get();
        if($test->count()){

            return redirect()->back()->with('citynotadded' , 'city is already found ... check the table below for more details');
        
        }else{
            $city = new City;
            $city->name= $request->country ;
            $city->description = $request->description ;
            $city->imageurl = $request->file('image')->store('uploads' , 'public');
            $city->created_at = now();
            $city->updated_at = now();
            $city->save();
            return redirect()->back()->with('cityadded' , 'city ADDED successfully');
        }

    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {   

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('adminpanelcenter/editcity', [
            'city' => $city,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city){

        if($request->file('image') == null){
            $city->update([
                'name' => $request->country,
                'description' => $request->description,
                'updated_at' => now(),
            ]);
            
        }else{
            $city->update([
                'name' => $request->country,
                'description' => $request->description,
                'updated_at' => now(),
                'imageurl' => $request->file('image')->store('uploads' , 'public'),
            ]);
        }

        return redirect()->back()->with('cityupdated', 'city UPDATED successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {

        $city->delete();
        return redirect()->back()->with('citydeleted', 'city DELETED successfully');
    }


    public function getcityNumber(){
        return DB::table('cities')->count(); 
    }
}
