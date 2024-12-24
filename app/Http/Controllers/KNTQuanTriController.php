<?php

namespace App\Http\Controllers;

use App\Models\KNTQuantri;
use App\Models\User;
use Illuminate\Http\Request;

class KNTQuanTriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function KNTindex()
    {
        $KNTQuanTri = KNTQuantri::paginate(5);
        return view('KNTadmin.KNTQuanTri.KNTlist', ['KNTQuanTri' => $KNTQuanTri]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function KNTcreate()
    {
        return view('KNTadmin.KNTQuanTri.KNTcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function KNTstore(Request $request)
    {
        $request->merge([
            'kntStatus' => $request->input('kntStatus', 0), // Gán giá trị mặc định là 0 nếu không có
        ]);
        $request->validate([
            'kntTaikhoan'=>'required|min:6',
            'kntMatkhau'=>'required|min:6',
            'confirm_password'=>'required|same:kntMatkhau',
            'kntStatus'=> 'required|in:0,1',
        ]);
        $data = $request->except('_token');
        KNTQuanTri::create($data);
        return redirect()->route('KNTadmin.KNTQuanTri.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function KNTedit($KNTMaTK)
    {
        $KNTQuanTri = KNTQuanTri::where('id', $KNTMaTK)->first();
        return view('KNTadmin.KNTQuantri.KNTedit', ['KNTQuanTri'=>$KNTQuanTri]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function KNTupdate(Request $request, $KNTQuanTri)
    {
        $request->validate([
            'kntTaikhoan'=>'required|min:6|exists:kntquantri',
            'kntMatkhau'=>'required|min:6',
            'kntStatus'=> 'required|in:0,1',
        ]);
        $data = $request->except('_token');
        KNTQuanTri::where('id', $KNTQuanTri)->update($data);
        $KNTcheck = KNTQuanTri::where('id', $KNTQuanTri)->first();
        if($data['kntStatus'] == 1){
            return redirect()->route('KNTadmin.logout');
        }
        return redirect()->route('KNTadmin.KNTQuanTri.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function KNTdestroy($KNTQuanTri)
    {
        KNTQuanTri::where('id', $KNTQuanTri)->delete();
        return redirect()->route('KNTadmin.KNTQuanTri.index');
    }
}
