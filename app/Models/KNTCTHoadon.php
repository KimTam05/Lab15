<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KNTCTHoadon extends Model
{
    use HasFactory;
    protected $table = 'kntcthoadon';
    protected $fillable = ['kntMaHD', 'kntMaSP', 'kntSLMua', 'kntDonGia', 'kntThanhTien', 'kntStatus'];
}
