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
        return view('thongke/thongke', compact('title','breadcrumbs','donvis','request','type'));
    }
    public function ajax(Request $request){
        $months = [1,2,3,4,5,6,7,8,9,10,11,12];
        $categories = [];
        $type = "";
        $name = "Doanh thu";
        if($request->month!='all'&&!empty($request->month)){
            $months = [$request->month];
        }
        if($request->type!='all'&&!empty($request->type)){
            $type = $request->type;
        }
        if($request->don_vi!='all'&&!empty($request->don_vi)){
            $donvi = $request->don_vi;
        }

        $thongkes = [[]];
        if($request->type=='tram'){
            $name = "Doanh thu ".((count($months)>1)?'năm':'tháng '.$months[0]).' '.((!empty($request->don_vi))?'của đơn vị '.$request->don_vi:'')."theo trạm";
            $thongkes[0]['name'] = "Trạm";
            $thongkes[0]['data'] = [];
            if(count($months)==1){
                $firstmonth = Carbon::create('2023', $months[0],  1, 0, 0, 0)->day;
                $lastmonth = Carbon::create('2023', $months[0],  1, 0, 0, 0)->addMonth()->subDay(1)->day;
                while($firstmonth<=$lastmonth){
                    $firstday = Carbon::create('2023', $months[0] ,$firstmonth, 0, 0, 0);
                    $tram = Tram::where('T_TinhTrang',1)->pluck('T_MaTram')->toArray(); 
                    $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                    $sum = HopDong::whereHas('tram', function ($query) use ($tram, $donvi) {
                        if(!empty($tram)){
                            $query->whereIn('T_MaTram', $tram);
                        }
                        if(!empty($donvi)){
                            $query->where('DV_MaDV',$donvi->DV_MaDV);
                        }
                    })
                    ->where('created_at','>=',$firstday->toDateString())
                    ->where('created_at','<',$firstday->addHours(24)->toDateString())
                    ->sum('HD_GiaHienTai');
                    array_push($thongkes[0]['data'],$sum);
                    array_push($categories, $firstmonth);
                    $firstmonth++;
                }

                // dd($thongkes);
            }else{
                $categories = $months;
                foreach($months as $month){
                    $firstmonth = Carbon::create('2023', $month,  1, 0, 0, 0);
                    // $lastmonth = Carbon::create('2023', $month,  1, 0, 0, 0);
                    // dd($lastmonth);
                    $tram = Tram::where('T_TinhTrang',1)->pluck('T_MaTram')->toArray(); 
                    $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                    $sum = HopDong::whereHas('tram', function ($query) use ($tram, $donvi) {
                        if(!empty($tram)){
                            $query->whereIn('T_MaTram', $tram);
                        }
                        if(!empty($donvi)){
                            $query->where('DV_MaDV',$donvi->DV_MaDV);
                        }
                    })
                    ->where('created_at','>=',$firstmonth->toDateString())
                    ->where('created_at','<',$firstmonth->addMonth()->subDay(1)->toDateString())
                    ->sum('HD_GiaHienTai');
                    array_push($thongkes[0]['data'],$sum);
                }                
            }
            // dd($thongkes[0]['data']);
        }else if($request->type=='hopdong'){
            $name = "Doanh thu ".((count($months)>1)?'năm':'tháng '.$months[0]).' '.((!empty($request->don_vi))?'của đơn vị '.$request->don_vi:'')."theo họp đồng";
            $thongkes[0]['name'] = "Hợp đồng";
            $thongkes[0]['data'] = [];
            if(count($months)==1){
                $firstmonth = Carbon::create('2023', $months[0],  1, 0, 0, 0)->day;
                $lastmonth = Carbon::create('2023', $months[0],  1, 0, 0, 0)->addMonth()->subDay(1)->day;
                while($firstmonth<=$lastmonth){
                    $firstday = Carbon::create('2023', $months[0] ,$firstmonth, 0, 0, 0);
                    $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                    $sum = HopDong::whereHas('tram', function ($query) use ($donvi) {
                        if(!empty($donvi)){
                            $query->where('DV_MaDV',$donvi->DV_MaDV);
                        }
                    })
                    ->where('created_at','>=',$firstday->toDateString())
                    ->where('created_at','<',$firstday->addHours(24)->toDateString())
                    ->sum('HD_GiaHienTai');
                    array_push($thongkes[0]['data'],$sum);
                    array_push($categories, $firstmonth);
                    $firstmonth++;
                }
            }else{
                $categories = $months;
                foreach($months as $month){
                    $firstmonth = Carbon::create('2023', $month,  1, 0, 0, 0);
                    $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                    $sum = HopDong::whereHas('tram', function ($query) use ($donvi) {
                        if(!empty($donvi)){
                            $query->where('DV_MaDV',$donvi->DV_MaDV);
                        }
                    })
                    ->where('created_at','>=',$firstmonth->toDateString())
                    ->where('created_at','<',$firstmonth->addMonth()->subDay(1)->toDateString())
                    ->sum('HD_GiaHienTai');
                    array_push($thongkes[0]['data'],$sum);
                }                
            }
        }else  if($request->type=='taikhoan'){
            $thongkes[0]['data'] = [1,2,1,1,1,1,1,1,1,1,1,1];
            $name = "Doanh thu ".((count($months)>1)?'năm':'tháng '.$months[0]).' '.((!empty($request->don_vi))?'của đơn vị '.$request->don_vi:'')."theo trạm";
            $thongkes[0]['name'] = "Tài khoản";
            $thongkes[0]['data'] = [];
            if(count($months)==1){
                $firstmonth = Carbon::create('2023', $months[0],  1, 0, 0, 0)->day;
                $lastmonth = Carbon::create('2023', $months[0],  1, 0, 0, 0)->addMonth()->subDay(1)->day;
                while($firstmonth<=$lastmonth){
                    $firstday = Carbon::create('2023', $months[0] ,$firstmonth, 0, 0, 0);
                    $users = Tram::where('T_TinhTrang',1)->pluck('T_MaTram')->toArray(); 
                    $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                    $sum = HopDong::whereHas('tram', function ($query) use ($users, $donvi) {
                        if(!empty($users)){
                            $query->whereIn('ND_MaND', $users);
                        }
                        if(!empty($donvi)){
                            $query->where('DV_MaDV',$donvi->DV_MaDV);
                        }
                    })
                    ->where('created_at','>=',$firstday->toDateString())
                    ->where('created_at','<',$firstday->addHours(24)->toDateString())
                    ->sum('HD_GiaHienTai');
                    array_push($thongkes[0]['data'],$sum);
                    array_push($categories, $firstmonth);
                    $firstmonth++;
                }

                // dd($thongkes);
            }else{
                $categories = $months;
                foreach($months as $month){
                    $firstmonth = Carbon::create('2023', $month,  1, 0, 0, 0);
                    // $lastmonth = Carbon::create('2023', $month,  1, 0, 0, 0);
                    // dd($lastmonth);
                    $users = Tram::where('T_TinhTrang',1)->pluck('T_MaTram')->toArray(); 
                    $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                    $sum = HopDong::whereHas('tram', function ($query) use ($users, $donvi) {
                        if(!empty($users)){
                            $query->whereIn('T_MaTram', $users);
                        }
                        if(!empty($donvi)){
                            $query->where('DV_MaDV',$donvi->DV_MaDV);
                        }
                    })
                    ->where('created_at','>=',$firstmonth->toDateString())
                    ->where('created_at','<',$firstmonth->addMonth()->subDay(1)->toDateString())
                    ->sum('HD_GiaHienTai');
                    array_push($thongkes[0]['data'],$sum);
                }                
            }
        }else{
            $name = "Doanh thu ".((count($months)>1)?'năm':'tháng '.$months[0]).' '.((!empty($request->don_vi))?'của đơn vị '.$request->don_vi:'');
            $thongkes[0]['name'] = "Doanh thu tháng";
            $thongkes[0]['data'] = [];
            $categories = $months;
            foreach($months as $month){
                $firstmonth = Carbon::create('2023', $month,  1, 0, 0, 0);
                // $lastmonth = Carbon::create('2023', $month,  1, 0, 0, 0);

                $sum =  $tram = Tram::where('T_TinhTrang',1)->pluck('T_MaTram')->toArray(); 
                $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                $sum = HopDong::whereHas('tram', function ($query) use ($tram, $donvi) {
                    if(!empty($tram)){
                        $query->whereIn('T_MaTram', $tram);
                    }
                    if(!empty($donvi)){
                        $query->where('DV_MaDV',$donvi->DV_MaDV);
                    }
                })
                ->where('created_at','>=',$firstmonth->toDateString())
                ->where('created_at','<',$firstmonth->addMonth()->subDay(1)->toDateString())
                ->sum('HD_GiaHienTai');
                array_push($thongkes[0]['data'],$sum);
            }  
            // dd($months);

        }
       
        // dd($thongkes);
        return view('thongke/ajaxchart',compact('thongkes','categories','name'));
    }
}
