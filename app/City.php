<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $guarded = [];


    public function hotel()
    {
        return $this->hasMany('App\Hotel');
    }


}
