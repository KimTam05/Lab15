<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KNTKhachhang extends Model
{
    use HasFactory;
    protected $table = 'kntkhachhang';
    protected $fillable = ['kntMaKH', 'kntHoTenKH', 'kntEmail', 'kntMatkhau', 'kntDienthoai', 'kntDiachi', 'kntStatus'];
}
