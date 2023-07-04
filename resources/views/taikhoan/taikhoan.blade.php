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
            <!-- start modal ajax edit, add--->
            <div class="modal fade" id="editTaiKhoan">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cập Nhật Tài Khoản</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form id="body_edit" class="form-horizontal" method="post" enctype="multipart/form-data">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addTaiKhoan">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Tài Khoản</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('taikhoan-store')}}" enctype="multipart/form-data">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  end modal ajax edit, add--->
            <!-- Content -->
            <div class="container">
                @php
                $quyen=null;
                if(auth()->user()){
                if(auth()->user()->quyennguoidungs()){
                if(auth()->user()->quyennguoidungs()->first()){
                $quyennd = auth()->user()->quyennguoidungs()->first()->Q_MaQ;
                }
                }
                }
                @endphp
                @if($quyennd=='Q0')
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" type="button" onclick=them_taikhoan()>
                        <i class="fas fa-plus"></i> Thêm</button>
                </div>
                @endif
                <div class="table-responsive p-3">
                    <table class="table table-bordered text-center p-2">
                        <thead>
                            <tr>
                                <th scope="col-6 col-md-3">STT</th>
                                <th scope="col-6 col-md-3">Avatar</th>
                                <th scope="col-6 col-md-3">Mã người dùng</th>
                                <th scope="col-6 col-md-3">Tên người dùng</th>
                                <th scope="col-6 col-md-3">Giới tính</th>
                                <th scope="col-6 col-md-3">Địa chỉ</th>
                                <th scope="col-6 col-md-3">Email</th>
                                <th scope="col-6 col-md-3">SĐT</th>
                                <th scope="col-6 col-md-3">Quyền người dùng</th>
                                <th scope="col-6 col-md-3">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1 ?>
                            @foreach($taikhoans as $taikhoan)
                            @php
                            $qnd = $taikhoan->quyennguoidungs()->first();
                            if($qnd){
                            $q = $qnd->quyen()->first();
                            $quyen = ($q)?$q->Q_TenQ:'';
                            }
                            if(!empty($role)&&$role->Q_MaQ!='Q0'){
                            if(!empty($q)){
                            if($q->Q_MaQ=='Q0'){
                            continue;
                            }
                            }
                            }
                            if(!empty($role)&&$role->Q_MaQ=='Q1'&&$taikhoan->id!=$id){
                            continue;
                            }
                            @endphp
                            <tr>
                                <th style="text-align:right" scope="row"><?= $stt++ ?></th>
                                <td style="text-align:left"><img src="{{asset($taikhoan->avatar)}}" alt="avatar" width="100" height="100"></td>
                                <td style="text-align:left">{{$taikhoan->ND_MaND}}</td>
                                <td style="text-align:left">{{$taikhoan->name}}</td>
                                <td style="text-align:left">{{$taikhoan->ND_GioiTinh}}</td>
                                <td style="text-align:left">{{$taikhoan->ND_DiaChi}}</td>
                                <td style="text-align:left">{{$taikhoan->email}}</td>
                                <td style="text-align:right">{{$taikhoan->ND_SDT}}</td>
                                <td style="text-align:left">{{$quyen}}</td>
                                <td>
                                    <div class="d-flex ">
                                        <a href="{{route('taikhoan-hienthi', $taikhoan->id)}}" class="btn btn-info me-md-3 m-1">
                                            <i class="fas fa-eye"></i> Xem
                                        </a>
                                        @if($quyennd=='Q0')
                                        <button type="submit" onclick=capnhat_taikhoan({{$taikhoan->id}}) class="btn btn-primary me-md-3 m-1">
                                            <i class="fas fa-edit"></i> Sửa
                                        </button>
                                        <form action="{{route('taikhoan-xoa', $taikhoan->id)}}" method="get">
                                            <button type="submit" onclick="return confirm('Bạn có đồng ý xóa hay không?')" class="btn btn-danger me-md-3 m-1">
                                                <i class="fas fa-trash-alt"></i> Xóa
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $taikhoans->links() }}
            </div>
        </div>

    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
<script>
    $('.close').click(function() {
        $('.modal').modal('hide');
    });

    function capnhat_taikhoan(id) {
        // $.get('{{Url("/design/edit")}}/' + id, function (data) {
        $.get('./taikhoan/chinhsua/' + id, function(data) {
            $("#body_edit").html(data);
            // console.log(data);
            // getDesignSuggest(id)
        });
        $('#editTaiKhoan').modal('show');
    }

    function them_taikhoan() {
        // $.get('{{Url("/design/edit")}}/' + id, function (data) {
        $.get('./taikhoan/them', function(data) {
            $("#body_add").html(data);
            // console.log(data);
            // getDesignSuggest(id)
        });
        $('#addTaiKhoan').modal('show');
    }
    $('#body_edit').submit(function(evt) {
        evt.preventDefault();
        var formData = new FormData(this);
        var id = $("#id").val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            //url: '{{Url("/design/update-post")}}',
            url: '/taikhoan/chinhsua/' + id,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                var successMessage = data.message;
                $('#editHopDong').modal('hide');
                window.location.href = './designs';
            },
        });
    });
</script>
@endsection