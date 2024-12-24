@extends('KNTadmin.layouts.master')
@section('title', 'Sửa thông tin khách hàng')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h1>Sửa thông tin khách hàng</h1>
            <form action="" method="post">
                @csrf
                <div class="form-group my-2">
                    <label for="">Mã khách hàng</label>
                    <input type="text" name="kntMaKH" class="form-control" value="{{ $KNTKhachhang->kntMaKH }}" readonly>
                    @error('kntMaKH')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Tên khách hàng</label>
                    <input type="text" name="kntHoTenKH" class="form-control" value="{{ $KNTKhachhang->kntHoTenKH }}">
                    @error('kntHoTenKH')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Email</label>
                    <input type="email" name="kntEmail" class="form-control" value="{{ $KNTKhachhang->kntEmail }}">
                    @error('kntEmail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="kntMatkhau" class="form-control" value="{{ $KNTKhachhang->kntMatkhau }}">
                    @error('kntMatkhau')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Số điện thoại</label>
                    <input type="tel" name="kntDienthoai" class="form-control" value="{{ $KNTKhachhang->kntDienthoai }}">
                    @error('kntDienthoai')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="kntDiachi" class="form-control" value="{{ $KNTKhachhang->kntDiachi }}">
                    @error('kntDiachi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="kntStatus" value='0' {{ $KNTKhachhang->kntStatus == 0 ? "checked": " " }}>
                        <label for="" class="form-check-label">Đang hoạt động</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="kntStatus" value='1' {{ $KNTKhachhang->kntStatus == 1   ? "checked": " " }}>
                        <label for="" class="form-check-label">Đã khóa</label>
                    </div>
                    @error('kntStatus')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Sửa" class="btn btn-primary my-2">
                <a href="{{ route('KNTadmin.KNTKhachhang.index') }}" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
