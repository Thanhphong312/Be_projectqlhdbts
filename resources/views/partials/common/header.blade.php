<header>
    <div class="main-logo col" style="height:75px">
        <div class="row" style="width:100%">
            <a href="{{route('home')}}" class="col-12">
                <img src="http://haugiang.vnpt.vn/static/images/haugiang.png" alt="main_banner">
            </a>
            @if(Auth::check())
            <div class="col-auto row d-flex justify-content-end align-items-end" id="hidden-mobile">
                <div class="input-group" style="align-items: center;">
                    <img src="{{url((auth()->user()!=null)?auth()->user()->avatar:'')}}" alt="" width="32" height="32" class="rounded-circle">
                    <span class="p-2" style="color:white">{{(auth()->user()!=null)?auth()->user()->name:''}}</span>
                    <a href="{{route('logout')}}">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                    </div>
                </a>
                </div>
            </div>
            @endif
        </div>
        <div class="title-logo">Hệ thống quản lý hợp đồng nhà trạm BTS</div>

        <!-- top-banner.jpg -->
    </div>

</header>