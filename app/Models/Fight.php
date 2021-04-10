<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{
    use HasFactory;

    public function event()
    {
      return $this->belongsTo('App\Models\Event');
    }

    public function fighters()
    {
      return $this->hasMany('App\Models\Fighter');
    }
}
