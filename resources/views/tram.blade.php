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
                            <li class="breadcrumb-item active"><a href="#">Trạm</a></li>
                        </ol> -->
                        @include('partials.common.breadcrumb')
                    </nav>
                    <!-- menu in mobile -->
                    @include('partials.common.mobile-menu')
                </div>
            </nav>

            <!-- Content -->
            <div class="container">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col-6 col-md-4">STT</th>
                            <th scope="col-6 col-md-4">Mã trạm</th>
                            <th scope="col-6 col-md-4">Tên trạm</th>
                            <th scope="col-6 col-md-4">Địa chỉ</th>
                            <th scope="col-6 col-md-4">Tình trạng</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1 ?>
                        @foreach($tram as $row)
                        <tr>
                            <th scope="row"><?= $stt++ ?></th>
                            <td>{{$row->T_MaTram}}</td>
                            <td>{{$row->T_TenTram}}</td>
                            <td>{{$row->T_DiaChiTram}}</td>
                            <td><input type="checkbox" name="tinhtrang"></td>
                            <td>
                                <button class="btn btn-primary me-md-3">
                                    <i class="fas fa-edit"></i> Sửa
                                </button>
                                <button class="btn btn-danger me-md-3">
                                    <i class="fas fa-trash-alt"></i> Xóa
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Them tram -->
            <div class="container col-md-5 mt-2">
                <div class="alert alert-primary">
                    <form>
                        <div class="row justify-content-center">
                            <h5 class="text-center" style="font-weight: bold;" id="side12">THÊM TRẠM</h5>
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Mã trạm
                                <span id="colorIcon">*</span>
                            </label>
                            <input class="form-control" type="text" placeholder="Vui lòng nhập mã trạm!">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên trạm
                                <span id="colorIcon">*</span>
                            </label>
                            <input class="form-control" type="text" placeholder="Vui lòng nhập tên trạm!">
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