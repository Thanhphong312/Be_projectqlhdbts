<ol class="breadcrumb ">
    @if(strtolower($title)!='trang chủ')
        <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
        <li class="breadcrumb-item active"><a href="#">{{$title}}</a></li>
    @else
        <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
    @endif
</ol>