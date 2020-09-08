<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function hotelimage()
    {
        return $this->hasMany('App\HotelImage');
    }

    public function booking()
    {
        return $this->hasMany('App\Booking');
    }
    
}
