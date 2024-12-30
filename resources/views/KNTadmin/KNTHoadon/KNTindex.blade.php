@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title','Danh sách hóa đơn')
@section('content')
<div class="container my-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Bảng danh sách hóa đơn</h3>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã giỏ hàng</th>
                            <th>Mã khách hàng</th>
                            <th>Ngày lập hóa đơn</th>
                            <th>Ngày nhận</th>
                            <th>Họ tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Chi tiết</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($KNTHoadon as $key => $item)
                            <tr>
                                <td>{{ $KNTHoadon->firstItem() + $key }}</td>
                                <td>{{ $item->kntMaHD }}</td>
                                <td>{{ $item->kntMaKH }}</td>
                                <td>{{ $item->kntNgayHoaDon }}</td>
                                <td>{{ $item->kntNgayNhan }}</td>
                                <td>{{ $item->kntHoTenKH }}</td>
                                <td>{{ $item->kntEmail }}</td>
                                <td>{{ $item->kntDienthoai }}</td>
                                <td>{{ $item->kntDiachi }}</td>
                                <td><a href="{{ route('KNTadmin.KNTHoadon.show', ['knthoadon' => $item->kntMaHD]) }}" class="text-decoration-none">Chi tiết</a></td>
                                <td>{{ $item->kntTongtien }}đ</td>
                                <td>
                                    @if ($item->kntStatus == 0)
                                        Chưa thanh toán
                                    @elseif ($item->kntStatus == 1)
                                        Đã thanh toán
                                    @else
                                        Đã hủy
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">Không có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
            <div class="card-footer clearfix">
                <div class="float-start">
                    <p>Trang {{ $KNTHoadon->currentPage() }} trên tổng số {{ $KNTHoadon->lastPage() }} trang.</p>
                </div>
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"> <a class="page-link" href="{{ $KNTHoadon->previousPageUrl() }}">«</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTHoadon->currentPage() }}">{{ $KNTHoadon->currentPage() }}</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTHoadon->nextPageUrl() }}">»</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
