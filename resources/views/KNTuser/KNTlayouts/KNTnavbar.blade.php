<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('KNTuser.index') }}">
            <img src="{{ asset('img\image.png') }}" width="30" height="30" d-inline-block align-top alt="icon">
            Cây cảnh bonsai
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
                    <a class="nav-link" href="#">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bài viết</a>
                </li>
            </ul>
        </div>
        @if (session('kntUser'))
            <span>{{ Session:get('kntUser') }}</span>
        @else
            <span>Đăng nhập / Đăng kí</span>
        @endif
    </nav>
</div>
