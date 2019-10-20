<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question_categorie extends Model
{
    protected $primaryKey = 'id';
    public $fillable = ['name'];
}
