@extends('KNTadmin.layouts.master')
@section('title', 'Thêm mới sản phẩm')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h1>Thêm sản phẩm mới</h1>
            <form action="{{ route('KNTadmin.KNTSanpham.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group my-2">
                    <label for="">Mã sản phẩm</label>
                    <input type="text" name="kntMaSP" class="form-control" placeholder="Nhập mã sản phẩm">
                    @error('kntMaSP')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="kntTenSP" class="form-control" placeholder="Nhập tên sản phẩm">
                    @error('kntTenSP')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Ảnh</label>
                    <input type="file" name="kntHinhAnh" class="form-control">
                    @error('kntHinhAnh')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Số lượng</label>
                    <input type="number" name="kntSoLuong" class="form-control" placeholder="Nhập số lượng sản phẩm">
                    @error('kntSoLuong')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Đơn giá</label>
                    <input type="text" name="kntDongia" class="form-control" placeholder="Nhập giá sản phẩm">
                    @error('kntDongia')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Danh mục</label>
                    <select name="kntMaLoai" class="form-select" id="exampleFormControlSelect1">
                        <option value="" selected disabled>--Chọn loại sản phẩm--</option>
                        @foreach ($KNTLoaiSP as $item)
                            <option value="{{ $item->kntMaLoai }}">{{ $item->kntTenLoai }}</option>
                        @endforeach
                    </select>
                    @error('kntMaLoai')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="kntStatus" value='0'>
                        <label for="" class="form-check-label">Còn hàng</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="kntStatus" value='1'>
                        <label for="" class="form-check-label">Hết hàng</label>
                    </div>
                    @error('kntStatus')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Tạo sản phẩm" class="btn btn-primary my-2">
                <a href="{{ route('KNTadmin.KNTSanpham.index') }}" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
