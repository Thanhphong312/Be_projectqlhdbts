<div class="container ">
    <form action="{{route('thongke-export')}}" method="post" class="row">
        @csrf
        <div class="col-12">
            <div style="float: left;">
                <ul class="text-left">Báo cáo tổng:
                    <li class="text-dark">Tổng hợp đồng: {{count($thongkes)}} hợp đồng</li>
                    <li class="text-dark">Tổng giá trị hợp đồng: {{$sum}} VNĐ</li>
                </ul>
            </div>
            <div style="float: right;">
                <button name="export" class="btn btn-secondary me-md-2 mt-1 mb-1">
                    Export
                </button>
            </div>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col-6 col-md-4" style="min-width: 100px;">Mã HĐ</th>
                            <th scope="col-6 col-md-4">Tên chủ tài khoản</th>
                            <th scope="col-6 col-md-4" style="min-width: 100px;">Người dùng</th>
                            <th scope="col-6 col-md-4">Số tài khoản</th>
                            <th scope="col-6 col-md-4">Đơn vị</th>
                            <th scope="col-6 col-md-4" style="min-width: 120px;">Tại ngân hàng</th>
                            <th scope="col-6 col-md-4">Ngày ký HĐ</th>
                            <th scope="col-6 col-md-4" style="min-width: 120px;">Ngày hết hạn</th>
                            <th scope="col-6 col-md-4">Giá thuê</th>
                            <th scope="col-6 col-md-4" style="min-width: 150px">Mã trạm theo HĐ</th>
                            <th scope="col-6 col-md-4" style="min-width: 120px;">Tên trạm</th>
                            <th scope="col-6 col-md-4">Mã CSHT</th>
                            <th scope="col-6 col-md-4">Tên chủ đầu tư</th>
                            <th scope="col-6 col-md-4" style="min-width: 120px;">Thời hạn</th>
                            <th scope="col-6 col-md-4" style="min-width: 120px;">Ngày phụ lục</th>
                            <th scope="col-6 col-md-4" style="min-width: 120px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paginator as $row)
                        @php
                        $ngayhethan = \Carbon\Carbon::parse($row->HD_NgayHetHan);
                        $now = \Carbon\Carbon::now();
                        $diffInDays = 0;
                        if($ngayhethan>$now){
                        $diffInDays = $now->diffInDays($ngayhethan);
                        }else{
                        $diffInDays = -$now->diffInDays($ngayhethan);
                        }
                        $name = (\App\Models\User::where('id',$row->ND_MaND)->first())?\App\Models\User::where('id',$row->ND_MaND)->first()->name:'';
                        $donvi = (\App\Models\Donvi::where('DV_MaDV',$row->DV_MaDV)->first())?\App\Models\Donvi::where('DV_MaDV',$row->DV_MaDV)->first()->DV_TenDV:'';
                        if ($diffInDays < 31) {
                             $unit="ngày" ; 
                        } elseif ($diffInDays < 365) {
                             $diffInDays=round($diffInDays / 30);
                              $unit="tháng" ; 
                        } else { 
                            $diffInDays=round($diffInDays / 365); 
                            $unit="năm" ; 
                        } 
                        @endphp 
                         <tr style="color:{{($row->getTable()=='phu_luc')?'green':'';}}">
                            <input type="hidden" value="{{$row->HD_MaHD}}" name="HD[{{$row->HD_MaHD}}]">
                            <input type="hidden" value="{{$row->getTable()}}" name="type[{{$row->HD_MaHD}}]">
                            <td style="text-align:left">{{$row->HD_MaHD}}</td>
                            <td style="text-align:left">{{$row->HD_TenCTK}}</td>
                            <td style="text-align:left">{{$name}}</td>
                            <td style="text-align:right">{{$row->HD_SoTaiKhoan}}</td>
                            <td style="text-align:right">{{$donvi}}</td>
                            <td style="text-align:left">{{$row->HD_TenNH}}</td>
                            <td style="text-align:right">{{\Carbon\Carbon::parse($row->HD_NgayDangKy)->format('d/m/Y')}}</td>
                            <td style="text-align:right">{{\Carbon\Carbon::parse($row->HD_NgayHetHan)->format('d/m/Y')}}</td>
                            <td style="text-align:right">{{$row->HD_GiaHienTai}} VND</td>
                            <td style="text-align:left">{{$row->T_MaTram}}</td>
                            <td style="text-align:left">{{$row->T_TenTram}}</td>
                            <td style="text-align:left"> {{$row->HD_MaCSHT}}</td>
                            <td style="text-align:left">{{$row->HD_TenChuDauTu}}</td>
                            <td>
                            @if ($diffInDays <= 0) Hết hạn @else {{$diffInDays}} {{$unit}} @endif
                            </td>
                            <td>{{\Carbon\Carbon::parse($row->HD_NgayPhuLuc)->format('d/m/Y')}}</td>
                            <td>
                                <a class="btn btn-secondary me-md-3" href="{{ $row->HD_HDScan }}">Download PDF</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$paginator->links()}}
    </form>
</div>