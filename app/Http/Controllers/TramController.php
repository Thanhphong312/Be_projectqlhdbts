<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TramController extends Controller
{
    public function index()
    {
        $title = 'Trạm';
        $breadcrumbs = ['Trạm'];
        $tram['tram'] = DB::table('tram')->get()->toArray();

        return view('tram/tram', compact('title','breadcrumbs'), $tram);
    }

    public function them() {
        $title = 'Trạm';
<<<<<<< HEAD

        return view('tram/them', compact('title'));
=======
        $breadcrumbs = ['Trạm','Thêm'];

        return view('tram/them', compact('title','breadcrumbs'));
>>>>>>> ea9ba7a16c8795847b954017a01415a034202cd2
    }

    public function chinhsua() {
        $title = 'Trạm';
        return view('tram/chinhsua', compact('title'));
    }


    public function store(Request $request) {
        $add = new Tram();
        $add->T_MaTram = $request->input('maTram');
        $add->T_TenTram = $request->input('tenTram');
        $add->T_DiaChiTram = $request->input('diaChi');

        $add->save();

        return redirect('add')->with('status', 'Insert thành công');
    }
}