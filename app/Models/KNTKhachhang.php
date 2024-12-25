<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KNTKhachhang extends Model
{
    use HasFactory;
    protected $table = 'kntkhachhang';
    protected $fillable = ['kntMaKH', 'kntHoTenKH', 'kntEmail', 'kntMatkhau', 'kntDienthoai', 'kntDiachi', 'kntNgayDangKy', 'kntStatus'];

    protected static function booted()
    {
        static::created(function ($khachhang) {
            $KNTGiohang_last = KNTGiohang::latest('id')->first();
            $KNTGiohang_next = $KNTGiohang_last ? $KNTGiohang_last->id + 1 : 1;
            $KNTGiohang_code = 'GH' . str_pad($KNTGiohang_next, 5, '0', STR_PAD_LEFT);
            KNTGiohang::create([
                'kntMaGH' => $KNTGiohang_code,
                'kntMaKH' => $khachhang->kntMaKH,
                'kntHoTenKH' => $khachhang->kntHoTenKH,
                'kntEmail' => $khachhang->kntEmail,
                'kntDienThoai' => $khachhang->kntDienthoai,
                'kntDiaChi' => $khachhang->kntDiachi,
                'kntStatus'=>0,
            ]);
        });
    }
}
