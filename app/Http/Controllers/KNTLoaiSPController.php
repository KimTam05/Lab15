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
            'kntMaLoai'=>'required|unique:KNTLoaisanpham,kntMaLoai',
            'kntTenLoai'=>'required',
            'kntStatus'=>'required|in:0,1',
        ]);
        $data = $request->only('kntMaLoai', 'kntTenLoai', 'kntStatus');
        KNTLoaiSP::create($data);
        return redirect()->route('KNTadmin.KNTLoaiSP.index');
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
        ]);
        $data = $request->except('_token');
        KNTLoaiSP::where('kntMaLoai', $KNTLoaiSP)->update($data);
        return redirect('/knt-admin/knt-loaisp')->with('message', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function KNTdestroy($KNTLoaiSP)
    {
        KNTLoaiSP::where('kntMaLoai', $KNTLoaiSP)->delete();
        return redirect('knt-admin/knt-loaisp')->with(['message'=>'Xóa thành công']);
    }
}
