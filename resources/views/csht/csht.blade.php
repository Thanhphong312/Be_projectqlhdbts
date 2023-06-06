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
                <a href="{{route('csht-them')}}" class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </a>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col-6 col-md-4">STT</th>
                            <th scope="col-6 col-md-4">Mã CSHT</th>
                            <th scope="col-6 col-md-4">Tên CSHT</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1 ?>
                        @foreach($cshts as $csht)
                        <tr>
                            <th scope="row"><?= $stt++ ?></th>
                            <td>{{$csht->CSHT_MaCSHT}}</td>
                            <td>{{$csht->CSHT_TenCSHT}}</td>
                            <td>
                                <form action="{{route('csht-xoa', $csht->CSHT_MaCSHT)}}" method="get">
                                    <a href="{{route('csht-chinhsua', $csht->CSHT_MaCSHT)}}" class="btn btn-primary me-md-3">
                                        <i class="fas fa-edit"></i> Sửa
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
        <!-- end body -->
    </div>
    @endsection

    @section('JS')
    @endsection