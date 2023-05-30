@extends('layouts.app')


@section('page-title', $title)

@section('message')
@include('partials.messages')
@endsection

@section('content')
<div class="content-main">
  <!-- start search -->
  <div class="content-search">
    <div class="d-flex align-items-center justify-content-center flex-column ">
      <form class="form-search">
        <input type="search" placeholder="Search..." class="btn-submit">
        <button type="submit" class="bt-search">Search</button>
      </form>
    </div>
  </div>
  <!-- end search  -->
  <!--  start slide bar  -->
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <ul class="list-unstyled components">
        <li class="active">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Trang chủ</a>
        </li>
        <li>
          <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Trang</a>
          <ul class="collapse list-unstyled" id="pageSubmenu">
            <li>
              <a href="#">Page 1</a>
            </li>
            <li>
              <a href="#">Page 2</a>
            </li>
            <li>
              <a href="#">Page 3</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">Hỗ trợ</a>
        </li>
        <li>
          <a href="#">Liên hệ</a>
        </li>
        <li>
          <a href="#">Giới thiệu</a>
        </li>
      </ul>
      <div class="d-flex justify-content-end btn-logout m-3">
        <a href="{{route('logout')}}">
          <div class="input-group">
            <input type="button" class="form-control btn-sm btn-light" value="Đăng xuất">
            <span class="input-group-text">
              <i class="fa fa-arrow-left"></i>
            </span>
          </div>
        </a>
      </div>
    </nav>
    <!-- Page Content  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-secondary">
            <i class="fas fa-align-left"></i>
          </button>
          <!-- <ul class="breadcrumb">
            <li>a</li>
            <li>b</li>
            <li>c</li>
          </ul> -->
        </div>
      </nav>
    </div>
  </div>
  <!-- end slide bar -->
</div>
@endsection