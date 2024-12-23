<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KNTLoaiSPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("kntloaisanpham")->insert([
            'kntMaLoai'=>'L001',
            'kntTenLoai'=>'Cây cảnh văn phòng',
            'kntStatus'=>0,
        ]);
        DB::table("kntloaisanpham")->insert([
            'kntMaLoai'=>'L002',
            'kntTenLoai'=>'Cây để bàn',
            'kntStatus'=>0,
        ]);
        DB::table("kntloaisanpham")->insert([
            'kntMaLoai'=>'L003',
            'kntTenLoai'=>'Cây cảnh phong thủy ',
            'kntStatus'=>0,
        ]);
        DB::table("kntloaisanpham")->insert([
            'kntMaLoai'=>'L004',
            'kntTenLoai'=>'Cây thủy canh',
            'kntStatus'=>0,
        ]);
    }
}
