@extends('layouts.app')


@section('page-title', $title)

@section('message')
@include('partials.messages')
@endsection

@section('content')
<div class="content-main">
    <!-- start search -->
    @include('partials.common.search')
    <!-- end search  -->

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
                    <h5 class="text-center" id="side12">THÔNG TIN TÀI KHOẢN</h5>
                    <form method="post" action="{{route('taikhoan-sua', $hienthitaikhoan->id)}}">
                        @csrf
                        <div class="row justify-content-center mb-2">
                            <div class="container">
                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Mã người dùng:</div>
                                    <input name="ND_MaND" class="col-6 col-sm-6 btn " value="{{$hienthitaikhoan->ND_MaND}}"></input>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Tên người dùng:</div>
                                    <input name="name" class="col-6 col-sm-6 btn " value="{{$hienthitaikhoan->name}}"></input>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Giới tính:</div>
                                    <input name="ND_GioiTinh" class="col-6 col-sm-6 btn " value="{{$hienthitaikhoan->ND_GioiTinh}}"></input>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Địa chỉ:</div>
                                    <input name="ND_DiaChi" class="col-6 col-sm-6 btn " value="{{$hienthitaikhoan->ND_DiaChi}}"></input>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Email:</div>
                                    <input name="email" class="col-6 col-sm-6 btn " value="{{$hienthitaikhoan->email}}"></input>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Số điện thoại:</div>
                                    <input name="ND_SDT" class="col-6 col-sm-6 btn " value="{{$hienthitaikhoan->ND_SDT}}"></input>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Loại người dùng:</div>
                                    <label name="ND_LoaiND" class="col-6 col-sm-6">{{$hienthi->ND_LoaiND}}</label>
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