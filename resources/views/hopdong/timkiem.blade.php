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
            <?php $stt = 1 ?>
            @if ($hopdong->count() > 0)
            <div class="container" style="max-width: 1090px;">
                <form action="{{route('start-import')}}" class="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--import-->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="file" name="file" id="file" class="btn btn-success me-md-2 mt-1 mb-1" />
                        <button type="submit" class="btn btn-success me-md-2 mt-1 mb-1">Import</button>
                    </div>
                    <!--Export-->
                    <a href="{{route('export')}}" class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <div class="btn btn-secondary me-md-2 mt-1 mb-1">Export</div>
                    </a>
                </form>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <div>
                                <thead>
                                    <tr>
                                        <th scope="col-6 col-md-4">STT</th>
                                        <th scope="col-6 col-md-4">Mã HĐ</th>
                                        <th scope="col-6 col-md-4">Tên tài khoản</th>
                                        <th scope="col-6 col-md-4">Số tài khoản</th>
                                        <th scope="col-6 col-md-4">Tại ngân hàng</th>
                                        <th scope="col-6 col-md-4">Ngày ký HĐ</th>
                                        <th scope="col-6 col-md-4">Ngày hết hạn</th>
                                        <th scope="col-6 col-md-4">Giá thuê</th>
                                        <th scope="col-6 col-md-4">Mã trạm theo HĐ</th>
                                        <th scope="col-6 col-md-4">Tên trạm</th>
                                        <th scope="col-6 col-md-4">Mã CSHT</th>
                                        <th scope="col-6 col-md-4">Tên chủ đầu tư</th>
                                        <th scope="col-6 col-md-4">Hợp đồng</th>
                                        <th scope="col-6 col-md-4">Ngày phụ lục</th>
                                        <th scope="col-6 col-md-4">Tùy chỉnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hopdong as $row)
                                    <tr>
                                        <th scope="row"><?= $stt++ ?></th>
                                        <td>{{$row->HD_MaHD}}</td>
                                        <td>{{$row->HD_TenCTK}}</td>
                                        <td>{{$row->HD_SoTaiKhoan}}</td>
                                        <td>{{$row->HD_TenNH}}</td>
                                        <td>{{$row->HD_NgayDangKy}}</td>
                                        <td>{{$row->HD_NgayHetHan}}</td>
                                        <td>{{$row->HD_GiaHienTai}} VNĐ</td>
                                        <td>{{$row->T_MaTram}}</td>
                                        <td>{{$row->T_TenTram}}</td>
                                        <td>{{$row->HD_MaCSHT}}</td>
                                        <td>{{$row->HD_TenChuDauTu}}</td>
                                        <td><a href="{{$row->HD_HDScan}}">Hợp Đồng PDF</a></td>
                                        <td><input type="date" name="" id="" value={{$row->HD_NgayPhuLuc}}></td>
                                        <td>
                                            <a href="{{route('hopdong-capnhat')}}" class="btn btn-primary me-md-3">
                                                <i class="fas fa-edit"></i> Cập nhật
                                            </a>
                                            <button class="btn btn-secondary me-md-3">
                                                <i class="fas fa-download"></i> Tải về
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </div>
                            @else <h3 class="container">Hợp đồng đã tìm kiếm không tồn tại</h3>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')

@endsection