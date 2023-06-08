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
        @include('partials.common.tieude')
        
            <!-- start filter -->
            <div class="fillter-statistic">
                <form action="{{route('thongke')}}" method="get">
                    <div class="row justify-content-center">
                        <div class="col-md-4 p-2">
                            <div class="row form-group">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Thời gian</label>
                                <div class="col-sm-8">
                                    <select class="form-control" aria-label="Default select example" id="month" name="month">
                                        <option value="all">All</option>   
                                        <option value="1" {{($request->month==1)?'selected':''}}>1</option>
                                        <option value="2" {{($request->month==2)?'selected':''}}>2</option>
                                        <option value="3" {{($request->month==3)?'selected':''}}>3</option>
                                        <option value="4" {{($request->month==4)?'selected':''}}>4</option>
                                        <option value="5" {{($request->month==5)?'selected':''}}>5</option>
                                        <option value="6" {{($request->month==6)?'selected':''}}>6</option>
                                        <option value="7" {{($request->month==7)?'selected':''}}>7</option>
                                        <option value="8" {{($request->month==8)?'selected':''}}>8</option>
                                        <option value="9" {{($request->month==9)?'selected':''}}>9</option>
                                        <option value="10" {{($request->month==10)?'selected':''}}>10</option>
                                        <option value="11" {{($request->month==11)?'selected':''}}>11</option>
                                        <option value="12" {{($request->month==12)?'selected':''}}>12</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <div class="row form-group">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Đơn vị</label>
                                <div class="col-sm-8">
                                    <select class="form-control" aria-label="Default select example" id="don_vi" name="don_vi">
                                        <option value="all">All</option>
                                        @foreach($donvis as $donvi)
                                            <option value="{{$donvi->DV_MaDV}}" {{($request->don_vi==$donvi->DV_MaDV)?'selected':''}}>{{$donvi->DV_TenDV}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 p-2">
                            <button type="submit" class="btn btn-primary">Thống kê</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- end filter -->
            <!-- start thong ke -->
            <div class="container text-center ">
                <div class="row d-flex justify-content-center p-2 gx-2">
                    
                    <div class="col-2 col-md-2 m-4 rounded-3 border border-dark" style="background-color: #b53f3f;" onclick=option('tram')>
                        <div class="item-home d-flex align-items-center justify-content-center">
                            <div>
                                <i class="fas fa-broadcast-tower"></i>
                                <h4>Trạm</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 col-md-2 m-4 rounded-3 border border-dark " style="background-color: #b39839;" onclick=option('hopdong')>
                        <div class="item-home d-flex align-items-center justify-content-center">
                            <div>
                                <i class="fas fa-file-alt"></i>
                                <h4>Hợp đồng</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 col-md-2 m-4 rounded-3 border border-dark" style="background-color: #155cbe;" onclick=option('taikhoan')>
                        <div class="item-home d-flex align-items-center justify-content-center">
                            <div>
                                <i class="fas fa-users"></i>
                                <h4>Tài khoản</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end thong ke  -->
            <!-- Line chart -->
            <div id="getchart">
            </div>
            <!-- End Line chart -->

        </div>
    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $.ajax({
            type: "get",
            url: '{{route("ajaxthongke")}}',
            data:{
                month:"{{($request->month=='all')?'all':$request->month}}",
                type:"{{($type=='all')?'all':$type}}",
                don_vi:"{{($request->don_vi=='all')?'all':$request->don_vi}}"
            },
            success: function(data){
                console.log(data);
                $('#getchart').html(data);
            },
           
        });
    function option(thongke){
        $.ajax({
            type: "get",
            url: '{{route("ajaxthongke")}}',
            data:{
                month:"{{($request->month=='all')?'all':$request->month}}",
                type:thongke,
                don_vi:"{{($request->don_vi=='all')?'all':$request->don_vi}}"
            },
            success: function(data){
                console.log(data);
                $('#getchart').html(data);
            },
           
        });
    }
</script>
<script type="text/javascript">
    
</script>
@endsection