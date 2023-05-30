
<nav id="sidebar" class="show-window hide-mobile">
    <ul class="list-unstyled components">
        <li class="active">
            <a href="{{route('home')}}">Trang chủ</a>
        </li>
        <li>
            <a href="{{route('tram')}}">Trạm</a>
        </li>
        <li>
            <a href="{{route('hopdong')}}">Hợp đồng</a>
        </li>
        <li>
            <a href="{{route('csht')}}">Cơ sở hạ tầng</a>
        </li>
        <li>
            <a href="{{route('taikhoan')}}">Tài khoản</a>
        </li>
        <li>
            <a href="{{route('thongke')}}">Thống kê</a>
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