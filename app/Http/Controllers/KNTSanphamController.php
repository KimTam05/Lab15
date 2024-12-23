<?php

namespace App\Http\Controllers;

use App\Models\KNTLoaiSP;
use App\Models\KNTSanpham;
use Illuminate\Http\Request;

class KNTSanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function KNTindex()
    {
        $KNTSanpham = KNTSanpham::paginate(10);
        return view('KNTadmin.KNTSanpham.KNTlist', ['KNTSanpham'=>$KNTSanpham]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function KNTcreate()
    {
        $KNTLoaiSP = KNTLoaiSP::all();
        return view('KNTadmin.KNTSanpham.KNTcreate',['KNTLoaiSP' => $KNTLoaiSP]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function KNTstore(Request $request)
    {
        $request->validate([
            'kntMaSP'=>'required',
            'kntTenSP'=>'required',
            'kntHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kntSoLuong'=>'required',
            'kntDongia'=>'required',
            'kntMaLoai'=>'required',
            'kntStatus'=>'required',
        ]);
        $KNTAnh = $request->file('kntHinhAnh');
        $KNTTenHinhAnh = time() . '_' . $KNTAnh->getClientOriginalName(); // Đặt tên file
        $KNTDuongDan = $KNTAnh->storeAs('images', $KNTTenHinhAnh, 'public'); // Lưu vào thư mục 'public/storage/images'
        $data = $request->except('_token');
        $data['kntHinhAnh'] = $KNTDuongDan;
        KNTSanpham::create($data);
        return redirect()->route('KNTadmin.KNTSanpham.index');
    }

    /**
     * Display the specified resource.
     */
    public function KNTshow($KNTMaSP)
    {
        $KNTSanpham = KNTSanpham::where('kntMaSP', $KNTMaSP)->first();
        return view('KNTadmin.KNTSanpham.KNTdetail', ['KNTSanpham'=>$KNTSanpham]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function KNTedit($KNTMaSP)
    {
        $KNTLoaiSP = KNTLoaiSP::all();
        $KNTSanpham = KNTSanpham::where('kntMaSP', $KNTMaSP)->first();
        return view('KNTadmin.KNTSanpham.KNTedit',['KNTLoaiSP'=>$KNTLoaiSP, 'KNTSanpham'=>$KNTSanpham]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function KNTupdate(Request $request, $KNTMaSP)
    {
        if($request->hasFile('kntHinhAnh') && $request->file('kntHinhAnh') != null){
            $KNTAnh = $request->file('kntHinhAnh');
            $KNTTenHinhAnh = time() . '_' . $KNTAnh->getClientOriginalName(); // Đặt tên file
            $KNTDuongDan = $KNTAnh->storeAs('images', $KNTTenHinhAnh, 'public');
            $request['kntHinhAnh'] = $KNTDuongDan;
        }
        else{
            $image = KNTSanpham::where('kntMaSP', $KNTMaSP)->first();
            $request['kntHinhAnh'] = $image['kntHinhAnh'];
        }
        $data = $request->except('_token');
        KNTSanpham::where('kntMaSP', $KNTMaSP)->update($data);
        return redirect()->route('KNTadmin.KNTSanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function KNTdestroy($KNTMaSP)
    {
        KNTSanpham::where('id',$KNTMaSP)->delete();
        return redirect()->route('KNTadmin.KNTSanpham.index');
    }
}
