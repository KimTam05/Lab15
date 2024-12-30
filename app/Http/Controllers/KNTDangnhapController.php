<?php

namespace App\Http\Controllers;

use App\Models\KNTLoaiSP;
use App\Models\KNTKhachhang;
use App\Models\KNTSanpham;
use App\Models\KNTQuanTri;
use Illuminate\Http\Request;
use App\Models\KNTHoadon;
use Illuminate\Support\Facades\Session;


class KNTDangnhapController extends Controller
{
    // KNTQuanTri Account
    public function KNTindex(){

        $KNTHoadon_count = KNTHoadon::count();
        $KNTLoaiSP_count = KNTLoaiSP::count();
        $KNTSanpham_count = KNTSanpham::count();
        $KNTKhachhang_count = KNTKhachhang::count();
        return view('KNTadmin.index', ['KNTHoadon_count' => $KNTHoadon_count, 'KNTLoaiSP_count' => $KNTLoaiSP_count, 'KNTSanpham_count' => $KNTSanpham_count, 'KNTKhachhang_count' => $KNTKhachhang_count]);
    }
    public function KNTlogin(){
        return view('KNTadmin.login');
    }
    public function KNTloginSubmit(Request $request){
        $request->validate([
            'kntTaikhoan'=>'required',
            'kntMatkhau'=>'required'
        ]);
        $KNTTaikhoan = KNTQuanTri::where('kntTaikhoan',$request->kntTaikhoan)->first();
        $data = $request -> only('kntTaikhoan', 'kntMatkhau');

        if (!$KNTTaikhoan) {
            return redirect()->back()->with(['kntTaikhoan' => 'Tài khoản không tồn tại!']);
        }
        if ($KNTTaikhoan->kntStatus != 0){
            return redirect()->back()->with(['kntStatus' => 'Tài khoản đã bị khóa!']);
        }
        if ($request->kntMatkhau != $KNTTaikhoan->kntMatkhau){
            return redirect()->back()->with(['kntMatkhau' => 'Mật khẩu không đúng!']);
        }
        Session::put('KNTQuanTri', $KNTTaikhoan->kntTaikhoan);
        return redirect()->route('KNTadmin.index');
    }
    public function KNTlogout(){
        session()->forget('KNTQuanTri');
        return redirect()->route('KNTadmin.login');
    }
}
