@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title','Danh sách sản phẩm')
@section('content')
<div class="container my-3">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Bảng danh sách sản phẩm</h3>
                <div class="float-end">
                    <a href="{{ route('KNTadmin.KNTSanpham.create') }}" class="btn btn-success">Thêm mới</a>
                </div>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Mã danh mục</th>
                            <th>Trạng thái</th>
                            <th class="text-center">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($KNTSanpham as $key => $item)
                            <tr>
                                <td>{{ $KNTSanpham->firstItem() + $key }}</td>
                                <td>{{ $item->kntMaSP }}</td>
                                <td>{{ $item->kntTenSP }}</td>
                                <td><img src="{{asset('storage/' . $item->kntHinhAnh)}}" style="width: 150px; height: 150px"></td>
                                <td>{{ $item->kntSoLuong }}</td>
                                <td>{{ $item->kntDongia }}</td>
                                <td>{{ $item->kntMaLoai }}</td>
                                <td>{{ $item->kntStatus == 0 ? "Còn hàng":"Hết hàng" }}</td>
                                <td class="text-center">
                                    <form action="{{ route('KNTadmin.KNTSanpham.delete', ['kntMaSP' => $item->kntMaSP]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('KNTadmin.KNTSanpham.show', ['kntMaSP' => $item->kntMaSP]) }}" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="{{ route('KNTadmin.KNTSanpham.edit', ['kntMaSP' => $item->kntMaSP]) }}" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Không có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
            <div class="card-footer clearfix">
                <div class="float-start">
                    Trang {{ $KNTSanpham->currentPage() }} trên tổng số {{ $KNTSanpham->lastPage() }} trang.
                </div>
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"> <a class="page-link" href="{{ $KNTSanpham->previousPageUrl() }}">«</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTSanpham->currentPage() }}">{{ $KNTSanpham->currentPage() }}</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTSanpham->nextPageUrl() }}">»</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
