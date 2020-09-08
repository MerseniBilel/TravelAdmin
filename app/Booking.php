<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
