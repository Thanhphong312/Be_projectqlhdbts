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

        $taikhoan['taikhoan'] = DB::table('users')->get()->toArray();

        return view('taikhoan', compact('title'), $taikhoan);
    }
}
