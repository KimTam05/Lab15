@extends('KNTuser.KNTlayouts.KNTmaster')
@section('title', 'Giỏ hàng')
@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Giỏ Hàng</h1>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Đơn Giá (VNĐ)</th>
                <th>Thành Tiền (VNĐ)</th>
                <th>Tùy chỉnh</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($KNTCTGiohang as $item)
                <tr>
                    <td>{{ $item['kntTenSP'] }}</td>
                    <td>{{ $item['kntSLMua'] }}</td>
                    <td>{{ number_format($item['kntDonGia'], 0, ',', '.') }} VNĐ</td>
                    <td>{{ number_format($item['kntThanhTien'], 0, ',', '.') }} VNĐ</td>
                    <td>
                        <form action="" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <td colspan="5">Chưa có sản phẩm</td>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
