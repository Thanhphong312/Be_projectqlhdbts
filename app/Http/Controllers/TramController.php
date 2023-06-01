<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CoSoHaTang;
use App\Models\Tram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TramController extends Controller
{
    public function index()
    {
        $title = 'Trạm';
        $breadcrumbs = ['Trạm'];
        $trams = Tram::get();
        return view('tram/tram', compact('title','breadcrumbs','trams'));
    }

    public function them() {
        $title = 'Trạm';
        $breadcrumbs = ['Trạm','Thêm'];
        $cshts = CoSoHaTang::get();
        return view('tram/them', compact('title','breadcrumbs','cshts'));
    }

    public function chinhsua() {
        $title = 'Trạm';
        return view('tram/chinhsua', compact('title'));
    }


    public function store(Request $request) {
        // dd($id);
        $addtram = new Tram();
        $addtram->CSHT_MaCSHT = $request->csht;
        $addtram->T_MaTram = "TLM".$request->input('maTram');
        $addtram->T_TenTram = $request->input('tenTram');
        $addtram->T_DiaChiTram = $request->input('diaChi');
        $addtram->T_TinhTrang = $request->tt;

        $addtram->save();

        return redirect()->route('tram-them')->with('success', 'Insert thành công');
    }
}