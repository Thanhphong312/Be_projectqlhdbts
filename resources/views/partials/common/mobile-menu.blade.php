<div class="collapse navbar-collapse " id="navbarSupportedContent">
    <div class="hidden-window show-mobile">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item {{mb_strtolower($title)=='trạm'?'active':''}}">
                <a href="{{route('tram')}}" class="nav-link">Trạm</a>
            </li>
            <li class="nav-item {{mb_strtolower($title)=='hợp đồng'?'active':''}}">
                <a href="{{route('hopdong')}}" class="nav-link">Hợp Đồng</a>
            </li>
            <li class="nav-item {{mb_strtolower($title)=='cơ sở hạ tầng'?'active':''}}">
                <a href="{{route('csht')}}" class="nav-link">Cơ Sở Hạ Tầng</a>
            </li>
            <li class="nav-item {{mb_strtolower($title)=='tài khoản'?'active':''}}">
                <a href="{{route('taikhoan')}}" class="nav-link">Tài Khoản</a>
            </li>
            <li class="nav-item {{mb_strtolower($title)=='thống kê'?'active':''}}">
                <a href="{{route('thongke')}}" class="nav-link">Thống Kê</a>
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
    </div>
</div>