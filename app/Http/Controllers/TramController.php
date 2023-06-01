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
        $breadcrumbs = ['Trạm'];
        $tram['tram'] = DB::table('tram')->get()->toArray();

        return view('tram/tram', compact('title','breadcrumbs'), $tram);
    }

    public function them() {
        $title = 'Trạm';
        $breadcrumbs = ['Trạm','Thêm'];

        return view('tram/them', compact('title','breadcrumbs'));
    }

    public function chinhsua() {
        $title = 'Trạm';
        return view('tram/chinhsua', compact('title'));
    }
}