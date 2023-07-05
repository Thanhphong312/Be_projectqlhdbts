<?php

namespace App\Http\Controllers;

use App\Exports\BaoCaoExport;
use App\Http\Controllers\Controller;
use App\Models\DonVi;
use App\Models\HopDong;
use App\Models\Tram;
use Illuminate\Http\Request;
use App\Models\Cabon;
use App\Models\PhuLuc;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;

class ThongKeController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Thống kê';
        $breadcrumbs = [
            [
                'name' => 'Thống kê',
                'link' => './thongke'
            ]
        ];
        $donvis = DonVi::get();
        $months = 'all';
        $type = 'all';
        $donvi = 'all';
        $taikhoans = User::get();
        return view('thongke/thongke', compact('title', 'breadcrumbs', 'donvis', 'request', 'type', 'taikhoans'));
    }
    public function ajax(Request $request)
    {
        $month = 'all';
        $year = 'all';
        $nguoidung = "all"; 
        $don_vi = "all";
        $type = 'thongke';
        if ($request->month != 'all' && !empty($request->month)) {
            $month = $request->month;
        }
        if ($request->year != 'all' && !empty($request->year)) {
            $year = $request->year;
        }
        if ($request->type != 'all' && !empty($request->type)) {
            $type = $request->type;
        }
        if ($request->don_vi != 'all' && !empty($request->don_vi)) {
            $don_vi = $request->don_vi;
        }
        if ($request->nguoidung != 'all' && !empty($request->nguoidung)) {
            $nguoidung = $request->nguoidung;
        }

        $thongkes = [];
        switch ($request->type) {
            case 'saphethan':
                $user = Auth::user();
                $sixmonth = Carbon::now()->addMonth(6);
                $now = Carbon::now();
                $year = Carbon::now()->year;
                $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                $hopdongs = HopDong::where(function ($query) use ($request, $user, $don_vi) {
                    if ($don_vi!="all") {
                        $query->where('DV_MaDV', $don_vi);
                    }
                    if ($user->quyennguoidungs->first()->Q_MaQ == 'Q1') {
                        $query->where('ND_MaND', $user->id);
                    }
                    if ($request->nguoidung != 'all' && !empty($request->nguoidung)) {
                        $query->where('ND_MaND', $request->nguoidung);
                    }
                })
                    ->where('HD_NgayHetHan', '>=', $now->toDateString())
                    ->where('HD_NgayHetHan', '<=', $sixmonth->toDateString())
                    ->get();
                // dd($hopdongs);
// 
                $sum = 0;
                $listhopdong = null;
                foreach ($hopdongs as $hopdong) {
                    $sum += $hopdong->HD_GiaHienTai;
                    array_push($thongkes, $hopdong);
                }
                break;
            default:
                // dd(($request->type));
                $user = Auth::user();
                $now = "";
                if($year!='all'){
                    if($month=='all'){
                        $now = Carbon::create($year, 1,  1, 0, 0, 0);
                    }else{
                        $now = Carbon::create($year, $month,  1, 0, 0, 0);
                    }
                }
                // dd($now);
                // if()
                $donvi = DonVi::where('DV_MaDV', $request->don_vi)->first();
                $hopdongs = HopDong::where(function ($query) use ($request, $now, $user, $don_vi) {
                    if ($don_vi!="all") {
                        $query->where('DV_MaDV', $don_vi);
                    }
                    if ($user->quyennguoidungs->first()->Q_MaQ == 'Q1') {
                        $query->where('ND_MaND', $user->id);
                    }
                    if ($request->nguoidung != 'all' && !empty($request->nguoidung)) {
                        $query->where('ND_MaND', $request->nguoidung);
                    }
                    if ($request->year != 'all') {
                        if ($request->month == 'all') {
                            $query->where('HD_NgayDangKy', '>=', $now->firstOfYear()->toDateString());
                            $query->where('HD_NgayDangKy', '<', $now->lastOfYear()->toDateString());
                        } else {
                            $query->where('HD_NgayDangKy', '>=', $now->firstOfMonth()->toDateString());
                            $query->where('HD_NgayDangKy', '<', $now->lastOfMonth()->toDateString());
                        }
                    }
                })->get();
                // dd($hopdongs);
                $sum = 0;
                $listhopdong = null;
                foreach ($hopdongs as $hopdong) {
                    // dd($now->firstOfYear()->toDateString());
                    $listhopdong = $hopdong;
                    $sum += $listhopdong->HD_GiaHienTai;
                    array_push($thongkes, $listhopdong);
                }
                $phuluc = PhuLuc::where(function ($query) use ($request, $now, $user, $don_vi) {
                    if ($don_vi!="all") {
                        $query->where('DV_MaDV', $don_vi);
                    }
                    if ($user->quyennguoidungs->first()->Q_MaQ == 'Q1') {
                        $query->where('ND_MaND', $user->id);
                    }
                    if ($request->nguoidung != 'all' && !empty($request->nguoidung)) {
                        $query->where('ND_MaND', $request->nguoidung);
                    }
                    if ($request->year != 'all') {
                        if ($request->month == 'all') {
                            $query->where('HD_NgayDangKy', '>=', $now->firstOfYear()->toDateString());
                            $query->where('HD_NgayDangKy', '<', $now->lastOfYear()->toDateString());
                        } else {
                            $query->where('HD_NgayDangKy', '>=', $now->firstOfMonth()->toDateString());
                            $query->where('HD_NgayDangKy', '<', $now->lastOfMonth()->toDateString());
                        }
                    }
                })->get();
                // dd($phuluc);
                foreach ($phuluc as $hopdong) {
                    // dd($now->firstOfYear()->toDateString());
                    $listhopdong = $hopdong;
                    $sum += $listhopdong->HD_GiaHienTai;
                    array_push($thongkes, $listhopdong);
                }
                break;
        }
        $collection = new Collection($thongkes);

        // Define the number of items per page
        $perPage = 5;
        $page = (!empty($request->page))?$request->page:1;
        // Get the current page from the query string or set a default value
        $currentPage = request()->get('page', $page);

        // Slice the collection based on the current page and the number of items per page
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Create a new LengthAwarePaginator instance
        $paginator = new LengthAwarePaginator($currentPageItems, count($collection), $perPage, $currentPage);
        // dd($thongkes);
        $paginator->withPath('./thongke?year='.$year.'&month='.$month.'&donvi='.$don_vi.'&nguoidung='.$nguoidung.'&type='.$type);
        return view('thongke/ajaxchart', compact('paginator', 'sum', 'request','thongkes'));
    }
    public function export(Request $request)
    {
        return Excel::download(new BaoCaoExport($request), 'Baocao-' . Carbon::now()->format('M j, Y H-i-s') . '.xlsx');
    }
}
