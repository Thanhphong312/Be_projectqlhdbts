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
                        <div class="row">
                            <h5 class="text-center" id="side12">THÊM TÀI KHOẢN</h5>
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Tên người dùng
                                <span id="colorIcon">*</span>
                            </label>
                            <input class="form-control" type="text" placeholder="Vui lòng nhập tên người dùng!">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email
                                <span id="colorIcon">*</span>
                            </label>
                            <input class="form-control" type="text" placeholder="Vui lòng nhập email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu
                                <span id="colorIcon">*</span>
                            </label>
                            <input class="form-control" type="password" placeholder="Vui lòng nhập mật khẩu">
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success col-md-5" id="side123">Thêm</button>
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