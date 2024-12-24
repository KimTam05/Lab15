@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title', 'Thêm mới loại sản phẩm')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h1>Thêm loại sản phẩm mới</h1>
            <form action="" method="post">
                @csrf
                <div class="form-group my-2">
                    <label for="">Mã loại sản phẩm</label>
                    <input type="text" name="kntMaLoai" class="form-control" placeholder="Nhập mã loại sản phẩm">
                    @error('kntMaLoai')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Tên loại sản phẩm</label>
                    <input type="text" name="kntTenLoai" class="form-control" placeholder="Nhập tên loại sản phẩm">
                    @error('kntTenLoai')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="kntStatus" value='0'>
                        <label for="" class="form-check-label">Đang mở</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="kntStatus" value='1'>
                        <label for="" class="form-check-label">Đã đóng</label>
                    </div>
                    @error('kntStatus')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Tạo loại sản phẩm" class="btn btn-primary my-2">
                <a href="" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
