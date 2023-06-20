<p>DANH SÁCH HỢP ĐỒNG</p>

<table>
    <thead>
        <tr>
            <th>Mã Hợp Đồng</th>
            <th>Mã Trạm</th>
            <th>Mã Đơn Vị</th>
            <th>Mã CSHT</th>
            <th>Tên Trạm</th>
            <th>Ngày Đăng Ký</th>
            <th>Ngày Hết Hạn</th>
            <th>Ngày Phụ Lục</th>
            <th>Giá Gốc</th>
            <th>Giá Hiện Tại</th>
            <th>Số tài khoản</th>
            <th>Tên Chủ Tài Khoản</th>
            <th>Tên Ngân Hàng</th>
            <th>Tên Chủ Đầu Tư</th>
            <th>Hợp Đồng</th>
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
            <td>{{\Carbon\Carbon::parse($HopDong->HD_NgayDangKy)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::parse($HopDong->HD_NgayHetHan)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::parse($HopDong->HD_NgayPhuLuc)->format('d/m/Y')}}</td>
            <td>{{ number_format($HopDong->HD_GiaGoc) }} VNĐ</td>
            <td>{{ number_format($HopDong->HD_GiaHienTai) }} VNĐ</td>
            <td>{{ $HopDong->HD_SoTaiKhoan }}</td>
            <td>{{ $HopDong->HD_TenCTK }}</td>
            <td>{{ $HopDong->HD_TenNH }}</td>
            <td>{{ $HopDong->HD_TenChuDauTu }}</td>
            <td>{{ $HopDong->HD_HDScan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>