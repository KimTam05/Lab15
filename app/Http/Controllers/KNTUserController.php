<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KNTSanpham;
use App\Models\KNTKhachhang;
use App\Models\KNTGiohang;
use App\Models\KNTCTGiohang;
use Illuminate\Support\Facades\Session;

class KNTUserController extends Controller
{
    public function KNTindex(){
        $KNTSanpham = KNTSanpham::all();
        $KNTKhachhang = KNTKhachhang::where('kntHoTenKH', session('KNTUser'))->first();
        return view('KNTuser.KNTindex', ['KNTSanpham' => $KNTSanpham, 'KNTKhachhang' => $KNTKhachhang]);
    }
    public function KNTlogin(){
        return view('KNTuser.KNTlogin');
    }
    public function KNTloginSubmit(Request $request){
        $request->validate([
            'kntEmail' => 'required|exists:kntkhachhang,kntEmail',
            'kntMatkhau' => 'required',
        ],[
            'kntEmail.required' => 'Vui lòng nhập email',
            'kntEmail.exists' => 'Email không tồn tại',
            'kntMatkhau.required' => 'Vui lòng nhập mật khẩu',
        ]);
        $KNTKhachhang = KNTKhachhang::where('kntEmail', $request['kntEmail'])->first();
        $data = $request->except('_token');
        if($KNTKhachhang->kntStatus == 1){
            return redirect()->back()->with('error', 'Tài khoản đã bị khóa!');
        }
        else if($KNTKhachhang->kntMatkhau != $data['kntMatkhau']){
            return redirect()->back()->with('error', 'Mật khẩu không đúng!');
        }
        Session::put('KNTUser', $KNTKhachhang->kntHoTenKH);
        return redirect()->route('KNTuser.index');
    }
    public function KNTregister(){
        return view('KNTuser.KNTregister');
    }
    public function KNTregisterSubmit(Request $request){
        $request->merge([
            'kntStatus' => 0,
            'kntNgayDangKy' => now(),
        ]);
        $request->validate([
            'kntHoTenKH' => 'required',
            'kntEmail' => 'required|unique:kntkhachhang,kntEmail',
            'kntMatkhau' => 'required',
            'kntDienthoai' => 'required',
            'kntDiachi' => 'required',
        ],[
            'kntHoTenKH.required' => 'Vui lòng nhập họ tên',
            'kntEmail.required' => 'Vui lòng nhập email',
            'kntEmail.unique' => 'Email đã tồn tại',
            'kntMatkhau.required' => 'Vui lòng nhập mật khẩu',
            'kntDienthoai.required' => 'Vui lòng nhập số điện thoại',
            'kntDiachi.required' => 'Vui lòng nhập địa chỉ',
        ]);
        $KNTKhachhang_last = KNTKhachhang::latest('id')->first();
        $KNTKhachhang_next = $KNTKhachhang_last ? $KNTKhachhang_last->id + 1 : 1;
        $KNTKhachhang_code = 'KH' . str_pad($KNTKhachhang_next, 5, '0', STR_PAD_LEFT);
        $data = $request->except('_token');
        $data['kntMaKH'] = $KNTKhachhang_code;
        KNTKhachhang::create($data);
        return redirect()->route('KNTuser.login')->with('success', 'Đăng ký thành công!');
    }
    public function KNTlogout(){
        Session::forget('KNTUser');
        return redirect()->route('KNTuser.index');
    }
    public function KNTuserindex($id){
        $KNTKhachhang = KNTKhachhang::where('kntMaKH', $id)->first();
        return view('KNTuser.KNTuserindex', compact('KNTKhachhang'));
    }
    public function KNTabout(){
        $KNTKhachhang = KNTKhachhang::where('kntHoTenKH', session('KNTUser'))->first();
        return view('KNTuser.KNTabout', ['KNTKhachhang' => $KNTKhachhang]);
    }
    public function KNTlist(){
        $KNTKhachhang = KNTKhachhang::where('kntHoTenKH', session('KNTUser'))->first();
        $KNTSanpham = KNTSanpham::all();
        return view('KNTuser.KNTlist', ['KNTSanpham' => $KNTSanpham,  'KNTKhachhang' => $KNTKhachhang]);
    }
    public function KNTshow($KNTMaSP){
        $KNTKhachhang = KNTKhachhang::where('kntHoTenKH', session('KNTUser'))->first();
        $KNTSanpham = KNTSanpham::where('kntMaSP', $KNTMaSP)->first();
        return view('KNTuser.KNTshow', ['KNTSanpham' => $KNTSanpham, 'KNTKhachhang' => $KNTKhachhang]);
    }
    public function KNTcart($id){
        $KNTKhachhang = KNTKhachhang::where('kntHoTenKH', session('KNTUser'))->first();
        $KNTGiohang = KNTGiohang::where('kntMaKH', $id)->first();
        $KNTCTGiohang = KNTCTGiohang::with('KNTSanpham')->where('kntMaGH', $KNTGiohang->kntMaGH)->get();

        $KNTThongTinGH = $KNTCTGiohang->map(function ($item) {
            return [
                'kntTenSP' => $item->KNTSanpham ? $item->KNTSanpham->kntTenSP : 'N/A', // Kiểm tra null trước khi lấy tên sản phẩm
                'kntSLMua' => $item->kntSLMua,
                'kntDonGia' => $item->kntDonGia,
                'kntThanhTien' => $item->kntThanhTien,
            ];
        });
        return view('KNTuser.KNTGiohang', ['KNTCTGiohang' => $KNTThongTinGH, 'KNTKhachhang' => $KNTKhachhang]);
    }
    public function KNTaddcart(Request $request){
        if(Session::get('KNTUser') == null){
            return redirect()->route('KNTuser.login');
        }
        $KNTGiohang = KNTGiohang::where('kntHoTenKH', session('KNTUser'))->first();
            $request->merge([
                'kntMaGH' => $KNTGiohang->kntMaGH,
                'kntMaSP' => $request->kntMaSP,
                'kntSLMua' => $request->kntSLMua,
                'kntDonGia' => $request->kntDonGia,
            ]);
            $KNTCTGiohang = KNTCTGiohang::where('kntMaGH', $request->kntMaGH)->where('kntMaSP', $request->kntMaSP)->first();
            if($KNTCTGiohang){
                $KNTCTGiohang->kntSLMua += $request->kntSLMua;
                $KNTCTGiohang->kntThanhTien = $KNTCTGiohang->kntThanhTien + $request->kntDonGia * $request->kntSLMua;
                $KNTCTGiohang->save();
                return redirect()->route('KNTuser.cart', ['id'=>$KNTGiohang->kntMaKH]);
            }
            $data = $request->except("_token");
            $data['kntThanhTien'] = $data['kntDonGia'] * $data['kntSLMua'];
            KNTCTGiohang::create($data);
            return redirect()->route('KNTuser.cart', ['id'=>$KNTGiohang->kntMaKH]);
    }
    public function KNTuserupdate(Request $request, $id){
        $khachhang = KNTKhachhang::where('kntMaKH', $id)->first();
        $KNTGiohang = KNTGiohang::where('kntMaKH', $id)->first();

        $request->merge([
            'kntStatus' => 0,
        ]);
        $request->validate([
            'kntHoTenKH'=>'required',
            'kntEmail'=>'required|unique:kntkhachhang,kntEmail,'.$id.',kntMaKH',
            'kntMatkhau'=>'required|min:6',
            'kntDienthoai'=> 'required',
            'kntDiachi'=>'required',
        ],[
            'kntHoTenKH.required' => 'Họ tên không được để trống',
            'kntEmail.required' => 'Email không được để trống',
            'kntMatkhau.required' => 'Mật khẩu không được để trống',
            'kntDienthoai.required' => 'Số điện thoại không được để trống',
            'kntDiachi.required' => 'Địa chỉ không được để trống',
            'kntEmail.unique' => 'Email đã tồn tại',
        ]);
        $khachhang->update($request->except('_token'));
        $KNTGiohang->update($request->except('_token','kntMatkhau'));
        return redirect()->route('KNTuser.user', ['id'=>$id])->with('success', 'Sửa thông tin khách hàng thành công!');
    }
}
