@extends('KNTuser.KNTlayouts.KNTmaster')

@section('title', 'Đăng kí')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
        <h1 class="text-center mb-4">Đăng Ký</h1>
        <form method="post">
            @csrf
            <div class="mb-3">
                <label for="fullname" class="form-label">Họ và Tên</label>
                <input type="text" name="kntHoTenKH" class="form-control" id="fullname" placeholder="Nhập họ và tên của bạn" required>
            </div>
            <div class="mb-3">
                <label for="kntEmail" class="form-label">Email</label>
                <input type="email" name="kntEmail" class="form-control" id="email" placeholder="Nhập email của bạn" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số Điện Thoại</label>
                <input type="text" name="kntDienthoai" class="form-control" id="phone" placeholder="Nhập số điện thoại của bạn" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="kntMatkhau" class="form-control" id="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa Chỉ</label>
                <input type="text" name="kntDiachi" class="form-control" id="address" placeholder="Nhập địa chỉ của bạn" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Đăng Ký</button>
        </form>
        <div class="text-center mt-3">
            <p>Đã có tài khoản? <a href="{{ route('KNTuser.login') }}">Đăng nhập</a></p>
        </div>
    </div>
</div>
@endsection
