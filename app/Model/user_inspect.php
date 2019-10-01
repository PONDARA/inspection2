<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class user_inspect extends Model
{
    protected $primaryKey = 'user_inspect_id';
    protected $fillable = [
      'user_inspect_id','inspector_id','guard_id','photo1','photo2','photo3','photo4','photo5','comment','created_date','updated_date'
    ];
}
