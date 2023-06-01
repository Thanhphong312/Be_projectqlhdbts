<table>
    <thead>
        <tr>
<<<<<<< HEAD
            <th >Mã Hợp Đồng</th>
            <th >Mã Người Dùng</th>
            <th >Mã Trạm</th>
            <th >Mã Đơn Vị</th>
            <th >Mã CSHT</th>
            <th >Tên Trạm</th>
            <th >Ngày Đăng Ký</th>
            <th >Ngày Hết Hạn</th>
            <th >Ngày Phụ Lục</th>
            <th >Gía Gốc</th>
            <th >Gía Hiện Tại</th>
            <th >Số tài khoản</th>
            <th >Tên Chủ Tài Khoản</th>
            <th >Tên Ngân Hàng</th>
            <th >Tên Chủ Đầu Tư</th>
            <th >Hợp Đồng</th>
=======
            <th>Mã Hợp Đồng</th>
            <th>Mã Người Dùng</th>
            <th>Mã Trạm</th>
            <th>Mã Đơn Vị</th>
            <th>Mã CSHT</th>
            <th>Tên Trạm</th>
            <th>Ngày Đăng Ký</th>
            <th>Ngày Hết Hạn</th>
            <th>Ngày Phụ Lục</th>
            <th>Giá Gốc</th>
            <th>Giá Hiện Tại</th>
            <th>Tên Chủ Tài Khoản</th>
            <th>Tên Ngân Hàng</th>
            <th>Tên Chủ Đầu Tư</th>
            <th>Hợp Đồng</th>
>>>>>>> fdfc39acb1700bd6d51ae18a5509287b032e938c

        </tr>
    </thead>
    <tbody>
    @foreach($HopDong as $HopDong)
        <tr>
            <td>{{ $HopDong->HD_MaHD }}</td>
            <td>{{ $HopDong->ND_MaND }}</td>
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