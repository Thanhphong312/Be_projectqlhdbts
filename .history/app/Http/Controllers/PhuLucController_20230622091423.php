<?php

namespace App\Http\Controllers;

use App\Exports\HDExport;
use App\Models\HopDong;
use App\Imports\HDImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;
use App\Models\CoSoHaTang;
use App\Models\Tram;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class HopDongController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $title = 'Hợp Đồng';
        $breadcrumbs = [
            [
                'name' => 'Hợp đồng',
                'link' => './hopdong'
            ]
        ];
        $dv = auth()->user()->nguoidungdonvis()->first();
        if ($request->search) {
            if (!empty($dv)) {
                $phuluc['phuluc'] = DB::table('phu_luc')->where('DV_MaDV', $dv->DV_MaDV)
                    ->where('HD_MaHD', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('HD_MaCSHT', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('T_TenTram', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('T_MaTram', 'LIKE', '%' . $request->get('search') . '%')->paginate(5);
                return view('phuluc/phuluc', compact('title', 'breadcrumbs','request'), $phuluc);
            } else {
                $phuluc['phuluc'] = DB::table('phu_luc')->where('HD_MaHD', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('HD_MaCSHT', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('T_TenTram', 'LIKE', '%' . $request->get('search') . '%')
                    ->orwhere('T_MaTram', 'LIKE', '%' . $request->get('search') . '%')->paginate(5);
                return view('phuluc/phuluc', compact('title', 'breadcrumbs','request'), $phuluc);
            }
        } else {
            if (!empty($dv))
                $phuluc['phuluc'] = DB::table('phu_luc')->where('DV_MaDV', $dv->DV_MaDV)->orderByRaw("CAST(SUBSTR(HD_MaHD, 3) AS UNSIGNED)")->paginate(5);
            else
                $phuluc['phuluc'] = DB::table('phu_luc')->orderByRaw("CAST(SUBSTR(HD_MaHD, 3) AS UNSIGNED)")->paginate(5);

            return view('phuluc/phuluc', compact('title', 'breadcrumbs','request'), $phuluc);
        }
    }

    public function export(Request $request)
    {
        return Excel::download(new HDExport($request), 'HD-'.Carbon::now()->format('M j, Y H-i-s').'.xlsx');
    }
}
