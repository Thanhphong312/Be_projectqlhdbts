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
                    <form>
                        <div class="row justify-content-center mb-2">
                            <h5 class="text-center" id="side12">THÔNG TIN TÀI KHOẢN</h5>

                            <div class="container">
                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Họ và tên:</div>
                                    <div class="col-6 col-sm-6">{{auth()->user()->name}}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Giới tính:</div>
                                    <div class="col-6 col-sm-6">
                                        {{ strtolower(auth()->user()->ND_GioiTinh)}}
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Địa chỉ:</div>
                                    <div class="col-6 col-sm-6"> {{auth()->user()->ND_DiaChi}}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Email:</div>
                                    <div class="col-6 col-sm-6">{{auth()->user()->email}}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Số điện thoại:</div>
                                    <div class="col-6 col-sm-6">{{auth()->user()->ND_SDT}}</div>
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