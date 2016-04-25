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
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('profilePicUrl');
            $table->text('intro');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('address');
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
