<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function index(){
        $title = 'Tài Khoản';
        
        return view('taikhoan',compact('title'));
    }
}
