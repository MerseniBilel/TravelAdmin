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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = DB::table('cities')->where('name' , $request->country)->get();
        if($test->count()){

            return redirect()->back()->with('citynotadded' , 'city is already found ... check the table below for more details');
        
        }else{
            $images=array();
            if($files=$request->file('images')){                
                $city = new City;
                $city->name= $request->country ;
                $city->description = $request->description ;
                $city->created_at = now();
                $city->updated_at = now();
                $city->save();
                foreach($files as $file){
                    $cityimage = new CityImage;
                    $cityimage->imageurl = $file->store('uploads' , 'public');
                    $cityimage->city_id = $city->id;
                    $cityimage->created_at = now();
                    $cityimage->updated_at = now();
                    $cityimage->save();
                }
 
        }

            return redirect()->back()->with('addcity' , 'city added successfullylly');
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
        $images = DB::table('city_images')->where('city_id', $city->id)->get();
        return view('adminpanelcenter/cityDetails', [
            'city' => $city,
            'images' => $images,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }


    public function getcityNumber(){
        return DB::table('cities')->count(); 
    }
}
