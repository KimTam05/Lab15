<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KNTCTGiohang extends Model
{
    use HasFactory;
    protected $table = 'kntctgiohang';
    protected $fillable = ['kntMaGH', 'kntMaSP', 'kntSLMua', 'kntDonGia', 'kntThanhTien', 'kntStatus'];
    // Trong model KNTCTGiohang.php
    public function KNTSanpham()
    {
        return $this->belongsTo(KNTSanpham::class, 'kntMaSP', 'kntMaSP');  // 'kntMaSP' là khóa ngoại trong bảng KNTCTGiohang
    }
    public function kntgiohang()
    {
        return $this->belongsTo(KNTGiohang::class, 'kntMaGH');
    }
}
