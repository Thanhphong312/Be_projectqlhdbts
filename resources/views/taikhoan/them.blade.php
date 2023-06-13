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
                    <form method="POST" action="{{route('taikhoan-store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <h5 class="text-center" id="side12">THÊM TÀI KHOẢN</h5>
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Ảnh đại diện
                                <span id="colorIcon">*</span>
                            </label>
                            <input class="form-control" type="file" name="avatar" placeholder="Vui lòng nhập mã người dùng">
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Mã người dùng
                                <span id="colorIcon">*</span>
                            </label>
                            <input required class="form-control" type="text" name="ND_MaND" placeholder="Vui lòng nhập mã người dùng">
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Tên người dùng
                                <span id="colorIcon">*</span>
                            </label>
                            <input required class="form-control" type="text" name="name" placeholder="Vui lòng nhập tên người dùng">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giới tính
                                <span id="colorIcon">*</span>
                            </label>
                            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="tt" name="gioiTinh">
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ
                                <span id="colorIcon">*</span>
                            </label>
                            <input required class="form-control" type="text" name="diaChi" placeholder="Vui lòng nhập địa chỉ">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email
                                <span id="colorIcon">*</span>
                            </label>
                            <input required class="form-control" type="email" name="email" placeholder="Vui lòng nhập email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu
                                <span id="colorIcon">*</span>
                            </label>
                            <input required class="form-control" type="password" name="password" placeholder="Vui lòng nhập mật khẩu">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SĐT
                                <span id="colorIcon">*</span>
                            </label>
                            <input required class="form-control" type="text" name="ND_SDT" placeholder="Vui lòng nhập số điện thoại">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Loại người dùng
                                <span id="colorIcon">*</span>
                            </label>
                            <select required class="form-control" aria-label="Default select example" id="firstSelect" name="Ma_Q">
                                @foreach($quyens as $quyen)
                                    <option value="{{$quyen->Q_MaQ}}">{{$quyen->Q_TenQ}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Đơn Vị
                                <span id="colorIcon">*</span>
                            </label>  
                            <select required class="form-control" aria-label="Default select example" id="secondSelect" name="Ma_DV" style="display: none;">
                                @foreach($donvis as $donvi)
                                    <option value="{{$donvi->DV_MaDV}}">{{$donvi->DV_TenDV}}</option>
                                @endforeach
                            </select>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    document.getElementById('firstSelect').addEventListener('change', function() {
    if (this.value === 'Q1') {
        document.getElementById('secondSelect').style.display = 'block';
    }else {
        document.getElementById('secondSelect').style.display = 'none';
    }
}); 
</script>
@endsection