<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username'          =>  $faker->userName,
        'password'          =>  bcrypt(str_random(10)),
        'social'            =>  $faker->boolean(0),
        'active'            =>  $faker->boolean(100),
        'remember_token'    =>  str_random(10),
    ];
});

$factory->define(App\Image::class, function(Faker\Generator $faker){
   return [
       'filename'           =>  'example1.jpg',
       'directory'          =>  'adminAssets/img/'
   ];
});

$iconsArr = array('fa fa-television','fa fa-tripadvisor','fa fa-pencil');

$factory->define(App\Icon::class,function (Faker\Generator $faker) use ($iconsArr,$factory){
    return [
        'cssClass'                  =>  $iconsArr[array_rand($iconsArr,1)],
        'name'                      =>  $iconsArr[array_rand($iconsArr,1)].' name',
        'admin_id'                  =>  1
    ];
});

$factory->define(App\UserProfile::class, function (Faker\Generator $faker) use ($factory){
    return [
        'name'              =>  $faker->name,
        'email'             =>  $faker->email,
    ];
});

$mainSliderTypesArr = array('main-slider','featured-slider');

$factory->define(App\Slider::class,function (Faker\Generator $faker) use ($mainSliderTypesArr,$factory){
    return [
        'type'              =>  $mainSliderTypesArr[array_rand($mainSliderTypesArr,1)],
        'title'             =>  $faker->sentence,
        'tagline'           =>  $faker->sentence,
        'button'            =>  true,
        'buttonText'        =>  $faker->word,
        'buttonUrl'         =>  $faker->url,
        'image_id'          =>  $factory->create(App\Image::class)->id,
        'featured'          =>  $faker->boolean(80),
        'uniqueId'          =>  uniqid(str_random(2)),
        'admin_id'          =>  1
    ];
});
