@extends('KNTadmin.layouts.master')
@section('title', 'Tạo tài khoản quản trị')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1>Thêm tài khoản quản trị viên mới</h1>
                <form action="" method="post">
                    @csrf
                    <div class="form-group my-2">
                        <label for="">Tài khoản</label>
                        <input type="text" name="kntTaikhoan" class="form-control" placeholder="Tên đăng nhập">
                        @error('kntTaikhoan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="kntMatkhau" class="form-control" placeholder="Mật khẩu">
                        @error('kntMatkhau')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Xác nhận mật khẩu">
                        @error('confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="submit" value="Tạo tài khoản" class="btn btn-primary my-2">
                    <a href="{{ route('KNTadmin.KNTQuanTri.index') }}" class="btn btn-outline-secondary">Hủy</a>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection
