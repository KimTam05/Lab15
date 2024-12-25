@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title', 'Khách hàng')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Danh sách tài khoản khách hàng</h3>
                    <div class="card-tools">
                        <div class="pagination pagination-sm float-end">
                            <a href="{{ route('KNTadmin.KNTKhachhang.create') }}" class="btn btn-primary">Thêm mới</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>SĐT</th>
                                <th>Địa điểm</th>
                                <th>Ngày đăng ký</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($KNTKhachhang as $key => $item)
                                <tr>
                                    <td>{{ $KNTKhachhang->firstItem() + $key }}</td>
                                    <td>{{ $item->kntMaKH }}</td>
                                    <td>{{ $item->kntHoTenKH }}</td>
                                    <td>{{ $item->kntEmail }}</td>
                                    <td>{{ $item->kntMatkhau }}</td>
                                    <td>{{ $item->kntDienthoai }}</td>
                                    <td>{{ $item->kntDiachi }}</td>
                                    <td>{{ $item->kntNgayDangKy }}</td>
                                    <td>{{ $item->kntStatus == 0 ? "Đang hoạt động": "Đã khóa"}}</td>
                                    <td class="text-center">
                                        <form action="{{ route('KNTadmin.KNTKhachhang.delete', ['kntMaKH'=>$item->kntMaKH]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('KNTadmin.KNTKhachhang.edit', ['kntMaKH'=>$item->kntMaKH]) }}" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <button class="btn btn-outline-danger" type="submit" onclick=" return confirm('Ban có chắc chắn muốn xóa tài khoản này?') "><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">Không có dữ liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="pagination pagination-sm m-0 float-start">Trang {{ $KNTKhachhang->currentPage() }} trên tổng số {{ $KNTKhachhang->lastPage() }} trang.</div>
                    <ul class="pagination pagination-sm m-0 float-end">
                        <li class="page-item"> <a class="page-link" href="{{ $KNTKhachhang->previousPageUrl() }}">«</a> </li>
                        <li class="page-item"> <a class="page-link" href="{{ $KNTKhachhang->currentPage() }}">{{ $KNTKhachhang->currentPage() }}</a> </li>
                        <li class="page-item"> <a class="page-link" href="{{ $KNTKhachhang->nextPageUrl() }}">»</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
