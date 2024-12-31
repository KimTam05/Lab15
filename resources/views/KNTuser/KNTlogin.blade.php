@extends('KNTuser.KNTlayouts.KNTmaster')

@section('title', 'Đăng nhập')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
        <h1 class="text-center mb-4">Đăng Nhập</h1>
        <form method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="kntEmail" class="form-control" id="email" placeholder="Nhập email của bạn" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="kntMatkhau" class="form-control" id="password" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
        </form>
        <div class="text-center mt-3">
            <p>Chưa có tài khoản? <a href="{{ route('KNTuser.register') }}">Đăng ký ngay</a></p>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>
@endsection
