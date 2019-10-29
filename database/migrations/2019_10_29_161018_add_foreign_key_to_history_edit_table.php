<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToHistoryEditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('history_edits', function (Blueprint $table) {
            $table->foreign('security_guard_id')->references('id')->on('users');
             $table->foreign('old_location_id')->references('location_id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history_edits', function (Blueprint $table) {
            $table->dropForeign(['security_guard_id']);
            $table->dropForeign(['old_location_id']);
        });
    }
}
