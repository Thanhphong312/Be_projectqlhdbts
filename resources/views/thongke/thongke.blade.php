@extends('layouts.app')


@section('page-title', $title)

@section('message')
@include('partials.messages')
@endsection

@section('content')
<style>
    #month option {
        width: 150px;
        /* Set the width of the options */
    }

    .text-green {
        color: green;
    }
</style>
<div class="content-main">

    <!-- start body -->
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('partials.common.slide-bar')

        <!-- Page Content  -->
        <div id="content">
            @include('partials.common.tieude')

            <!-- start filter -->
            <div class="fillter-statistic">
                <form action="{{route('thongke')}}" method="get" style="width:100%;">
                    <div class="row">
                        <div class="row justify-content-center col-9">
                            <div class="col-md-2 p-2">
                                <div class="row form-group">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Năm</label>
                                    <div class="col-sm-8">
                                        <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="year" name="year">
                                            <option value="all" {{($request->year=='all')?'selected':''}}>All</option>
                                            @php
                                            $yearstart = \Carbon\Carbon::now()->subYear(5);
                                            $yearend = \Carbon\Carbon::now()->addYear(2);
                                            @endphp
                                            @for($i = $yearstart ; $i<$yearend ; $i->addYear(1))
                                                <option value="{{$i->year}}" {{($request->year==$i->year)?'selected':''}}>{{$i->year}}</option>

                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-2">
                                <div class="row form-group">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Tháng</label>
                                    <div class="col-sm-8">
                                        <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="month" name="month" disabled>
                                            <option value="all" {{($request->month=='all')?'selected':''}}>All</option>
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
                            <div class="col-md-3 p-2">
                                <div class="row form-group">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Đơn vị</label>
                                    <div class="col-sm-6">
                                        <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="don_vi" name="don_vi">
                                            <option value="all">All</option>
                                            @foreach($donvis as $donvi)
                                            <option value="{{$donvi->DV_MaDV}}" {{($request->don_vi==$donvi->DV_MaDV)?'selected':''}}>{{$donvi->DV_TenDV}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->quyennguoidungs->first()->Q_MaQ!='Q1')
                            <div class="col-md-4 p-2">
                                <div class="row form-group">
                                    <label for="inputPassword" class="col-sm-6 col-form-label">Người dùng</label>
                                    <div class="col-sm-6">
                                        <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="nguoidung" name="nguoidung">
                                            <option value="all">All</option>
                                            @foreach($taikhoans as $taikhoan)
                                            @if($taikhoan->quyennguoidungs->first()->Q_MaQ=='Q1')
                                            <option value="{{$taikhoan->id}}">{{$taikhoan->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row col-3 p-2 justify-content-right">
                            <div class="col-sm-6">
                                <button type="button" onclick=thongke() class="btn btn-primary">Thống kê</button>
                            </div>
                            <a href="./thongke" class="col-sm-4">
                                <div class="btn btn-primary" style="display:none" id="cancel">Hủy</div>
                            </a>
                        </div>
                    </div>

                </form>
            </div>
            <!-- end filter -->
            <!-- start thong ke -->
            <div class="container text-center ">
                <div class="row d-flex justify-content-center p-2 gx-2">
                    <div class="col-2 col-md-2 m-4 rounded-3 border border-dark" style="background-color: #b53f3f;" onclick=option('saphethan')>
                        <div style="cursor: pointer;" class="item-home d-flex align-items-center justify-content-center">
                            <div>
                                <i class="fas fa-broadcast-tower"></i>
                                <h4>Sắp hết hạn</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-left">
                <ul class="text-left">Chú thích : <span class="text-green">Hợp đồng phụ lục</span>

                </ul>
            </div>
            <!-- end thong ke  -->
            <!-- Line chart -->

            <div id="gettable">
            </div>
            </form>

            <!-- End Line chart -->

        </div>
    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    var type = '{{(!empty($request->type))?$request->type:'all'}}';
    var year = $("#year").val();
    var month = $("#month").val();
    var donvi = $("#don_vi").val();
    var nguoidung = $("#nguoidung").val();
    @if($request->type) $("#cancel").css("display", "block");
    @endif
    $("#year").change(function() {
        var value = $(this).val();
        if (value == 'all') {
            $("#month").val('all');
            $("#month").prop("disabled", true);
        } else {
            $("#month").prop("disabled", false);
        }
    });
    $.ajax({
        type: "get",
        url: '{{route("ajaxthongke")}}',
        data: {
            year: year,
            month: month,
            type: type,
            don_vi: donvi,
            nguoidung: nguoidung,
            page: {{(!empty($request->page)) ? $request->page: 1}}
        },
        success: function(data) {
            console.log(data);
            $('#gettable').html(data);
        },

    });

    function option(thongke) {
        $("#cancel").css("display", "block");
        var year = $("#year").val();
        var month = $("#month").val();
        var donvi = $("#don_vi").val();
        var nguoidung = $("#nguoidung").val();
        $("#year").val('all');
        $("#year").prop("disabled", true);
        $("#month").val('all');
        $("#month").prop("disabled", true);


        type = "saphethan";
        $.ajax({
            type: "get",
            url: '{{route("ajaxthongke")}}',
            data: {
                year: year,
                month: month,
                type: type,
                don_vi: donvi,
                nguoidung: nguoidung,
                page: 1

            },
            success: function(data) {
                console.log(data);
                $('#gettable').html(data);
            },

        });
    }

    function thongke() {
        var year = $("#year").val();
        var month = $("#month").val();
        var donvi = $("#don_vi").val();
        var nguoidung = $("#nguoidung").val();
        $("#year").prop("disabled", false);
        $("#cancel").css("display", "block");
        type = "thongke";
        $.ajax({
            type: "get",
            url: '{{route("ajaxthongke")}}',
            data: {
                year: year,
                month: month,
                type: type,
                don_vi: donvi,
                nguoidung: nguoidung,
                page: 1
            },
            success: function(data) {
                console.log(data);
                $('#gettable').html(data);
            },

        });
    }
</script>
<script type="text/javascript">

</script>
@endsection