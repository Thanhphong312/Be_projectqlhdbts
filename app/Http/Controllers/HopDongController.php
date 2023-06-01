<?php

namespace App\Http\Controllers;
use App\Exports\HDExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HopDongController extends Controller
{
    public function index()
    {
        $title = 'Hợp Đồng';
        $breadcrumbs = ['Hợp đồng'];
        $hopdong['hopdong'] = DB::table('hop_dong')->get()->toArray();

        return view('hopdong/hopdong', compact('title','breadcrumbs'), $hopdong);
    }

    public function capnhat() {
        $title = 'Hợp Đồng';
        $breadcrumbs = ['Hợp đồng','Cập nhật'];
        return view('hopdong/capnhat', compact('title','breadcrumbs'));
    }

    public function import()
    {
    }

    public function export()
    {
        return Excel::download(new HDExport, 'HD.xlsx');
    }
}
