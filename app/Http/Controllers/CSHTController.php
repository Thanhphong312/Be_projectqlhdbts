<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoSoHaTang;
use App\Models\Tram;
use App\Models\HopDong;

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
        // dd($request->CSHT_MaCSHT);
        $deletecsht = CoSoHaTang::where('CSHT_MaCSHT', $request->CSHT_MaCSHT)->first();

        $trams = Tram::where('CSHT_MaCSHT', $deletecsht->CSHT_MaCSHT)->get();
        if (!empty($trams)) {
            foreach ($trams as $tram) {
                $hopdongs = $tram->hopdongs;
                foreach ($hopdongs as $hopdong) {
                    // dd($hopdong);
                    $hopdong->where('HD_MaHD', $hopdong->HD_MaHD)->delete();
                }

                // dd($tram);T_MaTram
                $tram->where('T_MaTram', $tram->T_MaTram)->delete();
            }
        }

        $deletecsht->where('CSHT_MaCSHT', $request->CSHT_MaCSHT)->delete();

        return redirect()->route('csht')->with('success', 'Xóa thành công');
    }
}
