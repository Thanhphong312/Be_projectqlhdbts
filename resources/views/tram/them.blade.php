<!-- Content -->
@csrf

<div class="container col-md-8 mt-2">
    <div class="alert alert-primary">
        <div class="row justify-content-center">
            <h5 class="text-center" id="side12">THÊM TRẠM</h5>
        </div>
        <div class="mb-3">
            <label class="form-label">Mã trạm
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="maTram" placeholder="Vui lòng nhập mã trạm">
        </div>
        <div class="mb-3 option-csht">
            <label class="form-label">CSHT
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="csht" name="csht">
                @foreach($cshts as $csht)
                <option value="{{$csht->CSHT_MaCSHT}}">{{$csht->CSHT_TenCSHT}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tên trạm
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="tenTram" placeholder="Vui lòng nhập tên trạm">
        </div>
        <div class="mb-3">
            <label class="form-label">Địa chỉ
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="diaChi" placeholder="Vui lòng nhập địa chỉ">
        </div>
        <div class="mb-3">
            <label class="form-label">Đơn vị quản lý
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" name="donviquanly">
                @foreach($donviquanlis as $donviquanli)
                <option value="{{$donviquanli->id}}">{{$donviquanli->Ten_DV}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tọa độ
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="toado" placeholder="Vui lòng nhập tọa độ">
        </div>
        <div class="mb-3">
            <label class="form-label">Tình trạng
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="tt" name="tt">
                <option value="Hoạt động">Hoạt động</option>
                <option value="Ngưng hoạt động">Ngưng hoạt động</option>
            </select>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="side123">Thêm</button>
        </div>
    </div>
</div>