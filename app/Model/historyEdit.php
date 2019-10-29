<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class historyEdit extends Model
{
    protected $fillable = ['security_guard_id', 'old_name', 'old_location_id','created_at','updated_at'];
}
