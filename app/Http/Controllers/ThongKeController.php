<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DonVi;
use App\Models\HopDong;
use App\Models\Tram;
use Illuminate\Http\Request;
use App\Models\Cabon;
use Carbon\Carbon;

class ThongKeController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Thống kê';
        $breadcrumbs = ['Thống kê'];
        $donvis = DonVi::get();
        $months = 'all';
        $type = 'all';
        $donvi = 'all';
        // dd($request);
        if(!empty($request->month)){
            $months = $request->month;
        }
        if(!empty($request->donvi)){
            $donvi = $request->donvi;
        }
        return view('thongke/thongke', compact('title','breadcrumbs','donvis','months','type','donvi'));
    }
    public function ajax(Request $request){
        $months = [1,2,3,4,5,6,7,8,9,10,11,12];
        if($request->month!='all'){
            $months = [$request->month];
        }
        if($request->type!='all'){
            $type = $request->type;
        }
        if($request->donvi!='all'){
            $donvi = $request->donvi;
        }

        $thongkes = [[]];
        if($request->type=='tram'){
            $thongkes[0]['name'] = "Trạm";
            $firstmonth = Carbon::create('2023', 6, 1, 0, 0, 0);
            $lastmonth = Carbon::create('2023', 6, 30, 0, 0, 0);
            $tram = Tram::where('T_TinhTrang',1)->pluck('T_MaTram')->toArray(); // Replace 'Tram' with your specific value
            $sum = HopDong::whereHas('tram', function ($query) use ($tram) {
                $query->whereIn('T_MaTram', $tram);
            })
            ->where('created_at','>',$firstmonth)
            ->where('created_at','<',$lastmonth)
            ->sum('HD_GiaHienTai');
            dd($sum);
            $thongkes[0]['data'] = [1,2,3];
        }else if($request->type=='hopdong'){
            $thongkes[0]['name'] = "Hợp đồng";
            $thongkes[0]['data'] = [1,2,1,1,1,1,1,1,1,1,1,1];
        }else  if($request->type=='taikhoan'){
            $thongkes[0]['name'] = "Tài khoản";
            $thongkes[0]['data'] = [1,2,1,1,1,1,1,1,1,1,1,1];
        }else{
            $thongkes[0]['name'] = "Trạm";
            $thongkes[0]['data'] = [2];
            $thongkes[1]['name'] = "Hợp đồng";
            $thongkes[1]['data'] = [2];
            $thongkes[2]['name'] = "Tài khoản";
            $thongkes[2]['data'] = [2];;
            $thongkes[3]['name'] = "Doanh thu";
            $thongkes[3]['data'] = [2];;
        }
       
        // dd($thongkes);
        return view('thongke/ajaxchart',compact('thongkes','months'));
    }
}
