<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoSoHaTang;
use App\Models\Tram;

class CSHTController extends Controller
{
    public function index()
    {
        $title = 'Cơ Sở Hạ Tầng';
        $breadcrumbs = ['Cơ sở hạ tầng'];
        $cshts = CoSoHaTang::get();
        // dd($cshts);
        return view('csht.csht', compact('title', 'cshts', 'breadcrumbs'));
    }

    public function them()
    {
        $title = 'Cơ Sở Hạ Tầng';
        $breadcrumbs = ['Cơ sở hạ tầng', 'Thêm'];
        return view('csht/them', compact('title', 'breadcrumbs'));
    }

    public function chinhsua()
    {
        $title = 'Cơ Sở Hạ Tầng';
        $breadcrumbs = ['Cơ sở hạ tầng', 'Chỉnh sửa'];
        return view('csht/chinhsua', compact('title', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        $addcsht = new CoSoHaTang();
        $addcsht->CSHT_MaCSHT = $request->input('maCSHT');
        $addcsht->CSHT_TenCSHT = $request->input('tenCSHT');

        $addcsht->save();

        return redirect()->route('csht')->with('success', 'Thêm thành công');
    }

    public function xoa(Request $request)
    {
        $csht = CoSoHaTang::find($request->CSHT_MaCSHT);

        $tram = Tram::where('CSHT_MaCSHT', $csht->CSHT_MaCSHT)->get();
        // print_r($tram);
        if (!empty($trams)) {
            foreach ($trams as $tram) {
                $tram->delete();
            }
        }

        $csht->delete();
        
        return redirect()->route('csht')->with('success', 'Xóa thành công');
    }
}
