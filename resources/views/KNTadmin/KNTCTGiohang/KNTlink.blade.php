@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title','Danh sách chi tiết giỏ hàng')
@section('content')
<div class="container my-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Bảng danh sách chi tiết giỏ hàng của {{ $KNTGiohang->kntHoTenKH }}</h3>
                <div class="card-tools float-end">
                    <a href="{{ route('KNTadmin.KNTCTGiohang.createID',['kntctgiohang' => $KNTGiohang->kntMaGH]) }}" class="btn btn-success">Thêm mới</a>
                </div>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã giỏ hàng</th>
                            <th>Mã sản phẩm</th>
                            <th>Số lượng mua</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th class="text-center">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($KNTCTGiohang as $key => $item)
                            <tr>
                                <td>{{ $KNTCTGiohang->firstItem() + $key }}</td>
                                <td>{{ $item->kntMaGH }}</td>
                                <td>{{ $item->kntMaSP }}</td>
                                <td>{{ $item->kntSLMua }}</td>
                                <td>{{ $item->kntDonGia }}</td>
                                <td>{{ $item->kntThanhTien }}</td>
                                <td>
                                    <form action="" method="post">
                                        {{-- <a href="{{ route('KNTadmin.KNTCTGiohang.edit') }}" class="btn btn-outline-primary"></a> --}}
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Không có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
            <div class="card-footer clearfix">
                <div class="float-start">
                    <p>Trang {{ $KNTCTGiohang->currentPage() }} trên tổng số {{ $KNTCTGiohang->lastPage() }} trang.</p>
                </div>
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"> <a class="page-link" href="{{ $KNTCTGiohang->previousPageUrl() }}">«</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTCTGiohang->currentPage() }}">{{ $KNTCTGiohang->currentPage() }}</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTCTGiohang->nextPageUrl() }}">»</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
