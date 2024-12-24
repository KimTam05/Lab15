@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title', 'Thông tin loại sản phẩm')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin loại sản phẩm</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Mã loại sản phẩm:
                        {{ $KNTLoaiSP->kntMaLoai }}
                    </p>
                    <p>Tên loại sản phẩm:
                        {{ $KNTLoaiSP->kntTenLoai }}
                    </p>

                    <p>Trạng thái:
                        {{ $KNTLoaiSP->kntStatus == 0 ? "Đang mở":"Đã dóng" }}
                    </p>

                </div>
                <div class="card-footer">
                    <a href="{{ route('KNTadmin.KNTLoaiSP.index') }}" class="btn btn-secondary">Trở lại</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
