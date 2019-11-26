<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKpiUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_user', function (Blueprint $table) {
            $table->increments('id');
            $table->float('total_score');
            $table->unsignedInteger('kpi_id');
            $table->unsignedInteger('user_guard_id');
            $table->unsignedInteger('user_inspector_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpi_user');
    }
}
