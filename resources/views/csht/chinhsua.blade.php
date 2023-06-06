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
                    @foreach($suacsht as $sua)
                    <form method="post" action="{{route('csht-update', $sua->CSHT_MaCSHT)}}">
                        @csrf
                        <div class="row justify-content-center">
                            <h5 class="text-center" id="side12">CHỈNH SỬA CƠ SỞ HẠ TẦNG</h5>
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Mã CSHT
                                <span id="colorIcon">*</span>
                            </label>
                            <input value="{{$sua->CSHT_MaCSHT}}" name="CSHT_MaCSHT" class="form-control" type="text" placeholder="Vui lòng nhập mã CSHT">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên CSHT
                                <span id="colorIcon">*</span>
                            </label>
                            <input value="{{$sua->CSHT_TenCSHT}}" name="CSHT_TenCSHT" class="form-control" type="text" placeholder="Vui lòng nhập tên CSHT">
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success col-md-5" id="side123">Chỉnh sửa</button>
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