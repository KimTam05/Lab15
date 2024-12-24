@extends('KNTadmin.layouts.master')
@section('title', 'Thêm mới danh mục')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h1>Thêm khách hàng mới</h1>
            <form action="" method="post">
                @csrf
                <div class="form-group my-2">
                    <label for="">Mã khách hàng</label>
                    <input type="text" name="kntMaKH" class="form-control" placeholder="Nhập mã khách hàng">
                    @error('kntMaKH')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Tên khách hàng</label>
                    <input type="text" name="kntHoTenKH" class="form-control" placeholder="Nhập tên khách hàng">
                    @error('kntHoTenKH')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Email</label>
                    <input type="email" name="kntEmail" class="form-control" placeholder="Nhập Email">
                    @error('kntEmail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="kntMatkhau" class="form-control" placeholder="***********">
                    @error('kntMatkhau')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Số điện thoại</label>
                    <input type="tel" name="kntDienthoai" class="form-control" placeholder="+84xxxxxxxxx">
                    @error('kntDienthoai')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="kntDiachi" class="form-control" placeholder="Vị trí của bạn">
                    @error('kntDiachi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Tạo danh mục" class="btn btn-primary my-2">
                <a href="{{ route('KNTadmin.KNTKhachhang.index') }}" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
