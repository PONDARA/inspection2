<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToUserKpis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_kpis', function (Blueprint $table) {
            $table->foreign('inspector_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('guard_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_kpis', function (Blueprint $table) {
            $table->dropForeign(['inspector_id']);
            $table->dropForeign(['guard_id']);
        });
    }
}
