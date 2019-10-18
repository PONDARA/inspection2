<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKpiQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_question', function (Blueprint $table) {
            $table->unsignedInteger('kpi_id');
            $table->unsignedInteger('question_id');

            $table->foreign('kpi_id')->references('id')->on('questions');
            $table->foreign('question_id')->references('id')->on('kpis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kpi_question', function (Blueprint $table) {
            $table->dropForeign(['kpi_id']);
            $table->dropForeign(['question_id']);
        });
        Schema::dropIfExists('kpi_question');
    }
}
