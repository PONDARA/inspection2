<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KpiUser extends Model
{
    public $table = 'kpi_user';
    protected $primaryKey = 'id';
    public $fillable = ['total_score','date','kpi_id', 'user_guard_id','user_inspector_id'];
}
