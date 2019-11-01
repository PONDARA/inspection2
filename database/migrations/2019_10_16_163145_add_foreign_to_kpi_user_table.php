<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToKpiUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kpi_user', function (Blueprint $table) {
            $table->foreign('kpi_id')->references('id')->on('kpis');
            $table->foreign('user_guard_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_inspector_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kpi_user', function (Blueprint $table) {
            $table->dropForeign(['kpi_id']);
            $table->dropForeign(['user_guard_id']);
            $table->dropForeign(['user_inspector_id']);
        });
    }
}
