<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function index()
    {
        $title = 'Thống kê';
        $breadcrumbs = ['Thống kê'];
        return view('thongke', compact('title','breadcrumbs'));
    }
}
