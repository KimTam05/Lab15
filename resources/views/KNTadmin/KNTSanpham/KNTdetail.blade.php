@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title', 'Thông tin sản phẩm')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin sản phẩm</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Mã sản phẩm:
                        {{ $KNTSanpham->kntMaSP }}
                    </p>
                    <p>Tên sản phẩm:
                        {{ $KNTSanpham->kntTenSP }}
                    </p>

                    <p>Ảnh:</p>
                    <img src="{{asset('storage/'. $KNTSanpham->kntHinhAnh)}}" style="width: 150px; height: 150px" alt="">
                    <p class="pt-2">Số lượng:
                        {{ $KNTSanpham->kntSoLuong }}
                    </p>
                    <p>Đơn giá:
                        {{ $KNTSanpham->kntDongia }}
                    </p>

                    <p>Mã danh mục:
                        {{ $KNTSanpham->kntMaLoai }}
                    </p>

                    <p>Trạng thái:
                        {{ $KNTSanpham->kntStatus == 0 ? "Còn hàng":"Hết hàng" }}
                    </p>

                </div>
                <div class="card-footer">
                    <a href="{{ route('KNTadmin.KNTSanpham.index') }}" class="btn btn-secondary">Trở lại</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
