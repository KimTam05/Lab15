@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title', 'Sửa sản phẩm')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h1>Sửa sản phẩm</h1>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group my-2">
                    <label for="">Mã sản phẩm</label>
                    <input type="text" name="kntMaSP" class="form-control" value="{{ $KNTSanpham->kntMaSP }}" readonly>
                    @error('kntMaSP')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="kntTenSP" class="form-control" value="{{ $KNTSanpham->kntTenSP }}">
                    @error('kntTenSP')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Ảnh</label>
                    <input type="file" name="kntHinhAnh" class="form-control" value="{{ $KNTSanpham->kntHinhAnh }}">
                    @error('kntHinhAnh')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Số lượng</label>
                    <input type="number" name="kntSoLuong" class="form-control" value="{{ $KNTSanpham->kntSoLuong }}">
                    @error('kntSoLuong')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Đơn giá</label>
                    <input type="text" name="kntDongia" class="form-control" value="{{ $KNTSanpham->kntDongia }}">
                    @error('kntDongia')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Danh mục</label>
                    <select name="kntMaLoai" class="form-select" id="exampleFormControlSelect1">
                        @foreach ($KNTLoaiSP as $item)
                            <option value="{{ $item->kntMaLoai }} ">{{ $item->kntTenLoai }}</option>
                        @endforeach
                    </select>
                    @error('kntMaLoai')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="kntStatus" value='0' {{ $KNTSanpham->kntStatus == 0 ? "checked":" " }}>
                        <label for="" class="form-check-label">Còn hàng</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="kntStatus" value='1' {{ $KNTSanpham->kntStatus == 1 ? "checked":" " }}>
                        <label for="" class="form-check-label">Hết hàng</label>
                    </div>
                    @error('kntStatus')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Sửa" class="btn btn-primary my-2">
                <a href="{{ route('KNTadmin.KNTSanpham.index') }}" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
