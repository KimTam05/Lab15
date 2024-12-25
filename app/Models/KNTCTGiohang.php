<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KNTCTGiohang extends Model
{
    use HasFactory;
    protected $table = 'kntctgiohang';
    protected $fillable = ['kntMaGH', 'kntMaSP', 'kntSLMua', 'kntDonGia', 'kntThanhTien', 'kntStatus'];
    public function kntsanpham()
    {
        return $this->belongsTo(KNTSanpham::class, 'kntMaSP');
    }
    public function kntgiohang()
    {
        return $this->belongsTo(KTNGiohang::class, 'kntMaGH');
    }
}
