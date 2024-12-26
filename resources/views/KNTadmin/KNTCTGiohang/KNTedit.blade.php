@extends('KNTadmin.KNTlayouts.KNTmaster')
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
                    <label for="">Mã giỏ hàng</label>
                    <select name="kntMaGH" id="" class="form-select">
                        @foreach ($KNTGiohang as $item)
                            <option value="{{ $item->kntMaGH }}"> {{ $item->kntMaGH }} </option>
                        @endforeach
                    </select>
                    @error('kntMaGH')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Sản phẩm</label>
                    <select name="kntMaSP" id="" class="form-select">
                        @foreach ($KNTSanpham as $item)
                            <option value="{{ $item->kntMaSP }}">{{ $item->kntTenSP }}</option>
                        @endforeach
                    </select>
                    @error('kntMaSP')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Số lượng</label>
                    <input type="number" name="kntSLMua" class="form-control">
                    @error('kntSLMua')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Tạo mới" class="btn btn-primary my-2">
                <a href="{{ route('KNTadmin.KNTCTGiohang.index') }}" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
