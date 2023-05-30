<nav id="sidebar" class="show-window hide-mobile">
    <ul class="list-unstyled components">
        <li class="active">
            <a href="{{route('home')}}">Trang Chủ</a>
        </li>
        <li>
            <a href="{{route('tram')}}">Trạm</a>
        </li>
        <li>
            <a href="{{route('hopdong')}}">Hợp Đồng</a>
        </li>
        <li>
            <a href="{{route('csht')}}">Cơ Sở Hạ Tầng</a>
        </li>
        <li>
            <a href="{{route('taikhoan')}}">Tài Khoản</a>
        </li>
        <li>
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