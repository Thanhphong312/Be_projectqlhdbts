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
                            <li class="breadcrumb-item active"><a href="#">Hợp đồng</a></li>
                        </ol> -->
                        @include('partials.common.breadcrumb')
                    </nav>
                    <!-- menu in mobile -->
                    @include('partials.common.mobile-menu')
                </div>
            </nav>

            <!-- Content -->
            <!-- import data -->
            <!-- <form action="{{url('import-csv')}}" method="POST" enctype="multipart/form-data">
            @csrf 
                <input type="file" name="file" accept=".xlsx"><br>
                <input type="submit" value="Import File Excel" name="import_csv" class="btn btn-warning">
            </form> -->

            <!-- export data -->
            <!-- <form action="{{url('export-csv')}}" method="POST">
            @csrf 
                <input type="submit" value="Export File Excel" name="export_csv" class="btn btn-success">
            </form> -->

            <!-- Add hợp đồng -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success me-md-2 mt-1 mb-1" type="button">
                    <i class="fas fa-plus"></i> Cập nhật</button>
            </div>

            <!-- Table show hợp đồng -->
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col-6 col-md-4">STT</th>
                        <th scope="col-6 col-md-4">Tên tài khoản</th>
                        <th scope="col-6 col-md-4">Tên chủ đầu tư</th>
                        <th scope="col-6 col-md-4">Ngày ký</th>
                        <th scope="col-6 col-md-4">Ngày hết hạn</th>
                        <th scope="col-6 col-md-4">Giá thuê</th>
                        <th scope="col-6 col-md-4">Tùy chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>ACB CN Hậu Giang</td>
                        <td>Nguyễn Thị Huỳnh Cầm</td>
                        <td><input type="date" name="" id=""></td>
                        <td><input type="date" name="" id=""></td>
                        <td>1.000.000VNĐ</td>
                        <td>
                            <button class="btn btn-primary me-md-3">
                                <i class="fas fa-edit"></i> Chi tiết
                            </button>
                            <button class="btn btn-secondary me-md-3">
                                <i class="fas fa-download"></i> Tải về
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>ACB CN Hậu Giang</td>
                        <td>Châu Thanh Nhã</td>
                        <td><input type="date" name="" id=""></td>
                        <td><input type="date" name="" id=""></td>
                        <td>2.000.000VNĐ</td>
                        <td>
                            <button class="btn btn-primary me-md-3">
                                <i class="fas fa-edit"></i> Chi tiết
                            </button>
                            <button class="btn btn-secondary me-md-3">
                                <i class="fas fa-download"></i> Tải về
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