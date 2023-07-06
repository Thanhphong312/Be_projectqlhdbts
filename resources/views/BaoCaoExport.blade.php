<p>DANH SÁCH HỢP ĐỒNG</p>

<table>
    <thead>
        <tr>
            <th>Mã HĐ</th>
            <th>Tên chủ tài khoản</th>
            <th>Người dùng</th>
            <th>Số tài khoản</th>
            <th>Đơn vị</th>
            <th>Tại ngân hàng</th>
            <th>Ngày ký HĐ</th>
            <th>Ngày hết hạn</th>
            <th>Giá thuê</th>
            <th>Mã trạm theo HĐ</th>
            <th>Tên trạm</th>
            <th>Mã CSHT</th>
            <th>Tên chủ đầu tư</th>
            <th>Hợp đồng</th>
            <th>Thời hạn</th>
            <th>Ngày phụ lục</th>
        </tr>
    </thead>
    <tbody>
        @foreach($HopDong as $row)
        @php
        $ngayhethan = \Carbon\Carbon::parse($row->HD_NgayHetHan);
        $now = \Carbon\Carbon::now();
        $diffInDays = 0;
        if($ngayhethan>$now){
        $diffInDays = $now->diffInDays($ngayhethan);
        }else{
        $diffInDays = -$now->diffInDays($ngayhethan);
        }
        @endphp
        <tr>
            <td>{{ $row->HD_MaHD }}</td>
            <td>{{ $row->HD_TenCTK }}</td>
            <td>{{ $row->ND_MaND }}</td>
            <td>{{ $row->HD_SoTaiKhoan }}</td>
            <td>{{ $row->DV_MaDV}}</td>
            <td>{{ $row->HD_TenNH }}</td>
            <td>{{\Carbon\Carbon::parse($row->HD_NgayDangKy)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::parse($row->HD_NgayHetHan)->format('d/m/Y')}}</td>
            <td>{{ $row->HD_GiaHienTai }} </td>
            <td>{{ $row->T_MaTram }} </td>
            <td>{{ $row->T_TenTram }} </td>
            <td>{{ $row->HD_MaCSHT }}</td>
            <td>{{ $row->HD_TenChuDauTu }}</td>
            <td>{{ $row->HD_HDScan }} </td>
            <td>{{ $diffInDays}} </td>
            <td>{{\Carbon\Carbon::parse($row->HD_NgayPhuLuc)->format('d/m/Y')}}</td>
        </tr>
        @endforeach
    </tbody>
</table>