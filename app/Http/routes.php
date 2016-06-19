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

/*
|-------------------------------------------------------------------------
| Admin Routes
|-------------------------------------------------------------------------
|
| The routes below are Admin related routes
|
*/

Route::group(['middleware' => ['web']], function(){

    Route::group(['middleware'  =>  ['guest:admin']], function(){

        Route::post('admin/login/process','Admin\Auth\LoginController@doAdminLogin')->name('admin.login');

        Route::get('admin/login','Admin\Auth\LoginController@create')->name('admin.login.process');

    });

    Route::group(['middleware'  =>  ['auth:admin']], function(){

        Route::get('admin', 'Admin\AdminController@index')->name('admin.dashboard');

        Route::post('admin/search', 'Admin\SearchController@index')->name('admin.search');

        Route::get('admin/main-slider','Admin\MainSliderController@index')->name('admin.slider.main');

        Route::get('admin/test','Admin\MainSliderController@test')->name('test');

        Route::get('admin/main-slider/create','Admin\MainSliderController@create')->name('admin.slider.main.create');

        Route::post('admin/main-slider/store','Admin\MainSliderController@store')->name('admin.slider.main.store');

        Route::get('admin/logout','Admin\Auth\LoginController@logout')->name('admin.logout');
    });

});

/*
|-----------------------------------------------------------------------------
| User Routes
|-----------------------------------------------------------------------------
|
| The routes below are user specific routes.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['guest']], function(){

        Route::get('/', "HomeController@index")->name('home');

        Route::get('home', "HomeController@index")->name('home.index');

        Route::get('login','Auth\LoginController@create')->name('login.index');

        Route::post('login/process','Auth\LoginController@doLogin')->name('login.process');

        Route::post('login/process/ajax','Auth\LoginController@doLogin')->name('login.process.ajax');

        Route::get('login/facebook','Auth\LoginController@facebookLogin')->name('login.facebook');

        Route::get('login/twitter','Auth\LoginController@twitterLogin')->name('login.twitter');

        Route::get('signup','Auth\SignupController@create')->name('signup.index');

        Route::post('signup/process','Auth\SignupController@store')->name('signup.process');

        Route::post('signup/process/ajax','Auth\SignupController@store')->name('signup.process.ajax');

        Route::post('check/username','Auth\ValidationController@checkUsername')->name('signup.check.username');

        Route::post('check/email','Auth\ValidationController@checkEmail')->name('signup.check.email');

        Route::get('signup/activate/{code}','Auth\SignupController@activate')->name('signup.activate');

        Route::get('signup/facebook','Auth\SignupController@facebookSignup')->name('signup.facebook');

        Route::get('signup/facebook/callback','Auth\SignupController@facebookCallback')->name('signup.facebook.callback');

        Route::get('signup/twitter','Auth\SignupController@twitterSignup')->name('signup.twitter');

        Route::get('signup/twitter/callback','Auth\SignupController@twitterCallback')->name('signup.twitter.callback');

        Route::get('forgot/password','Auth\PasswordController@forgotPassword')->name('password.forget');

    });

    Route::group(['middleware' =>   ['auth']], function(){

        Route::get('logout','Auth\LoginController@logout')->name('logout');

        Route::get('dashboard','DashboardController@index')->name('dashboard');

    });

});

//Route::group(['middleware' => 'web'], function () {
//    Route::auth();
//
//    Route::get('/home', 'HomeController@index');
//});
