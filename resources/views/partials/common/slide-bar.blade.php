<nav id="sidebar" class="show-window hide-mobile">
    <div class="user mt-3 d-flex justify-content-center">
        <div>
            <div class="input-group" style="align-items: center;">
                <img src=".\avatar\VNPT-Logo.png" alt="" width="150" height="40" class="rounded-circle">
            </div>
        </div>
    </div>
    <hr>
    <ul class="list-unstyled components">
        <li class="{{mb_strtolower($title)=='trang chủ'?'active':''}}">
            <a href="{{route('home')}}">Trang Chủ</a>
        </li>
        @php
        $quyen=null;
        if(auth()->user()){
        if(auth()->user()->quyennguoidungs()){
        if(auth()->user()->quyennguoidungs()->first()){
        $quyen = auth()->user()->quyennguoidungs()->first()->Q_MaQ;
        }
        }
        }
        @endphp
        @if($quyen=='Q0'||$quyen=='Q1')
        <li class="{{mb_strtolower($title)=='trạm'?'active':''}}">
            <a href="{{route('tram')}}">Trạm</a>
        </li>
        @endif
        @if($quyen=='Q0')


        <li class="{{(mb_strtolower($title)=='cơ sở hạ tầng')?'active':''}}">
            <a href="{{route('csht')}}">Cơ sở hạ tầng</a>
        </li>

        @else
        <li class="{{mb_strtolower($title)=='hợp đồng'?'active':''}}">
            <a href="#pageHopdong" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Hợp đồng</a>
            <ul class="collapse list-unstyled" id="pageHopdong">
                <li>
                    <a href="{{route('hopdong')}}">Hợp đồng</a>
                </li>
            </ul>
        </li>
        <li class="{{mb_strtolower($title)=='phụ lục'?'active':''}}">
            <a href="#pagePhuLuc" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Phụ Lục</a>
            <ul class="collapse list-unstyled" id="pagePhuLuc">
                <li>
                    <a href="{{route('phuluc')}}">Phụ lục</a>
                </li>
            </ul>
        </li>
        @endif
        <li class="{{mb_strtolower($title)=='tài khoản'?'active':''}}">
            <a href="{{route('taikhoan')}}">Tài khoản</a>
        </li>
        <li class="{{mb_strtolower($title)=='thống kê'?'active':''}}">
            <a href="{{route('thongke')}}">Thống kê</a>
        </li>
        <!-- <li>
            @if(Auth::check())
            <div class="justify-content-start btn-logout mobile-only" id="logoutButtonMobile">
                <a href="{{route('logout')}}">
                    <div class="input-group">
                        <input type="button" class="form-control btn-sm btn-light" value="Đăng xuất">
                        <span class="input-group-text">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                    </div>
                </a>
            </div>
            @endif
        </li> -->
    </ul>
</nav>

<script>
    window.addEventListener('resize', () => {
        const logoutButtonMobile = document.getElementById('logoutButtonMobile');

        // Kiểm tra kích thước màn hình khi trang được tải
        const isMobile = window.matchMedia('(min-width: 768px)').matches;

        // Ẩn nút đăng xuất nếu là giao diện desktop
        if (isMobile) {
            logoutButtonMobile.style.display = 'none';
        }
    });
</script>