@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title','Danh sách tài khoản quản trị')
@section('content')
<div class="container my-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Bảng danh sách tài khoản quản trị viên</h3>
                <div class="card-tools">
                    <div class="pagination pagination-sm float-end">
                        <a href="{{ route('KNTadmin.KNTQuanTri.create') }}" class="btn btn-success">Thêm mới</a>
                    </div>
                </div>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>Trạng thái</th>
                            <th class="text-center">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($KNTQuanTri as $key => $item)
                            <tr>
                                <td>{{ $KNTQuanTri->firstItem() + $key }}</td>
                                <td>{{ $item->kntTaikhoan }}</td>
                                <td>{{ $item->kntMatkhau }}</td>
                                <td>{{ $item->kntStatus == 0 ? "Đang hoạt động":"Đã khóa" }}</td>
                                <td class="text-center">
                                    <form action="{{ route('KNTadmin.KNTQuanTri.delete', ['id'=>$item->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('KNTadmin.KNTQuanTri.edit', ['id' => $item->id]) }}" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này không?')"><i class="fa-solid fa-trash"></i></button>
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
                    Trang {{ $KNTQuanTri->currentPage() }} trên tổng số {{ $KNTQuanTri->lastPage() }} trang.
                </div>
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"> <a class="page-link" href="{{ $KNTQuanTri->previousPageUrl() }}">«</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTQuanTri->currentPage() }}">{{ $KNTQuanTri->currentPage() }}</a> </li>
                    <li class="page-item"> <a class="page-link" href="{{ $KNTQuanTri->nextPageUrl() }}">»</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
