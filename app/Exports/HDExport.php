<?php

namespace App\Exports;

use App\Models\HopDong;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Request;
class HDExport implements FromView
{
    protected $request;
    public function __construct($request){
        $this->request = $request;
    }
    public function view(): View
    {
        $hd = [];
        if($this->request->has('exportall')){
            $HopDong = HopDong::get();
        }else{
            foreach($this->request->DH as $value){
                array_push($hd,$value);
            }
            $HopDong = HopDong::wherein('HD_MaHD', $hd)->get();
        }
        
        return view('HDexport', [
            'HopDong' => $HopDong
        ]);
    }
}
