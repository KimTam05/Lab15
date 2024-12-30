<?php

namespace App\Http\Controllers;

use App\Models\KNTLoaiSP;
use Illuminate\Http\Request;

class KNTLoaiSPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function KNTindex()
    {
        $KNTLoaiSP = KNTLoaiSP::paginate(10);
        return view('KNTadmin.KNTLoaiSP.KNTlist', ['KNTLoaiSP' => $KNTLoaiSP]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function KNTcreate()
    {
        return view('KNTadmin.KNTLoaiSP.KNTcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function KNTstore(Request $request)
    {
        $request->validate([
            'kntMaLoai'=>'required',
            'kntTenLoai'=>'required',
            'kntStatus'=>'required|in:0,1',
        ],[
            'kntMaLoai.required'=>'Vui lòng nhập mã loại sản phẩm',
            'kntTenLoai.required'=>'Vui lòng nhập tên loại sản phẩm',
            'kntStatus.required'=>'Vui lòng chọn trạng thái',
        ]);
        $KNTLoaiSP = KNTLoaiSP::where('kntMaLoai', $request->kntMaLoai)->first();
        if($KNTLoaiSP){
            return redirect()->back()->with('error', 'Mã loại sản phẩm đã tồn tại!');
        }
        $data = $request->only('kntMaLoai', 'kntTenLoai', 'kntStatus');
        KNTLoaiSP::create($data);
        return redirect()->route('KNTadmin.KNTLoaiSP.index')->with('success', 'Thêm loại sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function KNTshow($KNTLoaiSP)
    {
        $KNTshow = KNTLoaiSP::where('kntMaLoai', $KNTLoaiSP)->first();
        return view('KNTadmin.KNTLoaiSP.KNTdetail', ['KNTLoaiSP' => $KNTshow]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function KNTedit($KNTLoaiSP)
    {
        $KNTedit = KNTLoaiSP::where('kntMaLoai', $KNTLoaiSP)->first();
        return view('KNTadmin.KNTLoaiSP.KNTedit', ['KNTLoaiSP' => $KNTedit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function KNTupdate(Request $request, $KNTLoaiSP)
    {
        $request->validate([
            'kntTenLoai'=>'required',
            'kntStatus'=>'required|in:0,1',
        ],[
            'kntTenLoai.required'=>'Vui lòng nhập tên loại sản phẩm',
            'kntStatus.required'=>'Vui lòng chọn trạng thái',
        ]);
        $data = $request->except('_token');
        KNTLoaiSP::where('kntMaLoai', $KNTLoaiSP)->update($data);
        return redirect('/knt-admin/knt-loaisp')->with('success', 'Sửa loại sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function KNTdestroy($KNTLoaiSP)
    {
        KNTLoaiSP::where('kntMaLoai', $KNTLoaiSP)->delete();
        return redirect('knt-admin/knt-loaisp')->with('success','Xóa loại sản phẩm thành công!');
    }
}
