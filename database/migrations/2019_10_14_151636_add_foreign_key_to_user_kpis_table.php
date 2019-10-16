<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToUserKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_kpis', function (Blueprint $table) {
            $table->foreign('inspector_id')->references('id')->on('users');
            $table->foreign('guard_id')->references('id')->on('users');
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
