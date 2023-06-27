<!-- start search -->
<div class="content-search p-2">
    <div class="d-flex align-items-center justify-content-center flex-column ">
        <form class="form-search" method="GET">
            @csrf
            <input type="text" value="{{ Request::get('search') }}" name="search" placeholder="Tìm kiếm..." class="btn-search">
            <button type="submit" class="bt-search">Tìm kiếm</button>
        </form>
    </div>
</div>
<!-- end search  -->