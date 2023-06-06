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
                    @foreach($hienthitaikhoan as $hienthi)
                    <form method="post" action="{{route('taikhoan-view', $hienthi->id)}}">
                        @csrf
                        <div class="row justify-content-center mb-2">
                            <div class="container">
                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Mã người dùng:</div>
                                    <label name="ND_MaND" class="col-6 col-sm-6">{{$hienthi->ND_MaND}}</label>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Tên người dùng:</div>
                                    <label name="name" class="col-6 col-sm-6">{{$hienthi->name}}</label>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Giới tính:</div>
                                    <label name="ND_GioiTinh" class="col-6 col-sm-6">{{$hienthi->ND_GioiTinh}}</label>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Địa chỉ:</div>
                                    <label name="ND_DiaChi" class="col-6 col-sm-6">{{$hienthi->ND_DiaChi}}</label>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Email:</div>
                                    <label name="email" class="col-6 col-sm-6">{{$hienthi->email}}</label>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Số điện thoại:</div>
                                    <label name="ND_SDT" class="col-6 col-sm-6">{{$hienthi->ND_SDT}}</label>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Loại người dùng:</div>
                                    <label name="ND_LoaiND" class="col-6 col-sm-6">{{$hienthi->ND_LoaiND}}</label>
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