<?php

namespace App\Http\Controllers;

use App\Exports\HDExport;
use App\Models\HopDong;
use App\Imports\HDImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Http\Controllers\Controller;
use App\Models\CoSoHaTang;
use App\Models\PhuLuc;
use App\Models\Tram;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class HopDongController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $title = 'Hợp Đồng';
        $breadcrumbs = [
            [
                'name' => 'Hợp đồng',
                'link' => './hopdong'
            ]
        ];
        $dv = auth()->user()->nguoidungdonvis()->first();
        if ($request->search) {
            if (!empty($dv)) {
                $hopdong['hopdong'] = DB::table('hop_dong')->where('DV_MaDV', $dv->DV_MaDV)
                    ->where('HD_MaHD', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('HD_MaCSHT', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('T_TenTram', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('HD_TenCTK', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('T_MaTram', 'LIKE', '%' . $request->get('search') . '%')->paginate(7);
                return view('hopdong/hopdong', compact('title', 'breadcrumbs', 'request'), $hopdong);
            } else {
                $hopdong['hopdong'] = DB::table('hop_dong')->where('HD_MaHD', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('HD_MaCSHT', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('T_TenTram', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('HD_TenCTK', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('T_MaTram', 'LIKE', '%' . $request->get('search') . '%')->paginate(7);
                return view('hopdong/hopdong', compact('title', 'breadcrumbs', 'request'), $hopdong);
            }
        } else {
            if (!empty($dv))
                $hopdong['hopdong'] = DB::table('hop_dong')->where('DV_MaDV', $dv->DV_MaDV)->orderByRaw("CAST(SUBSTR(HD_MaHD, 3) AS UNSIGNED)")->paginate(7);
            else
                $hopdong['hopdong'] = DB::table('hop_dong')->orderByRaw("CAST(SUBSTR(HD_MaHD, 3) AS UNSIGNED)")->paginate(7);

            return view('hopdong/hopdong', compact('title', 'breadcrumbs', 'request'), $hopdong);
        }
    }

    public function capnhat(Request $request)
    {
        $title = 'Hợp Đồng';

        $breadcrumbs = [
            [
                'name' => 'Hợp đồng',
                'link' => '../'
            ], [
                'name' => 'Cập nhật',
                'link' => './' . $request->HD_MaHD
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
        $filename = null;

    if ($request->hasFile('HD_HDScan')) {
        $file = $request->file('HD_HDScan');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('HD_HDScan'), $request->HD_MaHD.'-'.Carbon::now()->format('M-j-Y-H-i-s').'-'.$filename);
        $publicUrl = asset('HD_HDScan/' . $filename);
        // dd($publicUrl);
        HopDong::where('HD_MaHD', $request->HD_MaHD)
            ->update(['HD_HDScan' => 'HD_HDScan/' . $request->HD_MaHD.'-'.Carbon::now()->format('M-j-Y-H-i-s').'-'.$filename]);
        $hopdong = HopDong::where('HD_MaHD', $request->HD_MaHD)->get();
        $oldhopdong = $hopdong->toArray();
        $oldhopdong[0]['noidung'] = 'Nội dung sửa đổi : HD_HDScan';
        // dd($oldhopdong[0]);
        $this->newPhuluc($oldhopdong[0]);
    }
    $capnhathopdong = "";
    if ($filename !== null) {
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
            'HD_HDScan' => 'HD_HDScan/' .$request->HD_MaHD.'-'.Carbon::now()->format('M-j-Y-H-i-s').'-'. $filename,
        ]);
    } else {
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
            'HD_NgayPhuLuc' => $request->HD_NgayPhuLuc
        ]);
    }
        if ($capnhathopdong!="") {
            Session::flash('success', 'Cập nhật thành công.');
            return response()->json(['status' => 'success', 'message' => 'Cập nhật thành công.']);
        }else{

            Session::flash('error', 'Cập nhật thât bại.');
            return response()->json(['status' => 'error', 'message' => 'Cập nhật thât bại.']);    }
        }


    public function import(Request $request)
    {
        // dd($request);

        $validator = Validator::make($request->all(), [
            'file' => 'required'
        ]);
        if ($validator->passes()) {

            $file = $request->file;
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move(public_path() . '/uploads', $fileName);
            $path = public_path() . '/uploads/' . $fileName;
            // dd('a');

            $import = new HDImport;
            Excel::import($import, $path);
            // dd($import);
            if ($import->result) {
                return redirect(route('import'))->with('success', 'import thành công');
            } else {
                return redirect(route('import'))->with('error', 'Dòng dữ liệu thiếu mã hợp đồng (HD_MaHD) tại dòng ' . $import->dong . '.');
            }
        } else {
            return redirect()->back()->withErrors($validator);
        }
    }

    public function export(Request $request)
    {
        return Excel::download(new HDExport($request), 'HD-' . Carbon::now()->format('M j, Y H-i-s') . '.xlsx');
    }
    public function newPhuluc($oldhopdong)
    {
        $phuluc = new PhuLuc();
        $phuluc->HD_MaHD = $oldhopdong["HD_MaHD"];
        $phuluc->ND_MaND = $oldhopdong["ND_MaND"];
        $phuluc->T_MaTram = $oldhopdong["T_MaTram"];
        $phuluc->DV_MaDV = $oldhopdong["DV_MaDV"];
        $phuluc->HD_MaCSHT = $oldhopdong["HD_MaCSHT"];
        $phuluc->T_TenTram = $oldhopdong["T_TenTram"];
        $phuluc->HD_NgayDangKy = $oldhopdong["HD_NgayDangKy"];
        $phuluc->HD_NgayHetHan = $oldhopdong["HD_NgayHetHan"];
        $phuluc->HD_NgayPhuLuc = $oldhopdong["HD_NgayPhuLuc"];
        $phuluc->HD_GiaGoc = $oldhopdong["HD_GiaGoc"];
        $phuluc->HD_GiaHienTai = $oldhopdong["HD_GiaHienTai"];
        $phuluc->HD_SoTaiKhoan = $oldhopdong["HD_SoTaiKhoan"];
        $phuluc->HD_TenCTK = $oldhopdong["HD_TenCTK"];
        $phuluc->HD_TenNH = $oldhopdong["HD_TenNH"];
        $phuluc->HD_TenChuDauTu =  $oldhopdong["HD_TenChuDauTu"];
        $phuluc->HD_HDScan = $oldhopdong["HD_HDScan"];
        $phuluc->noidung = $oldhopdong["noidung"];
        $phuluc->save();
    }
}
