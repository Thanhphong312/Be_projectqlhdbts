<?php

namespace App\Http\Controllers;
use App\Exports\HDExport;
use App\Models\HopDong;
use App\Imports\HDImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class HopDongController extends Controller
{
    public function index()
    {
        $title = 'Hợp Đồng';
        $breadcrumbs = ['Hợp đồng'];
        // dd($dv);
        $dv=auth()->user()->nguoidungdonvis()->first();
        if(!empty($dv))
            $hopdong['hopdong'] = DB::table('hop_dong')->where('DV_MaDV',$dv->DV_MaDV)->get()->toArray();
        else
            $hopdong['hopdong'] = DB::table('hop_dong')->get()->toArray();
        return view('hopdong/hopdong', compact('title','breadcrumbs'), $hopdong);
    }

    public function capnhat() {
        $title = 'Hợp Đồng';
        $breadcrumbs = ['Hợp đồng','Cập nhật'];
        return view('hopdong/capnhat', compact('title','breadcrumbs'));
    }

    public function import(Request $request) 
    {
        // dd($request);

        $validator = Validator::make($request->all(),[
            'file' => 'required'
        ]);
        if($validator->passes()){
            
            $file = $request->file;
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move(public_path().'/uploads',$fileName);
            $path = public_path().'/uploads/'.$fileName;
            // dd('a');

            Excel::import(new HDImport, $path);
            return redirect(route('import'))->with('success', 'import thành công');
        }else{
            return redirect()->back()->withErrors($validator);
        }
    }

    public function export()
    {
        return Excel::download(new HDExport, 'HD.xlsx');
    }
}