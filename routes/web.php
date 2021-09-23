<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['as'=>'app.','prefix'=>'app','namespace'=>'backend','middleware'=>['auth']],function (){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    //Role
    Route::group(['as'=>'roles.','prefix'=>'roles'],function(){

        Route::get('/','RoleController@index')->name('index');
        Route::get('/create','RoleController@create')->name('create');
        Route::post('/store','RoleController@store')->name('store');
        Route::get('/edit/{id}','RoleController@edit')->name('edit');
        Route::post('/update/{id}','RoleController@update')->name('update');
        Route::get('/delete/{id}','RoleController@delete')->name('delete');

    });
    //User
    Route::group(['as'=>'users.','prefix'=>'users'],function(){

        Route::get('/','UserController@index')->name('index');
        Route::get('/create','UserController@create')->name('create');
        Route::post('/store','UserController@store')->name('store');
        Route::get('/show/{id}','UserController@show')->name('show');
        Route::get('/edit/{id}','UserController@edit')->name('edit');
        Route::post('/update/{id}','UserController@update')->name('update');
        Route::get('/delete/{id}','UserController@delete')->name('delete');

    });
    //Profile
    Route::group(['as'=>'profile.','prefix'=>'profile'],function(){

        Route::get('/','ProfileController@index')->name('index');
        Route::post('/update','ProfileController@update')->name('update');

        // Security
        Route::get('/security', 'ProfileController@changePassword')->name('password.change');
        Route::post('profile/security', 'ProfileController@updatePassword')->name('password.update');

    });


});
