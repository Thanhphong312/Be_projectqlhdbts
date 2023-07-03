@csrf
<!-- Content -->
<div class="container col-md-5 mt-2">
    <div class="alert alert-primary">
        @foreach($suacsht as $sua)
            <div class="row justify-content-center">
                <h5 class="text-center" id="side12">CHỈNH SỬA CƠ SỞ HẠ TẦNG</h5>
            </div>
            <input required value="{{$sua->CSHT_MaCSHT}}" name="CSHT_MaCSHT" id="CSHT_MaCSHT" class="form-control" type="hidden">

            <div class="mb-3">
                <label class="form-label">Mã CSHT</label>
                <input style="cursor: not-allowed;" name="CSHT_MaCSHT" class="form-control" value="{{$sua->CSHT_MaCSHT}}"></input>
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Tên CSHT
                    <span id="colorIcon">*</span>
                </label>
                <input required value="{{$sua->CSHT_TenCSHT}}" name="CSHT_TenCSHT" class="form-control" type="text" placeholder="Vui lòng nhập tên cơ sở hạ tầng">
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success col-md-5" id="side123">Chỉnh sửa</button>
            </div>
        @endforeach
    </div>
</div>