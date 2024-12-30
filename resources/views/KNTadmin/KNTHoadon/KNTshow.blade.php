@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title','Danh sách chi tiết hóa đơn')
@section('content')
<div class="container my-3">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Bảng danh sách chi tiết hóa đơn của {{ $KNTHoadon->kntHoTenKH }}</h3>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã hóa đơn</th>
                            <th>Mã sản phẩm</th>
                            <th>Số lượng mua</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th class="text-center">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($KNTCTHoadon as $key => $item)
                            <tr>
                                <td>{{ $KNTCTHoadon->firstItem() + $key }}</td>
                                <td>{{ $item->kntMaHD }}</td>
                                <td>{{ $item->kntMaSP }}</td>
                                <td>{{ $item->kntSLMua }}</td>
                                <td>{{ $item->kntDonGia }}</td>
                                <td>{{ $item->kntThanhTien }}</td>
                                <td class="text-center">
                                    <form action="{{ route('KNTadmin.KNTHoadon.KNTdelete', ['knthoadon'=>$item->kntMaHD]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')"><i class="fa-solid fa-trash"></i></button>
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
                    <p>Trang {{ $KNTCTHoadon->currentPage() }} trên tổng số {{ $KNTCTHoadon->lastPage() }} trang.</p>
                </div>
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"> <a class="page-link" href="{{ $KNTCTHoadon->previousPageUrl() }}">«</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTCTHoadon->currentPage() }}">{{ $KNTCTHoadon->currentPage() }}</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTCTHoadon->nextPageUrl() }}">»</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
