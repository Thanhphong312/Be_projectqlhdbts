<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\testController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\CSHTController;
use App\Http\Controllers\HopDongController;
use App\Http\Controllers\TramController;
use App\Http\Controllers\TaiKhoanController;
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
Route::get('/login', [LoginController::class, 'getLogin'])->name('login');;
Route::post('/login', [LoginController::class, 'postLogin'])->name('post-login');
Route::get('/forgotpassword', [LoginController::class, 'forgotpassword'])->name('forgot-password');

//check user auth login
Route::group(['middleware' => 'auth'], function () {
    //code in this

    // router home 
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [LogoutController::class, 'getLogout'])->name('logout');
    Route::get('/test', [testController::class, 'test'])->name('test');
    Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke');
    Route::get('/csht', [CSHTController::class, 'index'])->name('csht');
    Route::get('/tram', [TramController::class, 'index'])->name('tram');
    Route::get('/taikhoan', [TaiKhoanController::class, 'index'])->name('taikhoan');
    Route::get('/hopdong', [HopDongController::class, 'index'])->name('hopdong');
    // -------------- Hop Dong
    Route::post('/export-csv', [HopDongController::class, 'export'])->name('export-csv');
    Route::post('/import-csv', [HopDongController::class, 'inport'])->name('import-csv');
});
