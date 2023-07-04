@extends('layouts.app')


@section('page-title', $title)

@section('message')
@include('partials.messages')
@endsection

@section('content')
<div class="content-main">
    <!-- start body -->
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('partials.common.slide-bar')

        <!-- Page Content  -->
        <div id="content">
            <!-- Tieu de -->
            @include('partials.common.tieude')
            <!-- start modal ajax edit--->
            <div class="modal fade" id="editHopDong">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cập Nhật Hợp Đồng</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form id="body_edit" class="form-horizontal" method="post" enctype="multipart/form-data">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  end modal ajax edit--->
            <!-- Content -->
            <?php $stt = 1 ?>
            @if (!empty($request->search)&&$hopdong->count() <= 0) <h3 class="container">Hợp đồng đã tìm kiếm không tồn tại</h3>
                @else
                <div class="container">
                    <!-- start search -->
                    @include('partials.common.search')
                    <!-- end search  -->
                    @csrf
                    <!--import-->
                    @php
                    if(auth()->user()){
                    $quyens = auth()->user()->quyennguoidungs()->where('Q_MaQ', 'Q1')->first();
                    }
                    @endphp
                    <form action="{{route('start-import')}}" class="form d-flex justify-content-between align-items-center" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="text-left">
                            <ul class="text-left">Chú thích:
                                <li class="text-warning">Màu cam: Hợp đồng đã hết hạn</li>
                                <li class="text-dark">Màu đen: Hợp đồng chưa hết hạn</li>
                            </ul>
                        </div>
                        @if($quyens)
                        <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                            <input type="file" name="file" id="file" class="btn btn-success me-md-2 mt-1 mb-1" />
                            <button type="submit" class="btn btn-success me-md-2 mt-1 mb-1">Import</button>
                        </div>
                        @endif
                    </form>
                    <form action="{{route('export')}}" class="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--Export-->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button name="export" class="btn btn-secondary me-md-2 mt-1 mb-1">
                                Export
                            </button>
                            <button name="exportall" class="btn btn-secondary me-md-2 mt-1 mb-1">
                                Export All
                            </button>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col-6 col-md-4" style="min-width: 100px;">Mã HĐ</th>
                                            <th scope="col-6 col-md-4">Tên chủ tài khoản</th>
                                            <th scope="col-6 col-md-4">Số tài khoản</th>
                                            <th scope="col-6 col-md-4" style="min-width: 120px;">Tại ngân hàng</th>
                                            <th scope="col-6 col-md-4">Ngày ký HĐ</th>
                                            <th scope="col-6 col-md-4" style="min-width: 120px;">Ngày hết hạn</th>
                                            <th scope="col-6 col-md-4">Giá thuê (VNĐ)</th>
                                            <th scope="col-6 col-md-4" style="min-width: 150px">Mã trạm theo HĐ</th>
                                            <th scope="col-6 col-md-4" style="min-width: 120px;">Tên trạm</th>
                                            <th scope="col-6 col-md-4">Mã CSHT</th>
                                            <th scope="col-6 col-md-4">Tên chủ đầu tư</th>
                                            <th scope="col-6 col-md-4" style="min-width: 120px;">Thời hạn</th>
                                            <th scope="col-6 col-md-4" style="min-width: 120px;">Ngày phụ lục</th>
                                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($hopdong as $row)
                                        @php
                                        $ngayhethan = \Carbon\Carbon::parse($row->HD_NgayHetHan);
                                        $now = \Carbon\Carbon::now();
                                        $diffInDays = 0;
                                        if($ngayhethan>$now){
                                        $diffInDays = $now->diffInDays($ngayhethan);
                                        }else{
                                        $diffInDays = -$now->diffInDays($ngayhethan);
                                        }
                                        $color = "";
                                        if($diffInDays<=30){ //do $color="red" ; }else if($diffInDays>30){
                                            if($diffInDays>60){ //xanh
                                            $color = "black";
                                            }else{//cam
                                            $color = "orange";
                                            }
                                            }
                                            if ($diffInDays < 31) { $unit="ngày" ; } elseif ($diffInDays < 365) { $diffInDays=round($diffInDays / 30); $unit="tháng" ; } else { $diffInDays=round($diffInDays / 365); $unit="năm" ; } @endphp <tr style="color: {{$color}};">
                                                <input type="hidden" value="{{$row->HD_MaHD}}" name="HD[{{$row->HD_MaHD}}]">
                                                <td style="text-align:left">{{$row->HD_MaHD}}</td>
                                                <td style="text-align:left">{{$row->HD_TenCTK}}</td>
                                                <td style="text-align:right">{{$row->HD_SoTaiKhoan}}</td>
                                                <td style="text-align:left">{{$row->HD_TenNH}}</td>
                                                <td style="text-align:right">{{\Carbon\Carbon::parse($row->HD_NgayDangKy)->format('d/m/Y')}}</td>
                                                <td style="text-align:right">{{\Carbon\Carbon::parse($row->HD_NgayHetHan)->format('d/m/Y')}}</td>
                                                <td style="text-align:right">{{$row->HD_GiaHienTai}}</td>
                                                <td style="text-align:left">{{$row->T_MaTram}}</td>
                                                <td style="text-align:left">{{$row->T_TenTram}}</td>
                                                <td style="text-align:left"> {{$row->HD_MaCSHT}}</td>
                                                <td style="text-align:left">{{$row->HD_TenChuDauTu}}</td>
                                                <td>
                                                    @if ($diffInDays <= 0) Hết hạn @else {{$diffInDays}} {{$unit}} @endif </td>
                                                <td>{{\Carbon\Carbon::parse($row->HD_NgayPhuLuc)->format('d/m/Y')}}</td>
                                                <td>
                                                    @if($quyens)
                                                    <a onclick=capnhat_hopdong('{{$row->HD_MaHD}}') class="btn btn-primary me-md-3">
                                                        <i class="fas fa-edit"></i> Cập nhật
                                                    </a>
                                                    @endif
                                                    <a class="btn btn-secondary me-md-3" href="{{ $row->HD_HDScan }}">File PDF</a>
                                                </td>
                                                </tr>
                                                @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $hopdong->links() }}
                        </div>
                    </form>
                    <!-- <div class="alert" style="text-align: center;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Hướng dẫn sử dụng</button>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="height: 100%;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Hướng dẫn chi tiết</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe width="100%" height="500px" class="" src="https://docs.google.com/document/d/e/2PACX-1vRWb1Uq5c6C_cjv_ThdRwfrXjXuozhnauS36ba70nUZeGbd_YBpZItZhUjZkG21VXiAsX0a2gRFQi4c/pub?embedded=true" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                @endif
        </div>
    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')

<script>
    // $('#myModal').on('shown.bs.modal', function() {
    //     $('#myInput').trigger('focus')
    // })
    $('.close').click(function() {
        $('#editHopDong').modal('hide');
    });

    function capnhat_hopdong(HD_MaHD) {
        // $.get('{{Url("/design/edit")}}/' + id, function (data) {
        $.get('./hopdong/capnhat/' + HD_MaHD, function(data) {
            $("#body_edit").html(data);
            // console.log(data);
            // getDesignSuggest(id)
        });
        $('#editHopDong').modal('show');

    }
    $('#body_edit').submit(function(evt) {
        evt.preventDefault();
        var formData = new FormData(this);
        var HD_MaHD = $("#HD_MaHD").val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            //url: '{{Url("/design/update-post")}}',
            url: './hopdong/update/' + HD_MaHD,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                var successMessage = data.message;
                if (successMessage) {
                    $('#editHopDong').modal('hide');
                    window.location.href = './hopdong';
                }

            },
        });
    });
</script>

@endsection