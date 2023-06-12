<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CoSoHaTang;
use App\Models\DonViQLTram;
use App\Models\Tram;
use Illuminate\Http\Request;

class TramController extends Controller
{
    public function index()
    {
        $title = 'Trạm';
        $breadcrumbs = [
            [
                'name'=>'Trạm',
                'link'=>'/tram'
            ]
        ];
        $trams = Tram::get();
        return view('tram/tram', compact('title', 'breadcrumbs', 'trams'));
    }

    public function them()
    {
        $title = 'Trạm';
        $breadcrumbs = [
            [
                'name'=>'Trạm',
                'link'=>'/tram'
            ],[
                'name'=>'Thêm',
                'link'=>'/tram/them'
            ]
        ];
        $donviquanlis = DonViQLTram::get();
        $cshts = CoSoHaTang::get();
        return view('tram/them', compact('title', 'breadcrumbs', 'cshts','donviquanlis'));
    }

    public function chinhsua(Request $request)
    {
        $title = 'Trạm';
        $breadcrumbs = ['Trạm', 'Chỉnh sửa'];
        $breadcrumbs = [
            [
                'name'=>'Trạm',
                'link'=>'/tram'
            ],[
                'name'=>'Chỉnh sửa',
                'link'=>'/tram/chinhsua/'.$request->T_MaTram
            ]
        ];
        $donviquanlis = DonViQLTram::get();

        $suatram = Tram::where('T_MaTram', $request->T_MaTram)->get();

        return view('tram/chinhsua', compact('title', 'suatram','donviquanlis' , 'breadcrumbs'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $suatram = Tram::where('T_MaTram', $request->T_MaTram)->update([
            'T_MaTram' => $request->T_MaTram,
            'T_TenTram' => $request->T_TenTram,
            'T_DiaChiTram' => $request->T_DiaChiTram,
            'T_TinhTrang' => $request->T_TinhTrang,
            'toado' => $request->toado,
            'Ma_DVQL' =>$request->donviquanly,
        ]);
        if ($suatram) {
            return redirect()->route('tram')->with('success', 'Sửa thành công');
        }

        return redirect()->route('tram')->with('success', 'Sửa không thành công, không được chỉnh sửa mã trạm');
    }

    public function store(Request $request)
    {
        $addtram = new Tram();
        $addtram->CSHT_MaCSHT = $request->csht;
        $addtram->T_MaTram = $request->input('maTram');
        $addtram->T_TenTram = $request->input('tenTram');
        $addtram->T_DiaChiTram = $request->input('diaChi');
        $addtram->toado = $request->input('toado');
        $addtram->Ma_DVQL= $request->input('donviquanly');
        $addtram->T_TinhTrang = $request->tt;

        $addtram->save();

        return redirect()->route('tram')->with('success', 'Thêm thành công');
    }

    public function xoa(Request $request)
    {
        $deletetram = Tram::where('T_MaTram', $request->T_MaTram)->first();
        
        $deletetram->where('T_MaTram', $request->T_MaTram)->delete();

        return redirect()->route('tram')->with('success', 'Xóa thành công');
    }
}
