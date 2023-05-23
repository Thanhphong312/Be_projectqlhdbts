@extends('layouts.app')

@section('message')
@include('partials.messages')
@endsection

@section('content')
<div class="content-main">
  <!-- start content-login -->
  <div class="content-login">
    <div class="box-forgot-password">
      <h3>Forgot password</h3>
      <form action="" method="" class="d-flex align-items-center justify-content-center form-forgot-password">
        {{ csrf_field() }}
        <div class="container mt-3 ">
          <div class="mb-3 mt-3">
            <div class="input-group form-rounded-1">
              <span class="input-group-text">
                <i class="fa fa-user "></i>
              </span>
              <input type="text" id="Email" name="Email" style="text-align: left;" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="d-grid gap-2 col-12 mx-auto">
            <button type="submit" class="btn btn-primary-login mb-3  form-rounded-1">Lấy lại mật khẩu</button>
          </div>

        </div>
      </form>
    </div>
  </div>
  <!-- end content-login -->
</div>
@endsection