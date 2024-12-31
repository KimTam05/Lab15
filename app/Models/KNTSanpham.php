<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KNTSanpham extends Model
{
    use HasFactory;
    protected $table = 'kntsanpham';
    protected $fillable = ['kntMaSP','kntTenSP','kntHinhAnh','kntSoLuong','kntDongia','kntMaLoai','kntStatus'];
    public function KNTCTGiohang()
    {
        return $this->hasMany(KNTCTGiohang::class, 'kntMaSP');
    }

}
