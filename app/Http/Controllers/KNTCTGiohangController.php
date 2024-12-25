<?php

namespace App\Http\Controllers;

use App\Models\KNTCTGiohang;
use Illuminate\Http\Request;

class KNTCTGiohangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function KNTindex()
    {
        $KNTCTGiohang = KNTCTGiohang::pagniate(10);
        return view('KNTadmin.KNTCTGiohang.KNTlist', ['KNTCTGiohang' => $KNTCTGiohang]);
    }

    public function KNTlink($KNTCTGiohang)
    {
        $KNTlink = KNTCTGiohang::where('kntMaGH', $KNTCTGiohang)->get();
        return view('KNTadmin.KNTCTGiohang.KNTlink', ['KNTCTGiohang' => $KNTlink]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function KNTstore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function KNTshow($KNTCTGiohang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function KNTedit($KNTCTGiohang)
    {
        //
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
