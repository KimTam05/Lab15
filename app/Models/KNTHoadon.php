<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KNTHoadon extends Model
{
    use HasFactory;
    protected $table = 'knthoadon';
    protected $fillable = ['kntMaHD', 'kntMaKH', 'kntNgayHoaDon', 'kntNgayNhan', 'kntHoTenKH', 'kntEmail', 'kntDienthoai', 'kntDiachi', 'kntTongtien', 'kntStatus'];
    public function kntkhachhang()
    {
        return $this->belongsTo(KNTKhachhang::class, 'kntMaKH');
    }
}
