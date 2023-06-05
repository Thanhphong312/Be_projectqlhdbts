<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HopDong;
use App\Models\NguoiDungDonVi;
use App\Models\QuyenNguoiDung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $title = 'Tài Khoản';
        $breadcrumbs = ['Tài khoản'];

        $taikhoan['taikhoan'] = DB::table('users')->get()->toArray();

        return view('taikhoan/taikhoan', compact('title', 'breadcrumbs'), $taikhoan);
    }

    public function them()
    {
        $title = 'Tài Khoản';
        $breadcrumbs = ['Tài khoản', 'Thêm'];

        return view('taikhoan/them', compact('title', 'breadcrumbs'));
    }

    public function hienthi()
    {
        $title = 'Tài Khoản';
        $breadcrumbs = ['Tài khoản', 'Chi tiết'];
        return view('taikhoan/hienthi', compact('title', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        $addtaikhoan = new User();
        $addtaikhoan->ND_MaND = "ND_" . $request->input('maND');
        $addtaikhoan->name = $request->input('name');
        $addtaikhoan->ND_GioiTinh = ($request->input('gioiTinh') == 1) ? 'Nam' : 'Nu';
        $addtaikhoan->ND_DiaChi = $request->input('diaChi');
        $addtaikhoan->email = $request->input('email');
        $addtaikhoan->password = $request->input('password');
        $addtaikhoan->ND_SDT = $request->input('sdt');

        $addtaikhoan->save();

        return redirect()->route('taikhoan')->with('success', 'Thêm thành công');
    }

    public function xoa(Request $request)
    {
        $user = User::find($request->id);
        $quyennguoidungs = QuyenNguoiDung::where('ND_MaND', $user->id)->get();
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
                $hopdong->whereNotNull('HD_MaHD')->delete();
            }
        }
        $user->delete();
        return redirect()->route('taikhoan')->with('success', 'Xóa thành công');
    }
}
