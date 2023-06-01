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
            <div class="container">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </div>
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
                        <?php $stt = 1 ?>
                        @foreach($taikhoan as $row)
                        <tr>
                            <th scope="row"><?= $stt++ ?></th>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->password}}</td>
                            <td>
                                <button class="btn btn-primary me-md-3">
                                    <i class="fas fa-eye"></i> Xem
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

            <div class="container col-md-5 mt-2">
                <div class="alert alert-primary">
                    <form>
                        <div class="row justify-content-center mb-2">
                            <h5 class="text-center" id="side12">THÔNG TIN TÀI KHOẢN</h5>

                            <div class="container">
                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Họ và tên:</div>
                                    <div class="col-6 col-sm-6">Bùi Phương Thảo</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Giới tính:</div>
                                    <div class="col-6 col-sm-6">
                                        <label><input type="checkbox" name="html" value="html"> Nam</label>
                                        <label><input type="checkbox" name="html" value="html" checked> Nữ</label><br />
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Địa chỉ:</div>
                                    <div class="col-6 col-sm-6"> Ninh Kiều - Cần Thơ</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6">Email:</div>
                                    <div class="col-6 col-sm-6">bpthao1234@gmail.com</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 col-sm-6"> Mật khẩu:</div>
                                    <div class="col-6 col-sm-6">********</div>
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