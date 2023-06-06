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
                    <form method="POST" action="{{route('tram-store')}}">
                        @csrf
                        <div class="row justify-content-center">
                            <h5 class="text-center" id="side12">THÊM TRẠM</h5>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mã trạm
                                <span id="colorIcon">*</span>
                            </label>
                            <input required class="form-control" type="text" name="maTram" placeholder="Vui lòng nhập mã trạm">
                        </div>
                        <div class="mb-3 option-csht">
                            <label class="form-label">CSHT
                                <span id="colorIcon">*</span>
                            </label>
                            <select class="form-control" aria-label="Default select example" id="csht" name="csht">
                                @foreach($cshts as $csht)
                                <option value="{{$csht->CSHT_MaCSHT}}">{{$csht->CSHT_TenCSHT}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên trạm
                                <span id="colorIcon">*</span>
                            </label>
                            <input required class="form-control" type="text" name="tenTram" placeholder="Vui lòng nhập tên trạm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ
                                <span id="colorIcon">*</span>
                            </label>
                            <input required class="form-control" type="text" name="diaChi" placeholder="Vui lòng nhập địa chỉ">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tình trạng
                                <span id="colorIcon">*</span>
                            </label>
                            <select class="form-control" aria-label="Default select example" id="tt" name="tt">
                                <option value="1">Hoạt động</option>
                                <option value="0">Ngưng hoạt động</option>
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

@endsection