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
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <div class="container-fluid justify-content-start">
                    <button type="button" id="sidebarCollapse" class="btn btn-secondary m-2 hidden-mobile">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <!-- page show in mobile -->
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto m-2 hidden-window" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <nav aria-label="breadcrumb " style="height:25px">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active"><a href="#">Hợp đồng</a></li>
                        </ol>
                    </nav>
                    <!-- menu in mobile -->
                    @include('partials.common.mobile-menu')
                </div>
            </nav>

            <!-- Content -->

        </div>
        
    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
@endsectionection