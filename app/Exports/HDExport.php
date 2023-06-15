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
        $HopDong = HopDong::get();
        if ($this->request ->get('search')!=""){
            $HopDong = $HopDong->where('HD_MaHD', 'LIKE', '%'.$this->request ->get('search').'%');
        }
        return view('HDexport', [
            'HopDong' => $HopDong
        ]);
    }
}
