<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KNTGioHang extends Model
{
    use HasFactory;

    protected $table = 'kntgiohang';
    protected $fillable = ['kntMaKH', 'kntMaGH', 'kntHoTenKH','kntEmail', 'kntDienThoai', 'kntDiaChi', 'kntTongtien', 'kntStatus'];

    public function kntkhachhang()
    {
        return $this->belongsTo(KNTKhachhang::class, 'kntMaKH');
    }
}
