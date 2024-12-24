<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KNTHoadon extends Model
{
    use HasFactory;
    protected $table = 'knthoadon';
    protected $fillable = ['kntMaHD', 'kntMaKH', 'kntNgayNhan', 'kntHoTenKH', 'kntEmail', 'kntDienThoai', 'kntDiaChi', 'kntTongTriGia'];
}
