@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title','Danh sách giỏ hàng')
@section('content')
<div class="container my-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Bảng danh sách giỏ hàng</h3>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã giỏ hàng</th>
                            <th>Mã khách hàng</th>
                            <th>Họ tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Chi tiết</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($KNTGiohang as $key => $item)
                            <tr>
                                <td>{{ $KNTGiohang->firstItem() + $key }}</td>
                                <td>{{ $item->kntMaGH }}</td>
                                <td>{{ $item->kntMaKH }}</td>
                                <td>{{ $item->kntHoTenKH }}</td>
                                <td>{{ $item->kntEmail }}</td>
                                <td>{{ $item->kntDienthoai }}</td>
                                <td>{{ $item->kntDiachi }}</td>
                                <td><a href="" class="text-decoration-none">Chi tiết</a></td>
                                <td>
                                    @if ($item->kntStatus == 0)
                                        Chưa có sản phẩm
                                    @else
                                        Chưa thanh toán
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">Không có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
            <div class="card-footer clearfix">
                <div class="float-start">
                    <p>Trang {{ $KNTGiohang->currentPage() }} trên tổng số {{ $KNTGiohang->lastPage() }} trang.</p>
                </div>
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"> <a class="page-link" href="{{ $KNTGiohang->previousPageUrl() }}">«</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTGiohang->currentPage() }}">{{ $KNTGiohang->currentPage() }}</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTGiohang->nextPageUrl() }}">»</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
