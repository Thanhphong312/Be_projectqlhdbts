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
            @php
            $quyen=null;
            if(auth()->user()){
                if(auth()->user()->quyennguoidungs()){
                    if(auth()->user()->quyennguoidungs()->first()){
                        $quyennd = auth()->user()->quyennguoidungs()->first()->Q_MaQ;
                        echo $quyennd;
                    }
                }
            }
            @endphp
                @if($quyennd=='Q0')
                <a href="{{route('taikhoan-them')}}" class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </a>
                @endif
                <table class="table table-bordered text-center p-2">
                    <thead>
                        <tr>
                            <th scope="col-6 col-md-3">STT</th>
                            <th scope="col-6 col-md-3">Mã người dùng</th>
                            <th scope="col-6 col-md-3">Tên người dùng</th>
                            <th scope="col-6 col-md-3">Giới tính</th>
                            <th scope="col-6 col-md-3">Địa chỉ</th>
                            <th scope="col-6 col-md-3">Email</th>
                            <th scope="col-6 col-md-3">SĐT</th>
                            <th scope="col-6 col-md-3">Quyền người dùng</th>
                            <th scope="col-6 col-md-3">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1 ?>
                        @foreach($taikhoans as $taikhoan)
                        @php
                            $qnd = $taikhoan->quyennguoidungs()->first();
                                if($qnd){
                                    $q = $qnd->quyen()->first();
                                    $quyen = ($q)?$q->Q_TenQ:'';
                                }
                            if(!empty($role)&&$role->Q_MaQ!='Q0'){
                                if(!empty($q)){
                                    if($q->Q_MaQ!=$role->Q_MaQ){
                                        continue;
                                    }
                                }
                            }
                        @endphp
                        <tr>
                            <th scope="row"><?= $stt++ ?></th>
                            <td>{{$taikhoan->ND_MaND}}</td>
                            <td>{{$taikhoan->name}}</td>
                            <td>{{$taikhoan->ND_GioiTinh}}</td>
                            <td>{{$taikhoan->ND_DiaChi}}</td>
                            <td>{{$taikhoan->email}}</td>
                            <td>{{$taikhoan->ND_SDT}}</td>
                           
                            <td>{{$quyen}}</td>
                            <td>
                                <form action="{{route('taikhoan-xoa', $taikhoan->id)}}" method="get">
                                    <a href="{{route('taikhoan-hienthi', $taikhoan->id)}}" class="btn btn-primary me-md-3">
                                        <i class="fas fa-eye"></i> Xem
                                    </a>
                                    @if($quyennd=='Q0')
                                    <button type="submit" onclick="return confirm('Bạn có đồng ý xóa hay không?')" class="btn btn-danger me-md-3">
                                        <i class="fas fa-trash-alt"></i> Xóa
                                    </button>
                                    @endif
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