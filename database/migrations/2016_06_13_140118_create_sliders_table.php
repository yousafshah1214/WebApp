<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('type');
            $table->string('title');
            $table->string('tagline');
            $table->boolean('button')->default(0);
            $table->string('buttonText')->nullable();
            $table->string('buttonUrl')->nullable();
            $table->boolean('featured')->default(1);
            $table->string('uniqueId')->unique()->nullable();
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
        Schema::drop('sliders');
    }
}
