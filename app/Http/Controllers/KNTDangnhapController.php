<?php

namespace App\Http\Controllers;

use App\Models\KNTLoaiSP;
use App\Models\KNTKhachhang;
use App\Models\KNTSanpham;
use Illuminate\Http\Request;
use App\Models\KNTQuanTri;
use Illuminate\Support\Facades\Session;


class KNTDangnhapController extends Controller
{
    // KNTQuanTri Account
    public function KNTindex(){

        $KNTQuantri_count = KNTQuanTri::count();
        $KNTLoaiSP_count = KNTLoaiSP::count();
        $KNTSanpham_count = KNTSanpham::count();
        $KNTKhachhang_count = KNTKhachhang::count();
        return view('KNTadmin.index', ['KNTQuantri_count' => $KNTQuantri_count, 'KNTLoaiSP_count' => $KNTLoaiSP_count, 'KNTSanpham_count' => $KNTSanpham_count, 'KNTKhachhang_count' => $KNTKhachhang_count]);
    }
    public function KNTlogin(){
        return view('KNTadmin.login');
    }
    public function KNTloginSubmit(Request $request){
        $request->validate([
            'kntTaikhoan'=>'required|exists:kntquantri',
            'kntMatkhau'=>'required'
        ]);

        $data = $request -> only('kntTaikhoan', 'kntMatkhau');
        $KNTTaikhoan = KNTQuanTri::where('kntTaikhoan',$data['kntTaikhoan'])->first();
        if($data['kntMatkhau'] == $KNTTaikhoan['kntMatkhau']){
            if($KNTTaikhoan->kntStatus == 0){
                Session::put('KNTQuanTri', $KNTTaikhoan->kntTaikhoan);
                return redirect()->route('KNTadmin.index');
            }
            else{
                return redirect()->back()->withErrors(['message' => 'Tài khoản đã bị khóa!']);
            }
        }

        return redirect()->back()->with(['message' => 'Mật khẩu không đúng!']);
    }
    public function KNTlogout(){
        session()->forget('KNTQuanTri');
        return redirect()->route('KNTadmin.login');
    }
}
