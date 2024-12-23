<?php

namespace App\Http\Controllers;

use App\Models\KNTKhachhang;
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
        $request->validate([
            'kntMaKH'=>'required',
            'kntHoTenKH'=>'required',
            'kntEmail'=>'required|unique:KNTKhachhang,email',
            'kntMatkhau'=>'required|min:6',
            'kntDienthoai'=> 'required',
            'kntDiachi'=>'required',
            'kntStatus'=>'required|in:0,1',
        ]);
        $data = $request->except('_token');
        KNTKhachhang::create($data);
        return redirect('/knt-admin/knt-khachhang');
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
    public function update(Request $request, $KNTKhachhang)
    {
        $request->validate([
            'kntMaKH'=>'required',
            'kntHoTenKH'=>'required',
            'kntEmail'=>'required|unique:KNTKhachhang,email',
            'kntMatkhau'=>'required|min:6',
            'kntDienthoai'=> 'required',
            'kntDiachi'=>'required',
            'kntStatus'=>'required|in:0,1',
        ]);
        $data = $request->except('_token');
        KNTKhachhang::where('kntMaKH', $KNTKhachhang)->update($data);
        return redirect('/knt-admin/knt-khachhang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KNTKhachhang $KNTKhachhang)
    {
        //
    }
}
