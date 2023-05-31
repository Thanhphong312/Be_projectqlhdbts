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
    
  <!--  start slide bar  -->
  <div class="wrapper">
    <!-- Sidebar  -->
    @include('partials.common.slide-bar')

    <!-- Page Content  -->
    <div id="content">
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
            @include('partials.common.breadcrumb')
          </nav>
          
          <!-- page show in mobile -->
          @include('partials.common.mobile-menu')

        </div>
      </nav>

      <div class="container text-center p-2">
        <div class="row align-items-center gx-2  row-item-home">
          <div class="col-6 col-md-4 rounded-3 border border-dark">
            <a href="{{route('tram')}}" class="item-home d-flex align-items-center justify-content-center">
              <div>
                <i class="fas fa-broadcast-tower"></i>
                <h4>Trạm</h4>
              </div>
            </a>
          </div>

          <div class="col-6 col-md-4 rounded-3 border border-dark">
            <a href="{{route('hopdong')}}" class="item-home d-flex align-items-center justify-content-center">
              <div>
                <i class="fas fa-file-alt"></i>
                <h4>Hợp đồng</h4>
              </div>
            </a>
          </div>

          <div class="col-6 col-md-4 rounded-3 border border-dark">
            <a href="{{route('csht')}}" class="item-home d-flex align-items-center justify-content-center">
              <div>
                <i class="fas fa-building"></i>
                <h4>Cơ sở hạ tầng</h4>
              </div>
            </a>
          </div>

          <div class="col-6 col-md-4 rounded-3 border border-dark">
            <a href="taikhoan" class="item-home d-flex align-items-center justify-content-center">
              <div>
                <i class="fas fa-users"></i>
                <h4>Tài khoản</h4>
              </div>
            </a>
          </div>

          <div class="col-6 col-md-4 rounded-3 border border-dark">
            <a href="thongke" class="item-home d-flex align-items-center justify-content-center">
              <div>
                <i class="fas fa-chart-line"></i>
                <h4>Thống kê</h4>
              </div>
            </a>
          </div>

          <div class="col-6 col-md-4 rounded-3 border border-dark">
            <a href="http://haugiang.vnpt.vn/" target="_blank" class="item-home d-flex align-items-center justify-content-center">
              <div>
                <i class="fas fa-broadcast-tower"></i>
                <h4>Giới thiệu</h4>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection