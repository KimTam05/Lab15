<?php

namespace App\Http\Controllers;

use App\Models\KNTKhachhang;
use App\Models\KNTGiohang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KNTKhachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function KNTindex()
    {
        $KNTKhachhang = KNTKhachhang::paginate(10);
        return view('KNTadmin.KNTKhachhang.KNTlist', ['KNTKhachhang' => $KNTKhachhang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function KNTcreate()
    {
        return view('KNTadmin.KNTKhachhang.KNTcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function KNTstore(Request $request)
    {
        $request->merge([
            'kntStatus' => $request->input('kntStatus', 0),
            'kntNgayDangKy' => now(),
        ]);

        $request->validate([
            'kntMaKH'=>'required|unique:kntkhachhang,kntMaKH',
            'kntHoTenKH'=>'required',
            'kntEmail'=>'required|unique:kntkhachhang,kntEmail',
            'kntMatkhau'=>'required|min:6',
            'kntDienthoai'=> 'required',
            'kntDiachi'=>'required',
            'kntStatus'=>'required|in:0,1',
        ],[
            'kntMaKH.required'=>'Mã khách hàng không được để trống',
            'kntHoTenKH.required' => 'Họ tên không được để trống',
            'kntEmail.required' => 'Email không được để trống',
            'kntMatkhau.required' => 'Mật khẩu không được để trống',
            'kntDienthoai.required' => 'Số điện thoại không được để trống',
            'kntDiachi.required' => 'Địa chỉ không được để trống',
            'kntMaKH.unique' => 'Mã khách hàng đã tồn tại',
            'kntEmail.unique' => 'Email đã tồn tại',
        ]);
        $KNTKhachhang = KNTKhachhang::where('kntMaKH', $request->kntMaKH)->first();
        $data = $request->except('_token');
        KNTKhachhang::create($data);
        return redirect()->route('KNTadmin.KNTKhachhang.index')->with('success','Thêm khách hàng thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function KNTedit($KNTKhachhang)
    {
        $KNTKhachhang = KNTKhachhang::where('kntMaKH', $KNTKhachhang)->first();
        return view('KNTadmin.KNTKhachhang.KNTedit', ['KNTKhachhang' => $KNTKhachhang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function KNTupdate(Request $request, $KNTKhachhang)
    {
        $khachhang = KNTKhachhang::where('kntMaKH', $KNTKhachhang)->first();
        $KNTGiohang = KNTGiohang::where('kntMaKH', $KNTKhachhang)->first();

        $request->validate([
            'kntHoTenKH'=>'required',
            'kntEmail'=>'required|unique:kntkhachhang,kntEmail,'.$KNTKhachhang.',kntMaKH',
            'kntMatkhau'=>'required|min:6',
            'kntDienthoai'=> 'required',
            'kntDiachi'=>'required',
            'kntStatus'=>'required|in:0,1',
        ],[
            'kntHoTenKH.required' => 'Họ tên không được để trống',
            'kntEmail.required' => 'Email không được để trống',
            'kntMatkhau.required' => 'Mật khẩu không được để trống',
            'kntDienthoai.required' => 'Số điện thoại không được để trống',
            'kntDiachi.required' => 'Địa chỉ không được để trống',
            'kntMaKH.unique' => 'Mã khách hàng đã tồn tại',
            'kntEmail.unique' => 'Email đã tồn tại',
        ]);
        $khachhang->update($request->except('_token'));
        $KNTGiohang->update($request->except('_token','kntMatkhau'));
        return redirect()->route('KNTadmin.KNTKhachhang.index')->with('success', 'Sửa thông tin khách hàng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function KNTdestroy($KNTKhachhang)
    {
        KNTGiohang::where('kntMaKH', $KNTKhachhang)->delete();
        KNTKhachhang::where('kntMaKH', $KNTKhachhang)->delete();
        return redirect()->route('KNTadmin.KNTKhachhang.index')->with('success', 'Xóa thông tin khách hàng thành công!');
    }
}
