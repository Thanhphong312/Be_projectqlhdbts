<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CoSoHaTang;
class CSHTController extends Controller
{
    public function index()
    {
        $title = 'Cơ Sở Hạ Tầng';
        $breadcrumbs = ['Cơ sở hạ tầng'];
        $cshts = CoSoHaTang::get();
        // dd($cshts);
        return view('csht.csht', compact('title','cshts','breadcrumbs'));
    }

    public function them() {
        $title = 'Cơ Sở Hạ Tầng';
        $breadcrumbs = ['Cơ sở hạ tầng','them'];
        return view('csht.them', compact('title','breadcrumbs'));
    }

    public function chinhsua() {
        $title = 'Cơ Sở Hạ Tầng';
        $breadcrumbs = ['Cơ sở hạ tầng','them'];
        return view('csht.chinhsua', compact('title','breadcrumbs'));
    }
}
