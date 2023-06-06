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
                <a href="{{route('taikhoan-them')}}" class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </a>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col-6 col-md-3">STT</th>
                            <th scope="col-6 col-md-3">Mã người dùng</th>
                            <th scope="col-6 col-md-3">Tên người dùng</th>
                            <th scope="col-6 col-md-3">Địa chỉ</th>
                            <th scope="col-6 col-md-3">Email</th>
                            <th scope="col-6 col-md-3">SĐT</th>
                            <th scope="col-6 col-md-3">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1 ?>
                        @foreach($taikhoan as $row)
                        <tr>
                            <th scope="row"><?= $stt++ ?></th>
                            <td>{{$row->ND_MaND}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->ND_DiaChi}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->ND_SDT}}</td>
                            <td>
                                <form action="{{route('taikhoan-xoa',$row->id)}}" method="get">
                                    <a href="{{route('taikhoan-hienthi')}}" class="btn btn-primary me-md-3">
                                        <i class="fas fa-eye"></i> Xem
                                    </a>
                                    <button type="submit" onclick="return confirm('Bạn có đồng ý xóa hay không?')" class="btn btn-danger me-md-3">
                                        <i class="fas fa-trash-alt"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
@endsection