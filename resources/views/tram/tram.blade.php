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
        </div>

    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
@endsection