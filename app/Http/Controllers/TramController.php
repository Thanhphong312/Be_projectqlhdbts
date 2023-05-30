<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TramController extends Controller
{
    public function index(){
        $title = 'Trạm';
        
        return view('tram',compact('title'));
    }
}
