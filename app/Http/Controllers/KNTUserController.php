<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KNTSanpham;

class KNTUserController extends Controller
{
    public function KNTindex(){
        $KNTSanpham = KNTSanpham::all();
        return view('KNTuser.KNTindex', ['KNTSanpham' => $KNTSanpham]);
    }
    public function KNTabout(){
        return view('KNTuser.KNTabout');
    }
}
