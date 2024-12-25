<?php

namespace App\Http\Controllers;

use App\Models\KNTGioHang;

use Illuminate\Http\Request;

class KNTGiohangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function KNTindex()
    {
        $KNTGiohang = KNTGioHang::paginate(10);
        return view('KNTadmin.KNTGiohang.KNTlist',['KNTGiohang' => $KNTGiohang]);
    }

}
