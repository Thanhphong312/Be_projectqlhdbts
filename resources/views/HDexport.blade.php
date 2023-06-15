<h1 style="text-align: center;">DANH SÁCH HỢP ĐỒNG</h1>

<table style="border: 1;">
    <thead>
        <tr>
            <th style="font-weight: bold;">Mã Hợp Đồng</th>
            <th style="font-weight: bold;">Mã Trạm</th>
            <th style="font-weight: bold;">Mã Đơn Vị</th>
            <th style="font-weight: bold;">Mã CSHT</th>
            <th style="font-weight: bold;">Tên Trạm</th>
            <th style="font-weight: bold;">Ngày Đăng Ký</th>
            <th style="font-weight: bold;">Ngày Hết Hạn</th>
            <th style="font-weight: bold;">Ngày Phụ Lục</th>
            <th style="font-weight: bold;">Giá Gốc</th>
            <th style="font-weight: bold;">Giá Hiện Tại</th>
            <th style="font-weight: bold;">Số tài khoản</th>
            <th style="font-weight: bold;">Tên Chủ Tài Khoản</th>
            <th style="font-weight: bold;">Tên Ngân Hàng</th>
            <th style="font-weight: bold;">Tên Chủ Đầu Tư</th>
            <th style="font-weight: bold;">Hợp Đồng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($HopDong as $HopDong)
        <tr>
            <td>{{ $HopDong->HD_MaHD }}</td>
            <td>{{ $HopDong->T_MaTram }}</td>
            <td>{{ $HopDong->DV_MaDV }}</td>
            <td>{{ $HopDong->HD_MaCSHT }}</td>
            <td>{{ $HopDong->T_TenTram }}</td>
            <td>{{ $HopDong->HD_NgayDangKy }}</td>
            <td>{{ $HopDong->HD_NgayHetHan }}</td>
            <td>{{ $HopDong->HD_NgayPhuLuc }}</td>
            <td>{{ $HopDong->HD_GiaGoc }}</td>
            <td>{{ $HopDong->HD_GiaHienTai }}</td>
            <td>{{ $HopDong->HD_SoTaiKhoan }}</td>
            <td>{{ $HopDong->HD_TenCTK }}</td>
            <td>{{ $HopDong->HD_TenNH }}</td>
            <td>{{ $HopDong->HD_TenChuDauTu }}</td>
            <td>{{ $HopDong->HD_HDScan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>