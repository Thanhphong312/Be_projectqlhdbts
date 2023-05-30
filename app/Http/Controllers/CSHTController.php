<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CSHTController extends Controller
{
    public function index(){
        $title = 'Cơ Sở Hạ Tầng';
        
        return view('csht',compact('title'));
    }
}