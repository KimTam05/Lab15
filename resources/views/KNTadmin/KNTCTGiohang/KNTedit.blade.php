@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title', 'Thêm sản phẩm vào giỏ hàng')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h1>Sửa sản phẩm trong giỏ hàng của {{ $KNTCTGiohang->kntHoTenKH }}</h1>
            <form action="" method="post">
                @csrf
                <div class="form-group my-2">
                    <label for="">Mã giỏ hàng</label>
                    <select name="kntMaGH" id="" class="form-select">
                        <option value="{{ $KNTCTGiohang->kntMaGH }}"> {{ $KNTCTGiohang->kntMaGH }} </option>
                    </select>
                    @error('kntMaGH')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Sản phẩm</label>
                    <select name="kntMaSP" id="" class="form-select">
                        <option value="" disabled selected>--Chọn 1 trong các sản phẩm--</option>
                        @foreach ($KNTSanpham as $item)
                            <option value="{{ $item->kntMaSP }}" {{ $KNTCTGiohang->kntMaSP == $item->kntMaSP ? "selected":" " }}>{{ $item->kntTenSP }}</option>
                        @endforeach
                    </select>
                    @error('kntMaSP')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Số lượng</label>
                    <input type="number" name="kntSLMua" class="form-control" value="{{ $KNTCTGiohang->kntSLMua }}">
                    @error('kntSLMua')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Sửa" class="btn btn-primary my-2">
                <a href="{{ route('KNTadmin.KNTCTGiohang.show', ['kntctgiohang' => $KNTCTGiohang->kntMaGH]) }}" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
