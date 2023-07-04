<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DonVi;
use App\Models\HopDong;
use App\Models\Tram;
use Illuminate\Http\Request;
use App\Models\Cabon;
use App\Models\PhuLuc;
use Carbon\Carbon;
use Auth;

class ThongKeController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Thống kê';
        $breadcrumbs = [
            [
                'name' => 'Thống kê',
                'link' => '/thongke'
            ]
        ];
        $donvis = DonVi::get();
        $months = 'all';
        $type = 'all';
        $donvi = 'all';
        return view('thongke/thongke', compact('title', 'breadcrumbs', 'donvis', 'request', 'type'));
    }
    public function ajax(Request $request)
    {
        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $categories = [];
        $type = "";
        $name = "Doanh thu";
        if ($request->month != 'all' && !empty($request->month)) {
            $months = [$request->month];
        }
        if ($request->type != 'all' && !empty($request->type)) {
            $type = $request->type;
        }
        if ($request->don_vi != 'all' && !empty($request->don_vi)) {
            $donvi = $request->don_vi;
        }

        $thongkes = [];
        switch ($request->type) {
            case 'taikhoan':
                $user = Auth::user()->id;
                if (count($months) == 1) {
                    $month = Carbon::create('2023', $months[0],  1, 0, 0, 0);
                    $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                    $hopdongs = HopDong::where(function ($query) use ($user, $donvi) {
                        if (!empty($donvi)) {
                            $query->where('DV_MaDV', $donvi->DV_MaDV);
                        }
                        $query->where('ND_MaND', $user);
                    })
                        ->where('HD_NgayDangKy', '>=', $month->firstOfMonth()->toDateTimeString())
                        ->where('HD_NgayDangKy', '<=', $month->lastOfMonth()->toDateTimeString())
                        ->get();
                    // dd($hopdongs);

                    $sum = 0;
                    $listhopdong = null;
                    foreach ($hopdongs as $hopdong) {
                        // dd(PhuLuc::where('HD_MaHD', $hopdong->HD_MaHD)->first());
                        $listhopdong = $hopdong;
                        $sum += $listhopdong->HD_GiaHienTai;
                        array_push($thongkes, $listhopdong);
                    }
                    $phuluc = PhuLuc::where('HD_NgayDangKy', '>=', $month->firstOfMonth()->toDateString())
                        ->where('HD_NgayDangKy', '<', $month->lastOfMonth())->get();
                    foreach ($phuluc as $hopdong) {
                        // dd(PhuLuc::where('HD_MaHD', $hopdong->HD_MaHD)->first());
                        $listhopdong = $hopdong;
                        $sum += $listhopdong->HD_GiaHienTai;
                        array_push($thongkes, $listhopdong);
                    }
                } else {
                    // dd(Auth::user()->id);
                    $now = Carbon::now();
                    $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                    // dd($donvi);
                    $hopdongs = HopDong::where(function ($query) use ($user, $donvi) {
                        if (!empty($donvi)) {
                            $query->where('DV_MaDV', $donvi->DV_MaDV);
                        }
                        $query->where('ND_MaND', $user);
                    })
                        ->where('HD_NgayDangKy', '>=', $now->firstOfYear()->toDateTimeString())
                        ->where('HD_NgayDangKy', '<', $now->lastOfYear()->toDateTimeString())
                        ->get();
                    $sum = 0;
                    $listhopdong = null;
                    foreach ($hopdongs as $hopdong) {
                        // dd($now->firstOfMonth()->toDateString());
                        $listhopdong = $hopdong;
                        $sum += $listhopdong->HD_GiaHienTai;
                        array_push($thongkes, $listhopdong);
                    }
                    $phuluc = PhuLuc::where('HD_NgayDangKy', '>=', $now->firstOfMonth()->toDateString())
                        ->where('HD_NgayDangKy', '<', $now->lastOfMonth()->toDateString())->get();
                    foreach ($phuluc as $hopdong) {
                        // dd($now->firstOfMonth()->toDateString());
                        $listhopdong = $hopdong;
                        $sum += $listhopdong->HD_GiaHienTai;
                        array_push($thongkes, $listhopdong);
                    }
                }
                break;
            case 'saphethan':
                $sixmonth = Carbon::now()->addMonths(6);
                $now = Carbon::now();
                // dd($ngayhethan->toDateTimeString());
                $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                $hopdongs = HopDong::where(function ($query) use ($donvi) {
                    if (!empty($donvi)) {
                        $query->where('DV_MaDV', $donvi->DV_MaDV);
                    }
                })
                    ->where('HD_NgayHetHan', '<=', $sixmonth->toDateString())
                    ->where('HD_NgayHetHan', '>=', $now->toDateString())
                    ->get();
                $sum = 0;
                $listhopdong = null;
                foreach ($hopdongs as $hopdong) {
                    $sum += $hopdong->HD_GiaHienTai;
                    array_push($thongkes, $hopdong);
                }
                break;
            default:
                // dd(($request->type));
                if (count($months) == 1) {
                    $month = Carbon::create('2023', $months[0],  1, 0, 0, 0);
                    $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                    $hopdongs = HopDong::where(function ($query) use ($donvi) {
                        if (!empty($donvi)) {
                            $query->where('DV_MaDV', $donvi->DV_MaDV);
                        }
                    })
                        ->where('HD_NgayDangKy', '>=', $month->firstOfMonth()->toDateString())
                        ->where('HD_NgayDangKy', '<', $month->lastOfMonth()->toDateString())
                        ->get();
                    // dd($hopdongs);
                    $sum = 0;
                    $listhopdong = null;
                    foreach ($hopdongs as $hopdong) {
                        // dd(PhuLuc::where('HD_MaHD', $hopdong->HD_MaHD)->first());

                        $listhopdong = $hopdong;
                        $sum += $listhopdong->HD_GiaHienTai;
                        array_push($thongkes, $listhopdong);
                    }
                    $phuluc = PhuLuc::where('HD_NgayDangKy', '>=', $month->firstOfMonth()->toDateString())
                        ->where('HD_NgayDangKy', '<', $month->lastOfMonth()->toDateString())->get();
                    foreach ($phuluc as $hopdong) {
                        // dd(PhuLuc::where('HD_MaHD', $hopdong->HD_MaHD)->first());
                        $listhopdong = $hopdong;
                        $sum += $listhopdong->HD_GiaHienTai;
                        array_push($thongkes, $listhopdong);
                    }
                } else {
                    $now = Carbon::now();
                    $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                    $hopdongs = HopDong::where(function ($query) use ($donvi) {
                        if (!empty($donvi)) {
                            $query->where('DV_MaDV', $donvi->DV_MaDV);
                        }
                    })
                        ->where('HD_NgayDangKy', '>=', $now->firstOfYear()->toDateString())
                        ->where('HD_NgayDangKy', '<', $now->lastOfYear()->toDateString())
                        ->get();
                    // dd($hopdongs);
                    $sum = 0;
                    $listhopdong = null;
                    foreach ($hopdongs as $hopdong) {
                        // dd($now->firstOfYear()->toDateString());
                        $listhopdong = $hopdong;
                        $sum += $listhopdong->HD_GiaHienTai;
                        array_push($thongkes, $listhopdong);
                    }
                    $phuluc = PhuLuc::where('HD_NgayDangKy', '>=', $now->firstOfYear()->toDateString())
                        ->where('HD_NgayDangKy', '<', $now->lastOfYear()->toDateString())->get();
                    // dd($phuluc);
                    foreach ($phuluc as $hopdong) {
                        // dd($now->firstOfYear()->toDateString());
                        $listhopdong = $hopdong;
                        $sum += $listhopdong->HD_GiaHienTai;
                        array_push($thongkes, $listhopdong);
                    }
                }
                break;
        }
        return view('thongke/ajaxchart', compact('thongkes', 'sum', 'request'));
    }
}
