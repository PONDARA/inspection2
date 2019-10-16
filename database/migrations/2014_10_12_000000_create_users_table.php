<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->string('name')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender');
            $table->string('phone_number')->nullable();
            $table->string('profile_img')->nullable();
            $table->unsignedInteger('location_id')->nullable();
            $table->unsignedInteger('user_type_id')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
