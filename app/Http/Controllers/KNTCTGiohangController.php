<?php

namespace App\Http\Controllers;

use App\Models\KNTCTGiohang;
use App\Models\KNTSanpham;
use App\Models\KNTGiohang;
use Illuminate\Http\Request;

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
        ]);
        $data = $request->except('_token');
        $KNTSanpham = KNTSanpham::where('kntMaSP', $data['kntMaSP'])->first();
        $data['kntDongia'] = $KNTSanpham['kntDongia'];
        $data['kntThanhTien'] = $data['kntDongia'] * $data['kntSLMua'];
        KNTCTGiohang::create($data);
        return redirect()->route('KNTadmin.KNTCTGiohang.index');
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
        $KNTCTGiohang_data = KNTGiohang::where('kntMaGH', $KNTCTGiohang)->first();
        $request->validate([
            'kntMaSP' => 'required',
            'kntSLMua' => 'required',
        ]);
        $data = $request->except('_token');
        $KNTSanpham = KNTSanpham::where('kntMaSP', $data['kntMaSP'])->first();
        $data['kntMaGH'] = $KNTCTGiohang_data->kntMaGH;
        $data['kntDonGia'] = $KNTSanpham['kntDongia'];
        $data['kntThanhTien'] = $data['kntDonGia'] * $data['kntSLMua'];
        KNTCTGiohang::create($data);
        return redirect()->route('KNTadmin.KNTCTGiohang.show', ['kntctgiohang' => $KNTCTGiohang_data->kntMaGH]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function KNTupdate(Request $request, $KNTCTGiohang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function KNTdestroy($KNTCTGiohang)
    {
        KNTCTGiohang::where('kntMaGH', $KNTCTGiohang)->delete();
        $KNTCTGiohang_id = KNTCTGiohang::where('kntMaGH', $KNTCTGiohang)->first();

        if($KNTCTGiohang_id){
            $KNTGiohang = KNTGiohang::where('kntMaGH', $KNTCTGiohang)->get();
            if($KNTGiohang){
                $KNTGiohang -> update(['kntStatus' => 1]);
            }
            else{
                $KNTGiohang -> update(['kntStatus' => 0]);
            }
        }
    }
}
