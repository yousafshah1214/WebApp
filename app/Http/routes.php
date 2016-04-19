<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //

    Route::get('/', "HomeController@index");

    Route::get('home', "HomeController@index");

    Route::get('login','Auth\LoginController@index');

    Route::post('login/process','Auth\LoginController@doLogin');

    Route::get('signup','Auth\SignupController@index');

    Route::post('signup/process','Auth\SignupController@doSignup');

    Route::get('signup/facebook','Auth\SignupController@facebookSignup');

    Route::get('forgot/password','Auth\AuthController@forgotPassword');

});

//Route::group(['middleware' => 'web'], function () {
//    Route::auth();
//
//    Route::get('/home', 'HomeController@index');
//});
