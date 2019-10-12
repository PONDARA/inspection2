<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
      protected $primaryKey = 'location_id';
      protected $fillable = [
        'latitude', 'longtitude', 'location_name','created_at'
    ];
}
