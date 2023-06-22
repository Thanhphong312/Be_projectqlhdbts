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
            @if (!empty($request->search)&&$phuluc->count() <= 0)
            <h3 class="container">Hợp đồng đã tìm kiếm không tồn tại</h3>
            @else
            <div class="container">
                @csrf
                <!--import-->
                <form action="{{route('export')}}" class="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--Export-->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button name="export" class="btn btn-secondary me-md-2 mt-1 mb-1">
                            Export
                        </button>
                        <button name="exportall" class="btn btn-secondary me-md-2 mt-1 mb-1">
                            Export All
                        </button>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col-6 col-md-4">Mã HĐ</th>
                                        <th scope="col-6 col-md-4">Nội dung chỉnh sửa</th>
                                        <th scope="col-6 col-md-4">Tên chủ tài khoản</th>
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
                                    @foreach($phuluc as $row)
                                    <tr>
                                        <input type="hidden" value="{{$row->HD_MaHD}}" name="HD[{{$row->HD_MaHD}}]">
                                        <td>{{$row->HD_MaHD}}</td>
                                        <td>{{$row->noidung}}</td>
                                        <td>{{$row->HD_TenCTK}}</td>
                                        <td>{{$row->HD_SoTaiKhoan}}</td>
                                        <td>{{$row->HD_TenNH}}</td>
                                        <td>{{\Carbon\Carbon::parse($row->HD_NgayDangKy)->format('d/m/Y')}}</td>
                                        <td>{{\Carbon\Carbon::parse($row->HD_NgayHetHan)->format('d/m/Y')}}</td>
                                        <td>{{$row->HD_GiaHienTai}}</td>
                                        <td>{{$row->T_MaTram}}</td>
                                        <td>{{$row->T_TenTram}}</td>
                                        <td>{{$row->HD_MaCSHT}}</td>
                                        <td>{{$row->HD_TenChuDauTu}}</td>
                                        <td><a href="{{$row->HD_HDScan}}">Hợp Đồng PDF</a></td>
                                        <td>{{\Carbon\Carbon::parse($row->HD_NgayPhuLuc)->format('d/m/Y')}}</td>
                                        <td>
                                            <a class="btn btn-secondary me-md-3" href="{{ $row->HD_HDScan }}">Download PDF</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $phuluc->links() }}
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')

@endsection