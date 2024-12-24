@extends('KNTadmin.KNTlayouts.KNTmaster')
@section('title','Sửa tài khoản quản trị')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h1>Thêm tài khoản quản trị viên mới</h1>
            <form action="" method="post">
                @csrf
                <div class="form-group my-2">
                    <label for="">Tên tài khoản</label>
                    <input type="text" name="kntTaikhoan" class="form-control" value="{{ $KNTQuanTri->kntTaikhoan }}">
                    @error('kntTaikhoan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Password</label>
                    <input type="password" name="kntMatkhau" class="form-control" value="{{ $KNTQuanTri->kntMatkhau }}">
                    @error('kntMatkhau')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="kntStatus" value='0' {{ $KNTQuanTri->kntStatus == 0 ? "checked": " " }}>
                        <label for="" class="form-check-label">Đang hoạt động</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="kntStatus" value='1' {{ $KNTQuanTri->kntStatus == 1 ? "checked": " " }}>
                        <label for="" class="form-check-label">Đã khóa</label>
                    </div>
                    @error('kntStatus')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Sửa tài khoản" class="btn btn-primary my-2">
                <a href="{{ route('KNTadmin.KNTQuanTri.index') }}" class="btn btn-outline-secondary">Hủy</a>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection
