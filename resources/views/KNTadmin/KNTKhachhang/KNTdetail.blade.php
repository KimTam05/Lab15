@extends('KNTadmin.layouts.master')
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
                        Mã khách hàng:
                        {{ $KNTKhachhang->kntMaKH }}
                    </p>
                    <p>Họ tên khách hàng:
                        {{ $KNTKhachhang->kntHoTenKH }}
                    </p>

                    <p>
                        Email:
                        {{ $KNTKhachhang->kntEmail }}
                    </p>

                    <p>
                        Mật khẩu:
                        {{ $KNTKhachhang->kntMatkhau }}
                    </p>

                    <p>
                        Số điện thoại:
                        {{ $KNTKhachhang->kntDienthoai }}
                    </p>

                    <p>
                        Địa chỉ:
                        {{ $KNTKhachhang->kntDiachi }}
                    </p>

                    <p>
                        Ngày đăng ký:
                        {{ $KNTKhachhang->kntNgayDangKy }}
                    </p>

                    <p>Trạng thái:
                        {{ $KNTKhachhang->kntStatus == 0 ? "Đang mở":"Đã dóng" }}
                    </p>

                </div>
                <div class="card-footer">
                    <a href="{{ route('KNTadmin.KNTKhachhang.index') }}" class="btn btn-secondary">Trở lại</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
