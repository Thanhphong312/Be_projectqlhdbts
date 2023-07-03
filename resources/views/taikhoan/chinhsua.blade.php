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
                    <h5 class="text-center" id="side12">SỬA TÀI KHOẢN</h5>
                    <form method="post" action="{{route('taikhoan-chinhsua', $sua->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
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
                                <div class="m-3 text-center">
                                    <label class="form-label">Ảnh đại diện
                                        <span id="colorIcon">*</span>
                                    </label>
                                    <input class="form-control" type="file" name="avatar" id="avatar">
                                    <img src="{{$avatar}}" alt="avatar" width="140" height="140">
                                </div>
                                <div class="mb-3 text-left">
                                    <label style="cursor: default;" class="form-label">Mã người dùng</label>
                                    <label style="cursor: not-allowed;" required name="ND_MaND" class="col-6 col-sm-6 form-control">{{$sua->ND_MaND}}</label>
                                </div>
                                <div class="mb-3 text-left">
                                    <label style="cursor: default;" class="form-label">Tên người dùng
                                        <span id="colorIcon">*</span>
                                    </label>
                                    <input required name="name" class="col-6 col-sm-6 form-control" value="{{$sua->name}}"></input>
                                </div>
                                <div class="mb-3 text-left">
                                    <label style="cursor: default;" class="form-label">Giới tính
                                        <span id="colorIcon">*</span>
                                    </label>
                                    <input required name="ND_GioiTinh" class="col-6 col-sm-6 form-control" value="{{$sua->ND_GioiTinh}}"></input>
                                </div>
                                <div class="mb-3 text-left">
                                    <label style="cursor: default;" class="form-label">Địa chỉ
                                        <span id="colorIcon">*</span>
                                    </label>
                                    <input required name="ND_DiaChi" class="col-6 col-sm-6 form-control" value="{{$sua->ND_DiaChi}}"></input>
                                </div>
                                <div class="mb-3 text-left">
                                    <label style="cursor: default;" class="form-label">Email
                                        <span id="colorIcon">*</span>
                                    </label>
                                    <input required name="email" type="email" class="col-6 col-sm-6 form-control" value="{{$sua->email}}"></input>
                                </div>
                                <div class="mb-3 text-left">
                                    <label style="cursor: default;" class="form-label">Số điện thoại
                                        <span id="colorIcon">*</span>
                                    </label>
                                    <input required name="ND_SDT" class="col-6 col-sm-6 form-control" value="{{$sua->ND_SDT}}"></input>
                                </div>
                                <div class="row justify-content-center m-3">
                                    <button type="submit" class="btn btn-success col-md-5" id="side123">Sửa</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
@endsection