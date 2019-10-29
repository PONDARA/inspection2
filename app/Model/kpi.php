<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class kpi extends Model
{
    protected $primaryKey = 'id';
    public $fillable = ['title','publish','user_admin_id', 'date'];
    public $timestamps = false;


    public function questions(){
        return $this->belongsToMany('App\Model\Kpi', 'kpi_question', 'kpi_id', 'question_id')->withPivot('max_score');
    }

    public function kpiUsers(){
        return $this->hasMany('App\Model\KpiUser');
    }
}
