<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HopDongController extends Controller
{
    public function index(){
        $title = 'Hợp Đồng';
        
        return view('hopdong', compact('title'));
    }

    public function import(){
        
    }

    public function export(){
        
    }
}
