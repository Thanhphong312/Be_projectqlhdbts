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

        return view('hopdong', compact('title'), $hopdong);
    }

    public function import()
    {
    }

    public function export()
    {
    }
}
