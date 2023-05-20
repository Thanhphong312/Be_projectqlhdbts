<?php
use Illuminate\Support\Facades\Auth;

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
//router login
Route::get('/login', 'Auth\LoginController@getLogin')->name('login');
Route::post('/login', 'Auth\LoginController@postLogin')->name('post-login');

//check user auth login
Route::group(['middleware' => 'auth'], function () {
    //code in this

    // router home 
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/logout', function(){
        Auth::logout();
    });

    // --------------
});
