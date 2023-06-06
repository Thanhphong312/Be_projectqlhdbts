<!-- start search -->
<div class="content-search">
    <div class="d-flex align-items-center justify-content-center flex-column ">
        <form class="form-search" method="GET" action="{{route('hopdong-timkiem')}}">
            @csrf
            <input type="search" name="search" placeholder="Tìm kiếm..." class="btn-search">
            <button type="submit" class="bt-search">Tìm kiếm</button>
        </form>
    </div>
</div>
<!-- end search  -->