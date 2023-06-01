<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HopDongController extends Controller
{
    public function index()
    {
        $title = 'Hợp Đồng';

        $hopdong['hopdong'] = DB::table('hop_dong')->get()->toArray();

        return view('hopdong/hopdong', compact('title'), $hopdong);
    }

    public function capnhat() {
        $title = 'Hợp Đồng';
        return view('hopdong/capnhat', compact('title'));
    }

    public function import()
    {
    }

    public function export()
    {
    }
}
