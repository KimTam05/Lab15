<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KNTHoadon;
use App\Models\KNTCTHoadon;

class KNTHoadonController extends Controller
{
    public function KNTindex(){
        $KNTHoadon = KNTHoadon::paginate(10);
        return view('KNTadmin.KNTHoadon.KNTindex', ['KNTHoadon' => $KNTHoadon]);
    }
    public function KNTshow($KNTHoadon){
        $KNTHoadon_name = KNTHoadon::where('kntMaHD',$KNTHoadon)->first();
        $KNTCTHoadon = KNTCTHoadon::where('kntMaHD', $KNTHoadon)->paginate(10);
        return view('KNTadmin.KNTHoadon.KNTshow', ['KNTCTHoadon' => $KNTCTHoadon, 'KNTHoadon' => $KNTHoadon_name]);
    }
    public function KNTdelete($KNTHoadon){
        KNTCTHoadon::where('kntMaHD', $KNTHoadon)->delete();
        KNTHoadon::where('kntMaHD', $KNTHoadon)->delete();
        return redirect()->route('KNTadmin.KNTHoadon.KNTindex', ['KNTHoadon' => $KNTHoadon])->with('success', 'Xóa hóa đơn thành công!');
    }
}
