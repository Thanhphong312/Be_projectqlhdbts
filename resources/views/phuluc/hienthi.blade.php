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

            <!-- Content -->
            <div class="container col-md-5 mt-2">
                <div class="alert alert-primary">
                    <h5 class="text-center" id="side12">THÔNG TIN PHỤ LỤC</h5>
                    @foreach($hienthiphuluc as $hienthipl)
                    <form method="post" action="{{route('phuluc-hienthi', $hienthipl->id)}}">
                        @csrf
                        <div class="row justify-content-center mb-2">
                            <div class="container">
                                <style>
                                    .text-view {
                                        color: #212529;
                                        text-align: center;
                                        display: inline-block;
                                        font-weight: 400;
                                        line-height: 1.5;
                                        cursor: text;
                                        border: 1px solid transparent;
                                        padding: 0.375rem 0.75rem;
                                        font-size: 1rem;
                                    }
                                </style>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Mã HĐ:</div>
                                    <label name="ND_MaND" class="col-6 col-sm-6 text-view">{{$hienthipl->HD_MaHD}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Nội dung chỉnh sửa:</div>
                                    <label name="noidung" class="col-6 col-sm-6 text-view">
                                        <textarea disabled="">{{$hienthipl->noidung}}</textarea>
                                    </label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Tên chủ tài khoản:</div>
                                    <label name="HD_TenCTK" class="col-6 col-sm-6 text-view">{{$hienthipl->HD_TenCTK}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Số tài khoản:</div>
                                    <label name="HD_SoTaiKhoan" class="col-6 col-sm-6 text-view">{{$hienthipl->HD_SoTaiKhoan}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Tại ngân hàng:</div>
                                    <label name="HD_TenNH" class="col-6 col-sm-6 text-view">{{$hienthipl->HD_TenNH}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Ngày ký HĐ:</div>
                                    <label name="HD_NgayDangKy" class="col-6 col-sm-6 text-view">{{$hienthipl->HD_NgayDangKy}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Ngày hết hạn:</div>
                                    <label name="HD_NgayHetHan" class="col-6 col-sm-6 text-view">{{$hienthipl->HD_NgayHetHan}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Giá thuê:</div>
                                    <label name="HD_GiaHienTai" class="col-6 col-sm-6 text-view">{{$hienthipl->HD_GiaHienTai}} VND</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Mã trạm theo HĐ:</div>
                                    <label name="T_MaTram" class="col-6 col-sm-6 text-view">{{$hienthipl->T_MaTram}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Giá thuê:</div>
                                    <label name="HD_GiaHienTai" class="col-6 col-sm-6 text-view">{{$hienthipl->HD_GiaHienTai}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Tên trạm:</div>
                                    <label name="T_TenTram" class="col-6 col-sm-6 text-view">{{$hienthipl->T_TenTram}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Mã CSHT:</div>
                                    <label name="HD_MaCSHT" class="col-6 col-sm-6 text-view">{{$hienthipl->HD_MaCSHT}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Tên chủ đầu tư:</div>
                                    <label name="HD_TenChuDauTu" class="col-6 col-sm-6 text-view">{{$hienthipl->HD_TenChuDauTu}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Hợp đồng:</div>
                                    <label name="HD_HDScan" class="col-6 col-sm-6 text-view">
                                        <textarea disabled="">{{$hienthipl->HD_HDScan}}</textarea>
                                    </label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Ngày phụ lục:</div>
                                    <label name="HD_NgayPhuLuc" class="col-6 col-sm-6 text-view">{{$hienthipl->HD_NgayPhuLuc}}</label>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
@endsection