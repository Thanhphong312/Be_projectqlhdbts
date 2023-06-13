<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HopDong;
use App\Models\CoSoHaTang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Tram;

class TimkiemController extends Controller
{
    public function timkiem(Request $request)
    {
        $title = 'Hợp Đồng';
        $breadcrumbs = [
            [
                'name'=>'Hợp đồng',
                'link'=>'./'
            ]
        ];

        $search = [];
        $rs = $request['search'] ?? "";
        if ($search != "") {
            $search['hopdong'] = HopDong::where('HD_MaHD', 'LIKE', "$rs")->orwhere('HD_MaCSHT', 'LIKE', "%$rs%")
                ->orwhere('T_TenTram', 'LIKE', "%$rs%")
                ->orwhere('T_MaTram', 'LIKE', "%$rs%")->get();
            return view('hopdong/timkiem', compact('title', 'breadcrumbs'), $search);
        }
    }
}
