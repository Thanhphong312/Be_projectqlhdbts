<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CSHTController extends Controller
{
    public function index()
    {
        $title = 'Cơ Sở Hạ Tầng';

        $csht['csht'] = DB::table('co_so_ha_tang')->get()->toArray();

        return view('csht/csht', compact('title'), $csht);
    }

    public function them() {
        $title = 'Cơ Sở Hạ Tầng';
        return view('csht/them', compact('title'));
    }

    public function chinhsua() {
        $title = 'Cơ Sở Hạ Tầng';
        return view('csht/chinhsua', compact('title'));
    }

}
