<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kntkhachhang', function (Blueprint $table) {
            $table->id();
            $table->string('kntMaKH')->unique();
            $table->string('kntHoTenKH');
            $table->string('kntEmail')->unique();
            $table->string('kntMatkhau');
            $table->string('kntDienthoai',10)->unique();
            $table->string('kntDiachi');
            $table->dateTime('kntNgayDangKy');
            $table->tinyInteger('kntStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kntkhachhang');
    }
};
