<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KNTQuanTriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kntMatkhau = '123456a@';
        DB::table("kntquantri")->insert([
            'kntTaikhoan'=> 'kimngoctam15@gmail.com',
            'kntMatkhau'=> $kntMatkhau,
            'kntStatus'=> 0,
        ]);

        DB::table("kntquantri")->insert([
            'kntTaikhoan'=> '0987422491',
            'kntMatkhau'=> $kntMatkhau,
            'kntStatus'=> 0,
        ]);
    }
}
