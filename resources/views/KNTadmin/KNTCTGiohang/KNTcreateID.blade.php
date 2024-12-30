@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title', 'Thêm sản phẩm vào giỏ hàng')
@section('content')
<script>
    function KNTSetDefaultValue() {
        var KNTSelctElement = document.getElementById('kntSelect');
        if (KNTSelctElement.value === ""){
            KNTSelctElement.value = "{{ $KNTGiohang_id->kntMaGH }}";
        }
    }
</script>
<div class="container py-4">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h1>Thêm sản phẩm vào giỏ hàng của {{ $KNTGiohang_id->kntHoTenKH }}</h1>
            <form action="" method="post">
                @csrf
                <div class="form-group my-2">
                    <label for="">Mã giỏ hàng</label>
                    <select name="kntMaGH" id="kntSelect" class="form-select">
                        <option value="{{ $KNTGiohang_id->kntMaGH }}" selected> {{ $KNTGiohang_id->kntMaGH }} </option>
                    </select>
                    @error('kntMaGH')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Sản phẩm</label>
                    <select name="kntMaSP" id="" class="form-select" onchange="KNTSetDefaultValue()">
                        <option value="" disabled selected>--Chọn 1 trong các sản phẩm--</option>
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
                <input type="submit" value="Tạo" class="btn btn-primary my-2">
                <a href="{{ route('KNTadmin.KNTCTGiohang.show', ['kntctgiohang' => $KNTGiohang_id->kntMaGH]) }}" class="btn btn-outline-secondary">Hủy</a>
            </form>
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
