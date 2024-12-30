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
            'kntMaSP'=>'required|unique:kntsanpham,kntMaSP',
            'kntTenSP'=>'required',
            'kntHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kntSoLuong'=>'required',
            'kntDongia'=>'required',
            'kntMaLoai'=>'required',
            'kntStatus'=>'required',
        ],[
            'kntMaSP.required'=>'Vui lòng nhập mã sản phẩm',
            'kntMaSP.unique'=>'Mã sản phẩm đã tồn tại',
            'kntTenSP.required'=>'Vui lòng nhập tên sản phẩm',
            'kntHinhAnh.required'=>'Vui lòng chọn hình ảnh',
            'kntHinhAnh.image'=>'Vui lòng chọn hình ảnh',
            'kntHinhAnh.mimes'=>'Vui lòng chọn hình ảnh có định dạng .jpeg, .png, .jpg, .gif',
            'kntHinhAnh.max'=>'Vui lòng chọn hình ảnh có dung lượng nhỏ hơn 2MB',
            'kntSoLuong.required'=>'Vui lòng nhập số lượng',
            'kntDongia.required'=>'Vui lòng nhập đơn giá',
            'kntMaLoai.required'=>'Vui lòng chọn loại sản phẩm',
            'kntStatus.required'=>'Vui lòng chọn trạng thái',
        ]);
        $KNTSanpham = KNTSanpham::where('kntMaSP', $request->kntMaSP)->first();
        $KNTAnh = $request->file('kntHinhAnh');
        $KNTTenHinhAnh = time() . '_' . $KNTAnh->getClientOriginalName(); // Đặt tên file
        $KNTDuongDan = $KNTAnh->storeAs('images', $KNTTenHinhAnh, 'public'); // Lưu vào thư mục 'public/storage/images'
        $data = $request->except('_token');
        $data['kntHinhAnh'] = $KNTDuongDan;
        KNTSanpham::create($data);
        return redirect()->route('KNTadmin.KNTSanpham.index')->with('success', 'Thêm sản phẩm thành công!');
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
        $KNTsanpham = KNTSanpham::where('kntMaSP', $KNTMaSP)->first();
        if (!$KNTsanpham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
        $request->validate([
            'kntTenSP'=>'required',
            'kntHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kntSoLuong'=>'required',
            'kntDongia'=>'required',
            'kntMaLoai'=>'required',
            'kntStatus'=>'required',
        ],[
            'kntMaSP.required'=>'Vui lòng nhập mã sản phẩm',
            'kntMaSP.unique'=>'Mã sản phẩm đã tồn tại',
            'kntTenSP.required'=>'Vui lòng nhập tên sản phẩm',
            'kntHinhAnh.image'=>'Vui lòng chọn hình ảnh',
            'kntHinhAnh.mimes'=>'Vui lòng chọn hình ảnh có định dạng .jpeg, .png, .jpg, .gif',
            'kntHinhAnh.max'=>'Vui lòng chọn hình ảnh có dung lượng nhỏ hơn 2MB',
            'kntSoLuong.required'=>'Vui lòng nhập số lượng',
            'kntDongia.required'=>'Vui lòng nhập đơn giá',
            'kntMaLoai.required'=>'Vui lòng chọn loại sản phẩm',
            'kntStatus.required'=>'Vui lòng chọn trạng thái',
        ]);
        $KNTDuongDan = $KNTsanpham->kntHinhAnh;
        if($request->hasFile('kntHinhAnh')){
            $KNTAnh = $request->file('kntHinhAnh');
            $KNTTenHinhAnh = time() . '_' . $KNTAnh->getClientOriginalName(); // Đặt tên file
            $KNTDuongDan = $KNTAnh->storeAs('images', $KNTTenHinhAnh, 'public');

            if ($KNTsanpham->kntHinhAnh && \Storage::disk('public')->exists($KNTsanpham->kntHinhAnh)) {
                \Storage::disk('public')->delete($KNTsanpham->kntHinhAnh);
            }
        }
        $data = $request->except('_token', 'kntHinhAnh');
        $data['kntHinhAnh'] = $KNTDuongDan;
        $KNTsanpham->update($data);
        return redirect()->route('KNTadmin.KNTSanpham.index')->with('success', 'Sửa sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function KNTdestroy($KNTMaSP)
    {
        KNTSanpham::where('kntMaSP',$KNTMaSP)->delete();
        return redirect()->route('KNTadmin.KNTSanpham.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
