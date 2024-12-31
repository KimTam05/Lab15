<?php

namespace App\Http\Controllers;

use App\Models\KNTCTGiohang;
use App\Models\KNTSanpham;
use App\Models\KNTGiohang;
use App\Models\KNTHoadon;
use App\Models\KNTCTHoadon;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KNTCTGiohangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function KNTindex()
    {
        $KNTCTGiohang = KNTCTGiohang::paginate(10);
        return view('KNTadmin.KNTCTGiohang.KNTlist', ['KNTCTGiohang' => $KNTCTGiohang]);
    }
    public function KNTcreate(){
        $KNTGiohang = KNTGiohang::all();
        $KNTSanpham = KNTSanpham::all();
        return view('KNTadmin.KNTCTGiohang.KNTcreate', ['KNTGiohang' => $KNTGiohang, 'KNTSanpham' => $KNTSanpham]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function KNTstore(Request $request)
    {
        $request->validate([
            'kntMaGH' => 'required',
            'kntMaSP' => 'required',
            'kntSLMua' => 'required',
        ],[
            'kntMaGH.required' => 'Vui lòng nhập mã giỏ hàng',
            'kntMaSP.required' => 'Vui lòng nhập mã sản phẩm',
            'kntSLMua.required' => 'Vui lòng nhập số lượng mua',
        ]);
        $KNTGiohang = KNTGiohang::where('kntMaGH', $request->kntMaGH)->first();
        $KNTCTGioHang = KNTCTGiohang::where('kntMaGH', $request->kntMaGH)->where('kntMaSP', $request->kntMaSP)->first();
        if($KNTCTGioHang){
            return redirect()->back()->with('error', 'Sản phẩm này đã tồn tại trong giỏ hàng!')->withInput();
        }
        $data = $request->except('_token');
        $KNTSanpham = KNTSanpham::where('kntMaSP', $data['kntMaSP'])->first();
        $data['kntDonGia'] = $KNTSanpham['kntDongia'];
        $data['kntThanhTien'] = $data['kntDonGia'] * $data['kntSLMua'];
        $KNTTongtien = $KNTGiohang->kntTongtien + $data['kntThanhTien'];
        $KNTGiohang->update(['kntTongtien' => $KNTTongtien]);
        KNTCTGiohang::create($data);
        return redirect()->route('KNTadmin.KNTCTGiohang.index')->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function KNTshow($KNTCTGioHang)
    {
        $KNTGiohang = KNTGiohang::where('kntMaGH', $KNTCTGioHang)->first();
        if(!$KNTGiohang){
            return view('KNTadmin.KNTerror404');
        }
        $KNTCTGiohang = KNTCTGiohang::where('kntMaGH', $KNTCTGioHang)->paginate(10);
        return view('KNTadmin.KNTCTGiohang.KNTlink', ['KNTCTGiohang' => $KNTCTGiohang, 'KNTGiohang' =>$KNTGiohang]);
    }
    public function KNTcreateID($id){
        $KNTGiohang = KNTGiohang::all();
        $KNTSanpham = KNTSanpham::all();
        $KNTGiohang_id = KNTGiohang::where('kntMaGH', $id)->first();
        return view('KNTadmin.KNTCTGiohang.KNTcreateID', ['KNTGiohang' => $KNTGiohang, 'KNTSanpham' => $KNTSanpham, 'KNTGiohang_id' => $KNTGiohang_id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function KNTstoreID(Request $request , $KNTCTGiohang)
    {
        $KNTGiohang = KNTGiohang::where('kntMaGH', $KNTCTGiohang)->first();
        $KNTSanpham = KNTSanpham::where('kntMaSP', $request->kntMaSP)->first();
        $request->validate([
            'kntMaGH' => 'required',
            'kntMaSP' => 'required',
            'kntSLMua' => 'required',
        ], [
            'kntMaGH.required' => 'Vui lòng nhập mã giỏ hàng',
            'kntMaSP.required' => 'Vui lòng nhập mã sản phẩm',
            'kntSLMua.required' => 'Vui lòng nhập số lượng mua',
        ]);
        $KNTCTGioHang = KNTCTGiohang::where('kntMaGH', $KNTCTGiohang)->where('kntMaSP', $request->kntMaSP)->first();
        if($KNTCTGioHang){
            return redirect()->back()->with('error', 'Sản phẩm này đã tồn tại trong giỏ hàng!')->withInput();
        }
        $data = $request->except('_token');
        $data['kntMaGH'] = $KNTGiohang->kntMaGH;
        $data['kntDonGia'] = $KNTSanpham->kntDongia;
        $data['kntThanhTien'] = $data['kntDonGia'] * $data['kntSLMua'];
        $KNTTongtien = $KNTGiohang->kntTongtien + $data['kntThanhTien'];
        $KNTGiohang->update(['kntTongtien' => $KNTTongtien]);
        KNTCTGiohang::create($data);
        return redirect()->route('KNTadmin.KNTCTGiohang.index')->with('success', 'Thêm sản phẩm thành công');
    }

    public function KNTedit($KNTCTMaGH, $KNTCTMaSP){
        $KNTCTGiohang = KNTCTGiohang::where('kntMaGH', $KNTCTMaGH)->where('kntMaSP', $KNTCTMaSP)->first();
        $KNTSanpham = KNTSanpham::all();
        return view('KNTadmin.KNTCTGiohang.KNTedit', ['KNTCTGiohang'=>$KNTCTGiohang, 'KNTSanpham'=>$KNTSanpham, 'kntmagh' => $KNTCTMaGH, 'kntmasp' => $KNTCTMaSP]);
    }

    public function KNTupdate(Request $request, $KNTCTMaGH, $KNTCTMaSP)
    {
        $KNTCTGiohang = KNTCTGiohang::where('kntMaGH', $KNTCTMaGH)->where('kntMaSP', $KNTCTMaSP)->first();
        $KNTGiohang = KNTGiohang::where('kntMaGH', $KNTCTMaGH)->first();
        $KNTSanpham_old = KNTSanpham::where('kntMaSP', $KNTCTMaSP)->first();
        $request->validate([
            'kntMaGH' => 'required',
            'kntMaSP' => 'required',
            'kntSLMua' => 'required',
        ],[
            'kntMaGH.required' => 'Vui lòng nhập mã giỏ hàng',
            'kntMaSP.required' => 'Vui lòng nhập mã sản phẩm',
            'kntSLMua.required' => 'Vui lòng nhập số lượng mua',
        ]);
        $KNTSanpham_new = KNTSanpham::where('kntMaSP', $request->kntMaSP)->first();
        $data = $request->except('_token');
        $KNTSLMua_old = $KNTCTGiohang->kntSLMua;
        $data['kntMaGH'] = $KNTGiohang->kntMaGH;
        $data['kntDonGia'] = $KNTSanpham_new['kntDongia'];
        $data['kntThanhTien'] = $data['kntDonGia'] * $data['kntSLMua'];
        $KNTTongtien = $KNTGiohang->kntTongtien - ($KNTSanpham_old->kntDongia * $KNTSLMua_old) + $data['kntThanhTien'];
        $KNTGiohang->update(['kntTongtien' => $KNTTongtien]);
        $KNTCTGiohang->update($data);
        return redirect()->route('KNTadmin.KNTCTGiohang.index', ['kntctgiohang' => $KNTGiohang->kntMaGH])->with('success', 'Đã sửa thành công sản phẩm trong giỏ hàng.');
    }

    public function KNTupload($KNTMaGH, $KNTMaSP)
    {
        $KNTCTGiohang = KNTCTGiohang::where('kntMaGH', $KNTMaGH)->where('kntMaSP', $KNTMaSP)->first();
        if (!$KNTCTGiohang) {
            return redirect()->back()->with(['error' => 'Chi tiết giỏ hàng không tồn tại.']);
        }
        $KNTGiohang = KNTGiohang::where('kntMaGH', $KNTMaGH)->first();
        if (!$KNTGiohang) {
            return redirect()->back()->with(['error' => 'Giỏ hàng không tồn tại.']);
        }
        $KNTHoadon_last = KNTGiohang::latest('id')->first();
        $KNTHoadon_next = $KNTHoadon_last ? $KNTHoadon_last->id + 1 : 1;
        $KNTHoadon_code = 'HD' . str_pad($KNTHoadon_next, 5, '0', STR_PAD_LEFT);
        $temp = $KNTGiohang->toArray();
        $temp['kntNgayHoaDon'] = now();
        $temp['kntNgayNhan'] = now()->addWeek();
        $temp['kntStatus'] = 0;
        $temp['kntMaHD'] = $KNTHoadon_code;
        $data = $KNTCTGiohang->toArray();
        $data['kntMaHD'] = $KNTHoadon_code;
        KNTHoadon::create($temp);
        KNTCTHoadon::create($data);
        $KNTCTGiohang->delete();
        return redirect()->route('KNTadmin.KNTCTGiohang.index')->with('success', 'Sản phẩm đã được thêm vào hóa đơn thành công.');
    }

    public function KNTdestroy($KNTMaGH, $KNTMaSP)
    {
        $KNTGiohang = KNTGiohang::where('kntMaGH', $KNTMaGH)->first();
        $KNTSanpham = KNTSanpham::where('kntMaSP', $KNTMaSP)->first();
        $KNTCTGioHang = KNTCTGiohang::where('kntMaGH', $KNTMaGH)->where('kntMaSP', $KNTMaSP)->first();
        $KNTTongtien = $KNTGiohang->kntTongtien - ($KNTSanpham->kntDongia * $KNTCTGioHang->kntSLMua);
        $KNTGiohang->update(['kntTongtien' => $KNTTongtien]);
        $KNTCTGioHang->delete();
        return redirect()->route('KNTadmin.KNTCTGiohang.index')->with('success', 'Đã xóa thành công sản phẩm trong giỏ hàng.');
    }

    public function KNTdestroyID($KNTMaGH, $KNTMaSP){
        $KNTGiohang = KNTGiohang::where('kntMaGH', $KNTMaGH)->first();
        $KNTSanpham = KNTSanpham::where('kntMaSP', $KNTMaSP)->first();
        $KNTCTGioHang = KNTCTGiohang::where('kntMaGH', $KNTMaGH)->where('kntMaSP', $KNTMaSP)->first();
        $KNTTongtien = $KNTGiohang->kntTongtien - ($KNTSanpham->kntDongia * $KNTCTGioHang->kntSLMua);
        $KNTGiohang->update(['kntTongtien' => $KNTTongtien]);
        $KNTCTGioHang->delete();
        return redirect()->route('KNTadmin.KNTCTGiohang.show', ['kntctgiohang' => $KNTMaGH])->with('success', 'Đã xóa thành công sản phẩm trong giỏ hàng.');
    }
}
