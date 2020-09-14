<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = [];
    
    public function city()
    {
        return $this->belongsTo('App\City');
    }


    public function booking()
    {
        return $this->hasMany('App\Booking');
    }
    
}
