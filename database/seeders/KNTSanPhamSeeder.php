<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KNTSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("kntsanpham")->insert([
            'kntMaSP'=>'VP001',
            'kntTenSP'=> 'Cây phú quý',
            'kntHinhAnh'=> 'images/san-pham/VP001.jpg',
            'kntSoLuong'=> 100,
            'kntDonGia'=> 699000,
            'kntMaLoai'=> 'L001',
            'kntStatus'=> 0,
        ]);
        DB::table("kntsanpham")->insert([
            'kntMaSP'=>'VP002',
            'kntTenSP'=> 'Cây đại phú gia',
            'kntHinhAnh'=> 'images/san-pham/VP002.jpg',
            'kntSoLuong'=> 100,
            'kntDonGia'=> 550000,
            'kntMaLoai'=> 'L001',
            'kntStatus'=> 0,
        ]);
        DB::table("kntsanpham")->insert([
            'kntMaSP'=>'VP003',
            'kntTenSP'=> 'Cây hạnh phúc',
            'kntHinhAnh'=> 'images/san-pham/VP003.jpg',
            'kntSoLuong'=> 150,
            'kntDonGia'=> 250000,
            'kntMaLoai'=> 'L001',
            'kntStatus'=> 0,
        ]);
        DB::table("kntsanpham")->insert([
            'kntMaSP'=>'VP004',
            'kntTenSP'=> 'Cây vạn lộc',
            'kntHinhAnh'=> 'images/san-pham/VP004.jpg',
            'kntSoLuong'=> 300,
            'kntDonGia'=> 799000,
            'kntMaLoai'=> 'L001',
            'kntStatus'=> 0,
        ]);
        DB::table("kntsanpham")->insert([
            'kntMaSP'=>'PT001',
            'kntTenSP'=> 'Cây thiết mộc lan',
            'kntHinhAnh'=> 'images/san-pham/PT001.jpg',
            'kntSoLuong'=> 150,
            'kntDonGia'=> 590000,
            'kntMaLoai'=> 'L003',
            'kntStatus'=> 0,
        ]);
        DB::table("kntsanpham")->insert([
            'kntMaSP'=>'PT002',
            'kntTenSP'=> 'Cây trường sinh',
            'kntHinhAnh'=> 'images/san-pham/PT002.jpg',
            'kntSoLuong'=> 100,
            'kntDonGia'=> 150000,
            'kntMaLoai'=> 'L003',
            'kntStatus'=> 0,
        ]);
        DB::table("kntsanpham")->insert([
            'kntMaSP'=>'PT003',
            'kntTenSP'=> 'Cây hạnh phúc',
            'kntHinhAnh'=> 'images/san-pham/PT003.jpg',
            'kntSoLuong'=> 200,
            'kntDonGia'=> 299000,
            'kntMaLoai'=> 'L003',
            'kntStatus'=> 0,
        ]);
        DB::table("kntsanpham")->insert([
            'kntMaSP'=>'PT004',
            'kntTenSP'=> 'Cây hoa nhài (Lài ta)',
            'kntHinhAnh'=> 'images/san-pham/PT004.jpg',
            'kntSoLuong'=> 300,
            'kntDonGia'=> 199000,
            'kntMaLoai'=> 'L003',
            'kntStatus'=> 0,
        ]);
    }
}
