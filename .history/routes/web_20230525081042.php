<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
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
Route::get('/login', [LoginController::class,'getLogin'])->name('login');;
Route::post('/login', [LoginController::class,'postLogin'])->name('post-login');
Route::get('/forgotpassword', [LoginController::class,'forgotpassword'])->name('forgot-password');

//router logout
Route::get('/logout', [LogoutController::class,'getLogout'])->name('logout');

//check user auth login
Route::group(['middleware' => 'auth'], function () {
    //code in this

    // router home 
    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('/logout', function(){
        Auth::logout();
    });

    // --------------
});


