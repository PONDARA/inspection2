<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToAnswerScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answer_scores', function (Blueprint $table) {
            $table->foreign('kpi_user_id')->references('id')->on('kpi_user');
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_scores', function (Blueprint $table) {
            $table->dropForeign(['kpi_user_id']);
            $table->dropForeign(['question_id']);
            //
        });
    }
}
