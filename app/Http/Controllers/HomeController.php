<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Trang Chủ';

        return view('home', compact('title'));
    }
}
