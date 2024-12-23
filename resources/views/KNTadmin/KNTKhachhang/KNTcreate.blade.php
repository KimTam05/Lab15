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
                    <input type="text" name="customer_id" class="form-control" placeholder="Nhập mã khách hàng">
                    @error('customer_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Tên khách hàng</label>
                    <input type="text" name="customer_name" class="form-control" placeholder="Nhập tên khách hàng">
                    @error('customer_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Nhập Email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="plain_password" class="form-control" placeholder="***********">
                    @error('plain_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Số điện thoại</label>
                    <input type="tel" name="phone" class="form-control" placeholder="+84xxxxxxxxx">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="location" class="form-control" placeholder="Vị trí của bạn">
                    @error('location')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="status" value='0'>
                        <label for="" class="form-check-label">Đang hoạt động</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="status" value='1'>
                        <label for="" class="form-check-label">Đã khóa</label>
                    </div>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Tạo danh mục" class="btn btn-primary my-2">
                <a href="/admin/customer" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
