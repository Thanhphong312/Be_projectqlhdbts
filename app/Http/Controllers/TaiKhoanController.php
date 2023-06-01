<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $title = 'Tài Khoản';
        $breadcrumbs = ['Tài khoản'];

        $taikhoan['taikhoan'] = DB::table('users')->get()->toArray();

        return view('taikhoan/taikhoan', compact('title','breadcrumbs'), $taikhoan);
    }

    public function them() {
        $title = 'Tài Khoản';
        $breadcrumbs = ['Tài khoản','Thêm'];

        return view('taikhoan/them', compact('title','breadcrumbs'));
    }

    public function hienthi() {
        $title = 'Tài Khoản';
        $breadcrumbs = ['Tài khoản','Thông tin'];
        return view('taikhoan/hienthi', compact('title','breadcrumbs'));
    }
}
