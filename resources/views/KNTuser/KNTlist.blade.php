@extends('KNTuser.KNTlayouts.KNTmaster')

@section('title', 'Sản phẩm')

@section('content')
    <h3 class="text-uppercase d-flex flex-column bg-success text-white p-3">Danh sách sản phẩm</h3>
    <div class="container">
        <div class="row my-5">
            <div class="col-sm-12">
                <h3 class="fs-3 text-uppercase">Sản phẩm</h3>
                <hr>

                <div class="row mt-lg-0">
                    @foreach ($KNTSanpham as $item)
                        <div class="col-md-3 mb-4">
                            <a href="{{ route('KNTuser.show', ['id' => $item->kntMaSP]) }}" class="text-decoration-none">
                                <img src="{{ asset('storage/' . $item->kntHinhAnh) }}"
                                     class="d-block w-100 rounded"
                                     alt="{{ $item->kntTenSP }}">
                                <h6 class="text-uppercase text-center mt-2">{{ $item->kntTenSP }}</h6>
                                <div class="price text-center text-muted">
                                    {{ number_format($item->kntDongia, 0, ',', '.') }} VNĐ
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
