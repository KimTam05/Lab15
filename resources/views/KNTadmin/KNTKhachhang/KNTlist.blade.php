@extends('KNTadmin.layouts.master')
@section('title', 'Customer ')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Danh sách tài khoản khách hàng</h3>
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
                                <th>Trạng thái</th>
                                <th class="text-center  ">Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customer as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->customer_id }}</td>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->plain_password }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td>{{ $item->status == 0 ? "Đang hoạt động": "Đã khóa"}}</td>
                                    <td class="text-center">
                                        <a href="/admin/customer/{{$item->id}}" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="/admin/customer/{{$item->id}}/delete" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">Không có dữ liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="/admin/customer/create" class="btn btn-primary">Thêm mới</a>
                    <ul class="pagination pagination-sm m-0 float-end">
                        <li class="page-item"> <a class="page-link" href="{{ $customer->previousPageUrl() }}">«</a> </li>
                        <li class="page-item"> <a class="page-link" href="{{ $customer->currentPage() }}">{{ $customer->currentPage() }}</a> </li>
                        <li class="page-item"> <a class="page-link" href="{{ $customer->nextPageUrl() }}">»</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
