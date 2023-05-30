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
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <div class="container-fluid justify-content-start">
                    <button type="button" id="sidebarCollapse" class="btn btn-secondary m-2 hidden-mobile">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <!-- page show in mobile -->
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto m-2 hidden-window" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <nav aria-label="breadcrumb " style="height:25px">
                        <!-- <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active"><a href="#">Tài khoản</a></li>
                        </ol> -->
                        @include('partials.common.breadcrumb')
                    </nav>
                    <!-- menu in mobile -->
                    @include('partials.common.mobile-menu')
                </div>
            </nav>

            <!-- Content -->
            <!-- Add tài khoản-->
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success me-md-2 mt-1 mb-1" type="button">
                    <i class="fas fa-plus"></i> Thêm</button>
            </div>

            <!-- Table show tài khoản  -->
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col-6 col-md-3">STT</th>
                        <th scope="col-6 col-md-3">Tên người dùng</th>
                        <th scope="col-6 col-md-3">Email</th>
                        <th scope="col-6 col-md-3">Mật khẩu</th>
                        <th scope="col-6 col-md-3">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Nguyễn Văn A</td>
                        <td>aaaa@gmail.com</td>
                        <td>12345678</td>
                        <td>
                            <button class="btn btn-primary me-md-3">
                                <i class="fas fa-eye"></i> Xem
                            </button>
                            <button class="btn btn-danger me-md-3">
                                <i class="fas fa-trash-alt"></i> Xóa
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Trần Văn B</td>
                        <td>bbbb@gmail.com</td>
                        <td>abc12345</td>
                        <td>
                            <button class="btn btn-primary me-md-3">
                                <i class="fas fa-eye"></i> Xem
                            </button>
                            <button class="btn btn-danger me-md-3">
                                <i class="fas fa-trash-alt"></i> Xóa
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
@endsection