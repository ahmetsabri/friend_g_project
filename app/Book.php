<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function reservations()
    {
      return $this->hasMany('App\Reservation');
    }

}
