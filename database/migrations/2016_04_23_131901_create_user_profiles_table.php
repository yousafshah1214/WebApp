<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('intro')->nullable();
            $table->string('profilePicUrl')->nullable();
            $table->string('email')->unique()->nullable();
            $table->boolean('gender')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('address')->nullable();
            $table->integer('city_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->BigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_profiles');
        Schema::drop('cities');
        Schema::drop('countries');
    }
}
