<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KNTQuantri extends Model
{
    use HasFactory;
    protected $table = 'kntquantri';
    protected $fillable = ['kntTaikhoan','kntMatkhau','kntStatus'];
}
