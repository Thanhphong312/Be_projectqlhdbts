<?php

namespace App\Http\Controllers;

use App\Exports\HDExport;
use App\Models\HopDong;
use App\Imports\HDImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;
use App\Models\CoSoHaTang;
use App\Models\Tram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class HopDongController extends Controller
{
    public function index()
    {
        $title = 'Hợp Đồng';
        $breadcrumbs = [
            [
                'name'=>'Hợp đồng',
                'link'=>'./hopdong'
            ]
        ];
        $dv=auth()->user()->nguoidungdonvis()->first();
        if(!empty($dv))
            $hopdong['hopdong'] = DB::table('hop_dong')->where('DV_MaDV',$dv->DV_MaDV)->get()->toArray();
        else
            $hopdong['hopdong'] = DB::table('hop_dong')->get()->toArray();



        return view('hopdong/hopdong', compact('title','breadcrumbs'), $hopdong);
    }

    public function capnhat(Request $request)
    {
        $title = 'Hợp Đồng';

        $breadcrumbs = [
            [
                'name'=>'Hợp đồng',
                'link'=>'../'
            ],[
                'name'=>'Cập nhật',
                'link'=>'./'.$request->HD_MaHD
            ]
        ];
        $capnhathopdong = HopDong::where('HD_MaHD', $request->HD_MaHD)->get();

        $trams = Tram::get();
        $cshts = CoSoHaTang::get();

        return view('hopdong/capnhat', compact('title', 'capnhathopdong', 'breadcrumbs', 'trams', 'cshts'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $capnhathopdong = HopDong::where('HD_MaHD', $request->HD_MaHD)->update([
            'HD_MaHD' => $request->HD_MaHD,
            'HD_TenCTK' => $request->HD_TenCTK,
            'HD_SoTaiKhoan' => $request->HD_SoTaiKhoan,
            'HD_TenNH' => $request->HD_TenNH,
            'HD_NgayDangKy' => $request->HD_NgayDangKy,
            'HD_NgayHetHan' => $request->HD_NgayHetHan,
            'HD_GiaHienTai' => $request->HD_GiaHienTai,
            'T_MaTram' => $request->T_MaTram,
            'T_TenTram' => $request->T_TenTram,
            'HD_MaCSHT' => $request->CSHT_MaCSHT,
            'HD_TenChuDauTu' => $request->HD_TenChuDauTu,
            'HD_NgayPhuLuc' => $request->HD_NgayPhuLuc,
            'Nguoiky' => $request->HD_Nguoiky,
            'Khachhang' => $request->HD_Khachhang,
            'HD_HDScan' => $request->HD_HDScan,
        ]);
        if ($capnhathopdong) {
            return redirect()->route('hopdong')->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('hopdong')->with('success', 'Cập nhật không thành công, không được chỉnh sửa mã hợp đồng');
    }

    public function import(Request $request) 
    {
        // dd($request);

        $validator = Validator::make($request->all(),[
            'file' => 'required'
        ]);
        if($validator->passes()){
            
            $file = $request->file;
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move(public_path().'/uploads',$fileName);
            $path = public_path().'/uploads/'.$fileName;
            // dd('a');

            Excel::import(new HDImport, $path);
            return redirect(route('import'))->with('success', 'import thành công');
        }else{
            return redirect()->back()->withErrors($validator);
        }
    }

    public function export()
    {
        return Excel::download(new HDExport, 'HD.xlsx');
    }
    
}