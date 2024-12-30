@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title','Danh sách loại sản phẩm')
@section('content')
<div class="container my-3">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Bảng danh sách loại sản phẩm</h3>
                <div class="card-tools">
                    <div class="pagination pagination-sm float-end">
                        <a href="{{ route('KNTadmin.KNTLoaiSP.create') }}" class="btn btn-success">Thêm mới</a>
                    </div>
                </div>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10%">#</th>
                            <th style="width: 20%">Mã loại sản phẩm</th>
                            <th style="width: 30%">Tên loại sản phẩm</th>
                            <th style="width: 20%">Trạng thái</th>
                            <th style="width: 20%" class="text-center">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($KNTLoaiSP as $key => $item)
                            <tr>
                                <td>{{ $KNTLoaiSP->firstItem() + $key }}</td>
                                <td>{{ $item->kntMaLoai }}</td>
                                <td>{{ $item->kntTenLoai }}</td>
                                <td>{{ $item->kntStatus == 0 ? "Đang mở":"Đã đóng" }}</td>
                                <td class="text-center">
                                    <form action="{{ route('KNTadmin.KNTLoaiSP.delete', ['kntMaLoai'=> $item->kntMaLoai]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('KNTadmin.KNTLoaiSP.show', ['kntMaLoai'=> $item->kntMaLoai]) }}" class="btn btn-outline-secondary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="{{ route('KNTadmin.KNTLoaiSP.edit', ['kntMaLoai'=> $item->kntMaLoai]) }}" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Không có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
            <div class="card-footer clearfix">
                <div class="pagination pagination-sm m-0 float-start">
                    Trang {{ $KNTLoaiSP->currentPage() }} trên tổng số {{ $KNTLoaiSP->lastPage() }} trang.
                </div>
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"> <a class="page-link" href="{{ $KNTLoaiSP->previousPageUrl() }}">«</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTLoaiSP->currentPage() }}">{{ $KNTLoaiSP->currentPage() }}</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTLoaiSP->nextPageUrl() }}">»</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
