<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = ['question','objective','question_cate_id'];
    
}
