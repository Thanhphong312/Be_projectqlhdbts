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
                if(auth()->user()->quyennguoidungs()->first()){
                $quyennd = auth()->user()->quyennguoidungs()->first()->Q_MaQ;
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
                <div class="table-responsive p-3">
                    <table class="table table-bordered text-center p-2">
                        <thead>
                            <tr>
                                <th scope="col-6 col-md-3">STT</th>
                                <th scope="col-6 col-md-3">Avatar</th>
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
                                    if($q->Q_MaQ=='Q0'){
                                        continue;
                                    }
                                }
                            }
                            if(!empty($role)&&$role->Q_MaQ=='Q1'&&$taikhoan->id!=$id){
                                continue;
                            }
                            @endphp
                            <tr>
                                <th scope="row"><?= $stt++ ?></th>
                                <td><img src="{{asset($taikhoan->avatar)}}" alt="avatar" width="100" height="100"></td>
                                <td>{{$taikhoan->ND_MaND}}</td>
                                <td>{{$taikhoan->name}}</td>
                                <td>{{$taikhoan->ND_GioiTinh}}</td>
                                <td>{{$taikhoan->ND_DiaChi}}</td>
                                <td>{{$taikhoan->email}}</td>
                                <td>{{$taikhoan->ND_SDT}}</td>
                                <td>{{$quyen}}</td>
                                <td>
                                    <div class="d-flex ">
                                        <a href="{{route('taikhoan-hienthi', $taikhoan->id)}}" class="btn btn-info me-md-3 m-1">
                                            <i class="fas fa-eye"></i> Xem
                                        </a>
                                        @if($quyennd=='Q0')
                                        <form action="{{route('taikhoan-chinhsua', $taikhoan->id)}}" method="get">
                                            <button type="submit" class="btn btn-primary me-md-3 m-1">
                                                <i class="fas fa-edit"></i> Sửa
                                            </button>
                                        </form>
                                        <form action="{{route('taikhoan-xoa', $taikhoan->id)}}" method="get">
                                            <button type="submit" onclick="return confirm('Bạn có đồng ý xóa hay không?')" class="btn btn-danger me-md-3 m-1">
                                                <i class="fas fa-trash-alt"></i> Xóa
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $taikhoans->links() }}
            </div>
        </div>

    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
@endsection