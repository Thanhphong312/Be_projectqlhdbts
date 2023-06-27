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
            <div class="container col-md-5 mt-2">
                <div class="alert alert-primary">
                    <form method="POST" action="{{route('csht-store')}}">
                        @csrf
                        <div class="row">
                            <h5 class="text-center" id="side12">THÊM CƠ SỞ HẠ TẦNG</h5>
                        </div>
                        <div class="mb-3 text-left">
                            <label class="form-label">Mã CSHT
                                <span id="colorIcon">*</span>
                            </label>
                            <input required class="form-control" type="text" name="maCSHT" placeholder="Vui lòng nhập mã CSHT">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên CSHT
                                <span id="colorIcon">*</span>
                            </label>
                            <input required class="form-control" type="text" name="tenCSHT" placeholder="Vui lòng nhập tên CSHT">
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success col-md-5" id="side123">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end body -->
    </div>
    @endsection

    @section('JS')
    @endsection