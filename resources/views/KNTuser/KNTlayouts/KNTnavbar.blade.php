<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('KNTuser.index') }}">
            <img src="{{ asset('img\image.png') }}" width="30" height="30" d-inline-block align-top alt="icon">
            Eden Greens
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('KNTuser.index') }}">Trang chủ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('KNTuser.about') }}">Thông tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('KNTuser.list') }}">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bài viết</a>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            @if (session('KNTUser'))
            <a href="{{ route('KNTuser.user', ['id' => $KNTKhachhang->kntMaKH]) }}">{{ session('KNTUser') }}</a>
            <a href="{{ route('KNTuser.cart', ['id' => $KNTKhachhang->kntMaKH]) }}"><i class="fa-solid fa-cart-shopping mx-3"></i></a>
            @else
                <a href="{{ route('KNTuser.login') }}" class="">Đăng nhập</a>
            @endif
        </div>
    </nav>
</div>
