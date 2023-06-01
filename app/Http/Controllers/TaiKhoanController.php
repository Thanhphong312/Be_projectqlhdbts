<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $title = 'Tài Khoản';
        $breadcrumbs = ['Tài khoản'];

        $taikhoan['taikhoan'] = DB::table('users')->get()->toArray();

        return view('taikhoan/taikhoan', compact('title','breadcrumbs'), $taikhoan);
    }

    public function them() {
        $title = 'Tài Khoản';
        $breadcrumbs = ['Tài khoản','Thêm'];

        return view('taikhoan/them', compact('title','breadcrumbs'));
    }

    public function hienthi() {
        $title = 'Tài Khoản';
        $breadcrumbs = ['Tài khoản','Chi tiết'];
        return view('taikhoan/hienthi', compact('title','breadcrumbs'));
    }

    public function store(Request $request)
    {
        $addtaikhoan = new User();
        $addtaikhoan->ND_MaND = "ND_".$request->input('maND');
        $addtaikhoan->name = $request->input('name');
        $addtaikhoan->ND_GioiTinh = ($request->input('gioiTinh')==1)?'nam':'nu';
        $addtaikhoan->ND_DiaChi = $request->input('diaChi');
        $addtaikhoan->email = $request->input('email');
        $addtaikhoan->password = $request->input('password');
        $addtaikhoan->ND_SDT = $request->input('sdt');

        $addtaikhoan->save();

        return redirect()->route('taikhoan')->with('success', 'Thêm thành công');
    }
    public function xoa(Request $request){
        
        // $validator = $request->validate([
        //     'id' => 'exists:App\Models\HopDong,id',
        //     ],
        // );
        $validator = Validator::make($request->all(), [
            'id' => 'exists:hop_dong,id'
        ]);
        dd($validator->validated());
        // if ($validator) {
        //     // The foreign key does not exist
        //     dd($request);
        // }
        // $user = User::find($request->id);
        // dd($user->hopdongs);
        // $user->delete();

        // return redirect()->route('taikhoan')->with('success', 'Xóa thành công');

    }
}
