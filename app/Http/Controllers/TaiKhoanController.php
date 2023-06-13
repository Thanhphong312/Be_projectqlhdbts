<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DonVi;
use App\Models\HopDong;
use App\Models\NguoiDungDonVi;
use App\Models\QuyenNguoiDung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\redirect;
use App\Models\Quyen;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $title = 'Tài Khoản';
        $breadcrumbs = [
            [
                'name'=>'Tài khoản',
                'link'=>'./taikhoan'
            ]
        ];
        $taikhoans = User::get();
        
        return view('taikhoan/taikhoan', compact('title', 'taikhoans', 'breadcrumbs'));
    }

    public function them()
    {
        $title = 'Tài Khoản';
        $breadcrumbs = [
            [
                'name'=>'Tài khoản',
                'link'=>'./'
            ],[
                'name'=>'Thêm',
                'link'=>'./them'
            ]
        ];
        $quyens = Quyen::get();
        $donvis = DonVi::get();

        return view('taikhoan/them', compact('title', 'breadcrumbs','quyens','donvis'));
    }

    public function hienthi(Request $request)
    {
        $title = 'Tài Khoản';
        $breadcrumbs = [
            [
                'name'=>'Tài khoản',
                'link'=>'../'
            ],[
                'name'=>'Chi tiết',
                'link'=>'./hienthi/'.$request->id
            ]
        ];
        $hienthitaikhoan = User::where('id', $request->id)->get();

        return view('taikhoan/hienthi', compact('title', 'hienthitaikhoan', 'breadcrumbs'));
    }

    // public function view(Request $request)
    // {
    //     // dd($request);
    //     $hienthitaikhoan = User::where('id', $request->id)->first();
    //     $breadcrumbs = ['Tài khoản', 'Chi tiết'];

    //     return view('taikhoan/hienthi', compact('title', 'hienthitaikhoan', 'breadcrumbs'));
    // }

    public function store(Request $request)
    {
        $addtaikhoan = new User();
        $addtaikhoan->ND_MaND = $request->input('maND');
        $addtaikhoan->name = $request->input('name');
        $addtaikhoan->ND_GioiTinh = ($request->input('gioiTinh') == 1) ? 'Nam' : 'Nu';
        $addtaikhoan->ND_DiaChi = $request->input('diaChi');
        $addtaikhoan->email = $request->input('email');
        $addtaikhoan->password = $request->input('password');
        $addtaikhoan->ND_SDT = $request->input('sdt');
        $addtaikhoan->save();

        $addquyennguoidung = new QuyenNguoiDung();
        $addquyennguoidung->Q_MaQ = $request->input('Ma_Q');
        $addquyennguoidung->ND_MaND = User::where('ND_MaND',$request->input('maND'))->first()->id;
        $addquyennguoidung->save();

        $addnguoidungdonvi = new NguoiDungDonVi();
        $addnguoidungdonvi->DV_MaDV = $request->input('Ma_DV');
        $addnguoidungdonvi->ND_MaND = User::where('ND_MaND',$request->input('maND'))->first()->id;
        $addnguoidungdonvi->save();
        return redirect()->route('taikhoan')->with('success', 'Thêm thành công');
    }

    public function xoa(Request $request)
    {
        $user = User::find($request->id);
        $quyennguoidungs = QuyenNguoiDung::where('ND_MaND', $user->id)->get();
        // dd($quyennguoidungs);
        if (!empty($quyennguoidungs)) {
            foreach ($quyennguoidungs as $quyennguoidung) {
                $quyennguoidung->delete();
            }
        }

        $nguoidungdonvis = NguoiDungDonVi::where('ND_MaND', $user->id)->get();
        if (!empty($nguoidungdonvis)) {
            foreach ($nguoidungdonvis as $nguoidungdonvi) {
                $nguoidungdonvi->delete();
            }
        }

        $hopdongs = HopDong::where('ND_MaND', $user->id)->get();
        if (!empty($hopdongs)) {
            foreach ($hopdongs as $hopdong) {
                $dongias = $hopdong->dongias;
                foreach ($dongias as $dongia) {
                    $dongia->whereNotNull('DG_MaDG')->delete();
                }
                $files = $hopdong->filehopdongs;
                foreach ($files as $file) {
                    $file->whereNotNull('F_MaFile')->delete();
                }
                // dd($dongias);
                $hopdong->whereNotNull('HD_MaHD')->delete();
            }
        }
        $user->delete();
        return redirect()->route('taikhoan')->with('success', 'Xóa thành công');
    }
}
