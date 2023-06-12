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
                    @foreach($capnhathopdong as $capnhat)
                    <form method="post" action="{{route('hopdong-update', $capnhat->HD_MaHD)}}">
                        @csrf
                        <div class="row justify-content-center">
                            <h5 class="text-center" id="side12">CẬP NHẬT HỢP ĐỒNG</h5>
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Mã hợp đồng</label>
                            <label style="cursor: not-allowed;" name="HD_MaHD" class="form-control">{{$capnhat->HD_MaHD}}</label>
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Tên chủ tài khoản
                                <span id="colorIcon">*</span>
                            </label>
                            <input required value="{{$capnhat->HD_TenCTK}}" name="HD_TenCTK" class="form-control" type="text" placeholder="Vui lòng nhập tên chủ tài khoản">
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Số tài khoản
                                <span id="colorIcon">*</span>
                            </label>
                            <input required value="{{$capnhat->HD_SoTaiKhoan}}" name="HD_SoTaiKhoan" class="form-control" type="text" placeholder="Vui lòng nhập số tài khoản">
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Tên ngân hàng
                                <span id="colorIcon">*</span>
                            </label>
                            <input required value="{{$capnhat->HD_TenNH}}" name="HD_TenNH" class="form-control" type="text" placeholder="Vui lòng nhập tên ngân hàng">
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Ngày ký hợp đồng
                                <span id="colorIcon">*</span>
                            </label>
                            <input style="cursor: pointer;" required value="{{$capnhat->HD_NgayDangKy}}" name="HD_NgayDangKy" class="form-control" type="date">
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Ngày hết hạn hợp đồng
                                <span id="colorIcon">*</span>
                            </label>
                            <input style="cursor: pointer;" required value="{{$capnhat->HD_NgayHetHan}}" name="HD_NgayHetHan" class="form-control" type="date">
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Giá thuê
                                <span id="colorIcon">*</span>
                            </label>
                            <input required value="{{$capnhat->HD_GiaHienTai}}" class="form-control" name="HD_GiaHienTai" type="text" placeholder="Vui lòng nhập giá">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mã trạm
                                <span id="colorIcon">*</span>
                            </label>
                            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" name="T_MaTram">
                                @foreach($trams as $tram)
                                <option value="{{$tram->T_MaTram}}">{{$tram->T_MaTram}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên trạm
                                <span id="colorIcon">*</span>
                            </label>
                            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" name="T_TenTram">
                                @foreach($trams as $tram)
                                <option value="{{$tram->T_TenTram}}">{{$tram->T_TenTram}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mã CSHT
                                <span id="colorIcon">*</span>
                            </label>
                            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" name="CSHT_MaCSHT">
                                @foreach($cshts as $csht)
                                <option value="{{$csht->CSHT_MaCSHT}}">{{$csht->CSHT_MaCSHT}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Tên chủ đầu tư
                                <span id="colorIcon">*</span>
                            </label>
                            <input required value="{{$capnhat->HD_TenChuDauTu}}" name="HD_TenChuDauTu" class="form-control" type="text" placeholder="Vui lòng nhập tên chủ đầu tư">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hợp đồng Scan</label>
                            <input required value="{{$capnhat->HD_HDScan}}" name="HD_HDScan" class="form-control" type="text">
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Ngày phụ lục
                                <span id="colorIcon">*</span>
                            </label>
                            <input style="cursor: pointer;" required value="{{$capnhat->HD_NgayPhuLuc}}" name="HD_NgayPhuLuc" class="form-control" type="date">
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Người ký
                                <span id="colorIcon">*</span>
                            </label>
                            <input required value="{{$capnhat->Nguoiky}}" name="HD_Nguoiky" class="form-control" type="text">
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Khách hàng
                                <span id="colorIcon">*</span>
                            </label>
                            <input required value="{{$capnhat->Khachhang}}" name="HD_Khachhang" class="form-control" type="text">
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success col-md-5" id="side123">Cập nhật</button>
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