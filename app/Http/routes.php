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

    Route::get('/', "HomeController@index")->name('home');

    Route::get('home', "HomeController@index")->name('home.index');

    Route::get('login','Auth\LoginController@index')->name('login.index');

    Route::post('login/process','Auth\LoginController@doLogin')->name('login.process');

    Route::get('signup','Auth\SignupController@index')->name('signup.index');

    Route::post('signup/process','Auth\SignupController@doSignup')->name('signup.process');

    Route::get('signup/activate/{code}','Auth\SignupController@activate/{code}')->name('signup.activate');

    Route::get('signup/facebook','Auth\SignupController@facebookSignup')->name('signup.facebook');

    Route::get('signup/facebook/callback','Auth\SignupController@facebookCallback')->name('signup.facebook.callback');

    Route::get('signup/twitter','Auth\SignupController@twitterSignup')->name('signup.twitter');

    Route::get('signup/twitter/callback','Auth\SignupController@twitterCallback')->name('signup.twitter.callback');

    Route::get('forgot/password','Auth\PasswordController@forgotPassword')->name('password.forget');

});

//Route::group(['middleware' => 'web'], function () {
//    Route::auth();
//
//    Route::get('/home', 'HomeController@index');
//});
