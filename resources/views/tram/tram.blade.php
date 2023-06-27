@extends('layouts.app')


@section('page-title', $title)

@section('message')
@include('partials.messages')
@endsection

@section('content')
<div class="content-main">
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
                @php
                $quyen=null;
                if(auth()->user()){
                if(auth()->user()->quyennguoidungs()){
                $quyen = auth()->user()->quyennguoidungs()->first()->Q_MaQ;
                }
                }
                @endphp
                @if($quyen=='Q0')
                <a href="{{route('tram-them')}}" class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </a>
                @endif
                <div class="table-responsive p-3">
                    <table class="table table-bordered text-center ">
                        <thead>
                            <tr>
                                <th scope="col-6 col-md-4">Mã trạm</th>
                                <th scope="col-6 col-md-4">Tên trạm</th>
                                <th scope="col-6 col-md-4">Địa chỉ</th>
                                <th scope="col-6 col-md-4">Tình trạng</th>
                                <th scope="col-6 col-md-4">Tọa độ</th>
                                <th scope="col-6 col-md-4">Đơn vị quản lý Trạm</th>
                                <th scope="col-6 col-md-4">Tùy chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trams as $tram)
                            <tr>
                                <td>{{$tram->T_MaTram}}</td>
                                <td>{{$tram->T_TenTram}}</td>
                                <td>{{$tram->T_DiaChiTram}}</td>
                                <td>{{$tram->T_TinhTrang}}</td>
                                <td><textarea cols="40" rows="3" disabled>{{$tram->toado}}</textarea> </td>
                                <td style="width:100px">{{($tram->dvqltram())?$tram->dvqltram()->first()->Ten_NgQL:""}}</td>
                                <td>
                                    <form action="{{route('tram-xoa', $tram->T_MaTram)}}" method="get">
                                        <a href="{{route('tram-chinhsua', $tram->T_MaTram)}}" class="btn btn-primary me-md-3">
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
                {{ $trams->links() }}
            </div>
        </div>
    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
@endsection