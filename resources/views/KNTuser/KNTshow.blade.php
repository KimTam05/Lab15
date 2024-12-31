@extends('KNTuser.KNTlayouts.KNTmaster')

@section('title', $KNTSanpham->kntTenSP)

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $KNTSanpham->kntHinhAnh) }}"
                     alt="{{ $KNTSanpham->kntTenSP }}"
                     class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h1 class="text-uppercase">{{ $KNTSanpham->kntTenSP }}</h1>
                <p class="price text-muted">
                    Giá: {{ number_format($KNTSanpham->kntDongia, 0, ',', '.') }} VNĐ
                </p>
                <div class="my-4">
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="kntMaSP" value="{{ $KNTSanpham->kntMaSP }}">
                        <input type="hidden" name="kntSLMua" value="1">
                        <input type="hidden" name='kntDonGia' value="{{ $KNTSanpham->kntDongia }}">
                        <button type="submit" class="btn btn-success btn-lg">
                            Thêm vào giỏ hàng
                        </button>
                    </form>
                </div>
                <a href="{{ route('KNTuser.index') }}" class="btn btn-secondary">
                    Quay lại danh sách sản phẩm
                </a>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
