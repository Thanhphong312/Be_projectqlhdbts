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
        $breadcrumbs = [
            [
                'name'=>'Cơ sở hạ tầng',
                'link'=>'./csht'
            ]
        ];
        $cshts = CoSoHaTang::get();
        // dd($cshts);
        return view('csht/csht', compact('title', 'cshts', 'breadcrumbs'));
    }

    public function them()
    {
        $title = 'Cơ Sở Hạ Tầng';
        $breadcrumbs = [
            [
                'name'=>'Cơ sở hạ tầng',
                'link'=>'./'
            ],[
                'name'=>'Thêm',
                'link'=>'./them'
            ]
        ];
        return view('csht/them', compact('title', 'breadcrumbs'));
    }

    public function chinhsua(Request $request)
    {
        $title = 'Cơ Sở Hạ Tầng';
        $breadcrumbs = [
            [
                'name'=>'Cơ sở hạ tầng',
                'link'=>'../'
            ],[
                'name'=>'Chỉnh sửa',
                'link'=>'./chinhsua/'.$request->CSHT_MaCSHT
            ]
        ];
        // dd($request);
        $suacsht = CoSoHaTang::where('CSHT_MaCSHT', $request->CSHT_MaCSHT)->get();

        return view('csht/chinhsua', compact('title', 'suacsht', 'breadcrumbs'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $suacsht = CoSoHaTang::where('CSHT_MaCSHT', $request->CSHT_MaCSHT)->update([
            'CSHT_MaCSHT' => $request->CSHT_MaCSHT,
            'CSHT_TenCSHT' => $request->CSHT_TenCSHT
        ]);
        if ($suacsht) {
            return redirect()->route('csht')->with('success', 'Sửa thành công');
        }

        return redirect()->route('csht')->with('success', 'Sửa không thành công, không được chỉnh sửa mã cơ sở hạ tầng');
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
