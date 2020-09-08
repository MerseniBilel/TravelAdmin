<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function activity()
    {
        return $this->hasMany('App\Activity');
    }

    public function hotel()
    {
        return $this->hasMany('App\Hotel');
    }


    public function cityimage()
    {
        return $this->hasMany('App\CityImage');
    }
}
