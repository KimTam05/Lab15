@extends("KNTuser.KNTlayouts.KNTmaster")
@section('title', 'Thông tin tài khoản')
@section('content')
<div class="card shadow-lg p-4" style="width: 100%; max-width: 600px; margin: auto;">
    <h1 class="text-center mb-4">Thông Tin Tài Khoản</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('KNTuser.userupdate', ['id'=>$KNTKhachhang->kntMaKH]) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="account-fullname" class="form-label">Họ và Tên</label>
            <input type="text" name="kntHoTenKH" class="form-control" id="account-fullname" value="{{ $KNTKhachhang->kntHoTenKH }}" required>
            @error('kntHoTenKH')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="account-email" class="form-label">Email</label>
            <input type="email" name="kntEmail" class="form-control" id="account-email" value="{{ $KNTKhachhang->kntEmail }}" required>
            @error('kntEmail')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="account-phone" class="form-label">Số Điện Thoại</label>
            <input type="text" name="kntDienthoai" class="form-control" id="account-phone" value="{{ $KNTKhachhang->kntDienthoai }}" required>
            @error('kntEmail')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="account-password" class="form-label">Mật khẩu</label>
            <input type="password" name="kntMatkhau" class="form-control" id="account-password" value="{{ $KNTKhachhang->kntDienthoai }}" required>
            @error('kntMatkhau')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="account-address" class="form-label">Địa Chỉ</label>
            <input type="text" name="kntDiachi" class="form-control" id="account-address" value="{{ $KNTKhachhang->kntDiachi }}" required>
            @error('kntDiachi')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Cập Nhật Thông Tin</button>
        <a href="{{ route('KNTuser.logout') }}" class="btn btn-danger w-100 my-3"> Đăng xuất</a>
    </form>
</div>
@endsection
