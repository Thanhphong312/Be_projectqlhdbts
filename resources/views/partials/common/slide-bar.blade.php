<nav id="sidebar" class="show-window hide-mobile">
    <ul class="list-unstyled components">
        <!-- {{auth()->user()}} -->
        <li class="{{mb_strtolower($title)=='trang chủ'?'active':''}}">
            <a href="{{route('home')}}">Trang Chủ</a>
        </li>
        <li class="{{mb_strtolower($title)=='trạm'?'active':''}}">
            <a href="#pageTram" data-toggle="collapse" class="dropdown-toggle">Trạm</a>
            <ul class="collapse list-unstyled" id="pageTram">
                <li>
                    <a href="{{route('tram')}}">Trạm</a>
                </li>
                <li>
                    <a href="{{route('tram-them')}}">Thêm</a>
                </li>
            </ul>
        </li>
        <li class="{{mb_strtolower($title)=='hợp đồng'?'active':''}}">
            <a href="#pageHopdong" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Hợp đồng</a>
            <ul class="collapse list-unstyled" id="pageHopdong">
                <li>
                    <a href="{{route('hopdong')}}">Hợp đồng</a>
                </li>
                <li>
                    <a href="{{route('hopdong-capnhat')}}">Cập nhật</a>
                </li>
            </ul>
        </li>
        <li class="{{(mb_strtolower($title)=='cơ sở hạ tầng')?'active':''}}">
            <a href="#pageCSHT" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cơ Sở Hạ Tầng</a>
            <ul class="collapse list-unstyled" id="pageCSHT">
                <li>
                    <a href="{{route('csht')}}">Cơ Sở Hạ Tầng</a>
                </li>
                <li>
                    <a href="{{route('csht-them')}}">Thêm</a>
                </li>
                <li>
                    <a href="{{route('csht-chinhsua')}}">Chỉnh sửa</a>
                </li>
            </ul>
        </li>
        <li class="{{mb_strtolower($title)=='tài khoản'?'active':''}}">
            <a href="#pageTaiKhoan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tài khoản</a>
            <ul class="collapse list-unstyled" id="pageTaiKhoan">
                <li>
                    <a href="{{route('taikhoan')}}">Hiển thị</a>
                </li>
                <li>
                    <a href="{{route('taikhoan-them')}}">Thêm</a>
                </li>
            </ul>
        </li>
        <li class="{{mb_strtolower($title)=='thống kê'?'active':''}}">
            <a href="{{route('thongke')}}">Thống Kê</a>
        </li>
        <li>
            <div class="justify-content-start btn-logout">
                <a href="{{route('logout')}}">
                    <div class="input-group">
                        <input type="button" class="form-control btn-sm btn-light" value="Đăng xuất">
                        <span class="input-group-text">
                            <i class="fa fa-arrow-left"></i>
                        </span>
                    </div>
                </a>
            </div>
        </li>
    </ul>
</nav>