@csrf

<!-- Content -->
<div class="container col-md-8 mt-2">
    <div class="alert alert-primary">
        @foreach($suatram as $sua)
            <div class="row justify-content-center">
                <h5 class="text-center" id="side12">CHỈNH SỬA TRẠM</h5>
            </div>
            <input required value="{{$sua->T_MaTram}}" name="T_MaTram" id="T_MaTram" class="form-control" type="hidden">

            <div class="mb-3">
                <label class="form-label">Mã trạm</label>
                <input style="cursor: not-allowed;" name="T_MaTram" class="form-control" value="{{$sua->T_MaTram}}"></input>
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Tên trạm
                    <span id="colorIcon">*</span>
                </label>
                <input required value="{{$sua->T_TenTram}}" name="T_TenTram" class="form-control" type="text" placeholder="Vui lòng nhập tên trạm">
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Địa chỉ
                    <span id="colorIcon">*</span>
                </label>
                <input required value="{{$sua->T_DiaChiTram}}" name="T_DiaChiTram" class="form-control" type="text" placeholder="Vui lòng nhập địa chỉ trạm">
            </div>
            <div class="mb-3">
                <label class="form-label">Đơn vị quản lý
                    <span id="colorIcon">*</span>
                </label>
                <select style="cursor: pointer;" class="form-control" aria-label="Default select example" name="donviquanly">
                    @foreach($donviquanlis as $donviquanli)
                    <option value="{{$donviquanli->id}}" {{($sua->Ma_DVQL==$donviquanli->id)?'selected':''}}>{{$donviquanli->Ten_DV}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tọa độ
                    <span id="colorIcon">*</span>
                </label>
                <input required value="{{$sua->toado}}" class="form-control" type="text" name="toado">
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Tình trạng</label>
                <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="T_TinhTrang" name="T_TinhTrang">
                    <option value="Hoạt động">Hoạt động</option>
                    <option value="Ngưng hoạt động">Ngưng hoạt động</option>
                </select>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success col-md-5" id="side123">Chỉnh sửa</button>
            </div>
        @endforeach
    </div>
</div>