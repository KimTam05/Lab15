<?php

namespace App\Http\Controllers;

use App\Models\KNTLoaiSP;
use App\Models\KNTKhachhang;
use App\Models\KNTSanpham;
use Illuminate\Http\Request;
use App\Models\KNTQuanTri;


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
        return view('KNTadmin.KNTlogin');
    }
    public function KNTloginSubmit(Request $request){
        $request->validate([
            'username' => 'required|exists:users',
            'password' => 'required',
        ]);
        $data = $request -> only('username', 'password');
        $KNTTaikhoan = KNTQuanTri::where('username',$request['username'])->first();
        if($data['password'] == $KNTTaikhoan['password']){
            if($KNTTaikhoan->kntStatus == 0){
                return redirect()->route('KNTQuanTri.index', ['KNTTaikhoan' => $KNTTaikhoan->kntTaikhoan]);
            }
            else{
                return redirect()->back()->withErrors(['message' => 'Tài khoản đã bị khóa!']);
            }
        }

        return redirect()->back()->withErrors(['message' => 'Mật khẩu không đúng!']);
    }
    public function KNTlogout(){
        return redirect()->route('KNTQuanTri.KNTlogin');
    }
}
