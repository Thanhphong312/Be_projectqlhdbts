<p>DANH SÁCH HỢP ĐỒNG</p>

<div>
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
                <td style="text-align: center;">{{ $HopDong->HD_MaHD }}</td>
                <td style="text-align: center;">{{ $HopDong->T_MaTram }}</td>
                <td style="text-align: center;">{{ $HopDong->DV_MaDV }}</td>
                <td style="text-align: center;">{{ $HopDong->HD_MaCSHT }}</td>
                <td style="text-align: center;">{{ $HopDong->T_TenTram }}</td>
                <td style="text-align: center;">{{\Carbon\Carbon::parse($HopDong->HD_NgayDangKy)->format('d/m/Y')}}</td>
                <td style="text-align: center;">{{\Carbon\Carbon::parse($HopDong->HD_NgayHetHan)->format('d/m/Y')}}</td>
                <td style="text-align: center;">{{\Carbon\Carbon::parse($HopDong->HD_NgayPhuLuc)->format('d/m/Y')}}</td>
                <td style="text-align: center;">{{ number_format($HopDong->HD_GiaGoc) }} VNĐ</td>
                <td style="text-align: center;">{{ number_format($HopDong->HD_GiaHienTai) }} VNĐ</td>
                <td style="text-align: center;">{{ $HopDong->HD_SoTaiKhoan }}</td>
                <td style="text-align: center;">{{ $HopDong->HD_TenCTK }}</td>
                <td style="text-align: center;">{{ $HopDong->HD_TenNH }}</td>
                <td style="text-align: center;">{{ $HopDong->HD_TenChuDauTu }}</td>
                <td style="text-align: center;">{{ $HopDong->HD_HDScan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>