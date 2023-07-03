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
            <!-- start modal ajax edit, add--->
            <div class="modal fade" id="editcsht">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cập Nhật Cơ Sở Hạ Tầng</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form id="body_edit" class="form-horizontal" method="post" enctype="multipart/form-data">
                                @csrf
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="addcsht">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Cơ Sở Hạ Tầng</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('csht-store')}}" enctype="multipart/form-data">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!--  end modal ajax edit, add--->
            <!-- Content -->
            <div class="container">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                    <button class="btn btn-success me-md-2 mt-1 mb-1" onclick=them_csht() type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col-6 col-md-4">Mã CSHT</th>
                            <th scope="col-6 col-md-4">Tên CSHT</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cshts as $csht)
                        <tr>
                            <td style="text-align:left">{{$csht->CSHT_MaCSHT}}</td>
                            <td style="text-align:left">{{$csht->CSHT_TenCSHT}}</td>
                            <td>
                                <form action="{{route('csht-xoa', $csht->CSHT_MaCSHT)}}" method="get">
                                    <button type="button" onclick=capnhat_csht('{{$csht->CSHT_MaCSHT}}') class="btn btn-primary me-md-3">
                                        <i class="fas fa-edit"></i> Sửa
                                        </a>
                                        <button type="submit" onclick="return confirm('Bạn có đồng ý xóa hay không?')" class="btn btn-danger me-md-3">
                                            <i class="fas fa-trash-alt"></i> Xóa
                                        </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $cshts->links() }}
        </div>
        <!-- end body -->
    </div>
    @endsection

    @section('JS')
    <script>
        $('.close').click(function() {
            $('.modal').modal('hide');
        });

        function capnhat_csht(CSHT_MaCSHT) {
            // $.get('{{Url("/design/edit")}}/' + id, function (data) {
            $.get('./csht/chinhsua/' + CSHT_MaCSHT, function(data) {
                $("#body_edit").html(data);
                // console.log(data);
                // getDesignSuggest(id)
            });
            $('#editcsht').modal('show');
        }

        function them_csht() {
            // $.get('{{Url("/design/edit")}}/' + id, function (data) {
            $.get('./csht/them', function(data) {
                $("#body_add").html(data);
                // console.log(data);
                // getDesignSuggest(id)
            });
            $('#addcsht').modal('show');
        }
        $('#body_edit').submit(function(evt) {
            evt.preventDefault();
            var formData = new FormData(this);
            var CSHT_MaCSHT = $("#CSHT_MaCSHT").val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                //url: '{{Url("/design/update-post")}}',
                url: './csht/update/' + CSHT_MaCSHT,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    var successMessage = data.message;
                    $('#editcsht').modal('hide');
                    window.location.href = './csht';
                },
            });
        });
    </script>
    @endsection