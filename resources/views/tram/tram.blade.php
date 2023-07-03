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
            <div class="modal fade" id="edittram">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cập Nhật Trạm</h4>
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
            <div class="modal fade" id="addtram">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Trạm</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('tram-store')}}" enctype="multipart/form-data">
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
                $quyen = auth()->user()->quyennguoidungs()->first()->Q_MaQ;
                }
                }
                @endphp
                @if($quyen=='Q0')
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" onclick=them_tram() type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </div>
                @endif
                <div class="table-responsive p-3">
                    <table class="table table-bordered text-center ">
                        <thead>
                            <tr>
                                <th scope="col-6 col-md-4">Mã trạm</th>
                                <th scope="col-6 col-md-4">Tên trạm</th>
                                <th scope="col-6 col-md-4">Địa chỉ</th>
                                <th scope="col-6 col-md-4">Tình trạng</th>
                                <th scope="col-6 col-md-4">Tọa độ</th>
                                <th scope="col-6 col-md-4">Đơn vị quản lý Trạm</th>
                                <th scope="col-6 col-md-4">Tùy chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trams as $tram)
                            <tr>
                                <td style="text-align:left">{{$tram->T_MaTram}}</td>
                                <td style="text-align:left">{{$tram->T_TenTram}}</td>
                                <td style="text-align:left">{{$tram->T_DiaChiTram}}</td>
                                <td style="text-align:left">{{$tram->T_TinhTrang}}</td>
                                <td style="text-align:left"><textarea cols="40" rows="3" disabled>{{$tram->toado}}</textarea> </td>
                                <td style="text-align:left" style="width:100px">{{($tram->dvqltram())?$tram->dvqltram()->first()->Ten_DV:""}}</td>
                                <td>
                                    <form action="{{route('tram-xoa', $tram->T_MaTram)}}" method="get">
                                        <button type="button" onclick=capnhat_tram('{{$tram->T_MaTram}}') class="btn btn-primary me-md-3">
                                            <i class="fas fa-edit"></i> Sửa
                                        </a>
                                        <button type="submit" onclick="return confirm('Bạn có đồng ý xóa hay không?')" class="btn btn-danger me-md-3">
                                            <i class="fas fa-trash-alt"></i> Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $trams->links() }}
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

        function capnhat_tram(T_MaTram) {
            // $.get('{{Url("/design/edit")}}/' + id, function (data) {
            $.get('./tram/chinhsua/' + T_MaTram, function(data) {
                $("#body_edit").html(data);
                // console.log(data);
                // getDesignSuggest(id)
            });
            $('#edittram').modal('show');
        }

        function them_tram() {
            // $.get('{{Url("/design/edit")}}/' + id, function (data) {
            $.get('./tram/them', function(data) {
                $("#body_add").html(data);
                // console.log(data);
                // getDesignSuggest(id)
            });
            $('#addtram').modal('show');
        }
        $('#body_edit').submit(function(evt) {
            evt.preventDefault();
            var formData = new FormData(this);
            var T_MaTram = $("#T_MaTram").val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                //url: '{{Url("/design/update-post")}}',
                url: './tram/update/' + T_MaTram,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    var successMessage = data.message;
                    $('#edittram').modal('hide');
                    window.location.href = './tram';
                },
            });
        });
    </script>
@endsection