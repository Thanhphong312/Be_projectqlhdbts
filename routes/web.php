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
use App\Http\Controllers\TimkiemController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PhuLucController;

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
Route::any('/forgotpassword', [LoginController::class, 'forgotpassword'])->name('forgot-password');

//check user auth login
Route::group(['middleware' => 'auth'], function () {
    // router home 
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [LogoutController::class, 'getLogout'])->name('logout');
    //thongke
    Route::get('/test', [testController::class, 'test'])->name('test');
    Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke');
    Route::get('/thongke/ajaxchart', [ThongKeController::class, 'ajax'])->name('ajaxthongke');
    Route::post('/thongke/export', [ThongKeController::class, 'export'])->name('thongke-export');

    //tram
    Route::get('/tram', [TramController::class, 'index'])->name('tram');
    Route::get('/tram/them', [TramController::class, 'them'])->name('tram-them');
    Route::post('/tram/them', [TramController::class, 'store'])->name('tram-store');
    Route::get('/tram/chinhsua/{T_MaTram}', [TramController::class, 'chinhsua'])->name('tram-chinhsua');
    Route::post('/tram/update/{T_MaTram}', [TramController::class, 'update'])->name('tram-update');
    Route::get('/tram/xoa/{T_MaTram}', [TramController::class, 'xoa'])->name('tram-xoa');

    // hop dong 
    Route::get('/hopdong', [HopDongController::class, 'index'])->name('hopdong');
    Route::get('/hopdong/capnhat/{HD_MaHD}', [HopDongController::class, 'capnhat'])->name('hopdong-capnhat');
    Route::post('/hopdong/update/{HD_MaHD}', [HopDongController::class, 'update'])->name('hopdong-update');
    //phuluc
    Route::get('/phuluc', [PhuLucController::class, 'index'])->name('phuluc');
    Route::any('/export', [PhuLucController::class, 'export'])->name('export');
    Route::get('/phuluc/hienthipl/{id}', [PhulucController::class, 'hienthipl'])->name('phuluc-hienthi');
    // csht 
    Route::get('/csht', [CSHTController::class, 'index'])->name('csht');
    Route::get('/csht/them', [CSHTController::class, 'them'])->name('csht-them');
    Route::post('/csht/them', [CSHTController::class, 'store'])->name('csht-store');
    Route::get('/csht/chinhsua/{CSHT_MaCSHT}', [CSHTController::class, 'chinhsua'])->name('csht-chinhsua');
    Route::post('/csht/update/{CSHT_MaCSHT}', [CSHTController::class, 'update'])->name('csht-update');
    Route::get('/csht/xoa/{CSHT_MaCSHT}', [CSHTController::class, 'xoa'])->name('csht-xoa');

    // tai khoan 
    Route::get('/taikhoan', [TaiKhoanController::class, 'index'])->name('taikhoan');
    Route::get('/taikhoan/them', [TaiKhoanController::class, 'them'])->name('taikhoan-them');
    Route::post('/taikhoan/them', [TaiKhoanController::class, 'store'])->name('taikhoan-store');
    Route::get('/taikhoan/hienthi/{id}', [TaiKhoanController::class, 'hienthi'])->name('taikhoan-hienthi');
    Route::any('/taikhoan/chinhsua/{id}', [TaiKhoanController::class, 'chinhsua'])->name('taikhoan-chinhsua');
    Route::get('/taikhoan/xoa/{id}', [TaiKhoanController::class, 'xoa'])->name('taikhoan-xoa');


    // -------------- Hop Dong
    Route::get('/import', [HopDongController::class, 'index'])->name('import');
    Route::any('/export', [HopDongController::class, 'export'])->name('export');
    Route::post('/start-import', [HopDongController::class, 'import'])->name('start-import');
});
