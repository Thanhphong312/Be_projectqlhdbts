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
                        <!-- <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active"><a href="#">Thống kê</a></li>
                        </ol> -->
                        @include('partials.common.breadcrumb')
                    </nav>
                    <!-- menu in mobile -->
                    @include('partials.common.mobile-menu')
                </div>
            </nav>
            <!-- start filter -->
            <div class="fillter-statistic">
                <form>
                    <div class="row justify-content-center">
                        <div class="col-md-4 p-2">
                            <div class="row form-group">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Thời gian</label>
                                <div class="col-sm-8">
                                    <select class="form-control" aria-label="Default select example" id="don_vi">
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <div class="row form-group">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Đơn vị</label>
                                <div class="col-sm-8">
                                    <select class="form-control" aria-label="Default select example" id="don_vi">
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
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
                    <div class="col-2 col-md-2 m-4 rounded-3 border border-dark" style="background-color: #b53f3f;">
                        <div class="item-home d-flex align-items-center justify-content-center">
                            <div>
                                <i class="fas fa-broadcast-tower"></i>
                                <h4>Trạm</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 col-md-2 m-4 rounded-3 border border-dark " style="background-color: #b39839;">
                        <div class="item-home d-flex align-items-center justify-content-center">
                            <div>
                                <i class="fas fa-file-alt"></i>
                                <h4>Hợp đồng</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 col-md-2 m-4 rounded-3 border border-dark" style="background-color: #155cbe;">
                        <div class="item-home d-flex align-items-center justify-content-center">
                            <div>
                                <i class="fas fa-users"></i>
                                <h4>Tài khoản</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 col-md-2 m-4 rounded-3 border border-dark" style="background-color: #41b53f;">
                        <div class="item-home d-flex align-items-center justify-content-center">
                            <div>
                                <i class="fas fa-dollar-sign"></i>
                                <h4>Doanh thu</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end thong ke  -->
            <!-- Line chart -->
            <div id="chart">
            </div>
            <!-- End Line chart -->

        </div>
    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
<script type="text/javascript">
    // $(document).ready(function() {
    //     $('#sidebarCollapse').on('click', function() {
    //         $('#sidebar').toggleClass('active');
    //     });
    // });
    var options = {
        chart: {
            height: 300,
            type: "line",
            stacked: false
        },
        dataLabels: {
            enabled: false
        },
        colors: ["#FF1654", "#247BA0", "black"],
        series: [{
                name: "Series A",
                data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6]
            },
            {
                name: "Series B",
                data: [10, 29, 33, 36, 40, 45, 30, 58]
            },
            {
                name: "Series C",
                data: [20, 29, 37, 36, 44, 45, 50, 58]
            }
        ],
        stroke: {
            width: [4, 4]
        },
        plotOptions: {
            bar: {
                columnWidth: "20%"
            }
        },
        xaxis: {
            categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016]
        },
        yaxis: [{
            axisTicks: {
                show: true
            },
            axisBorder: {
                show: true,
                color: "#FF1654"
            },
            labels: {
                style: {
                    colors: "#FF1654"
                }
            },
            title: {
                text: "Series A",
                style: {
                    color: "#FF1654"
                }
            }
        }, ],
        tooltip: {
            shared: false,
            intersect: true,
            x: {
                show: false
            }
        },
        legend: {
            horizontalAlign: "left",
            offsetX: 40
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script>
@endsection