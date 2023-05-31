<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TramController extends Controller
{
    public function index()
    {
        $title = 'Trạm';

        $tram['tram'] = DB::table('tram')->get()->toArray();

        return view('tram', compact('title'), $tram);
    }
}