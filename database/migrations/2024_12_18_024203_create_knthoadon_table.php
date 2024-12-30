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
        Schema::create('knthoadon', function (Blueprint $table) {
            $table->id();
            $table->string('kntMaHD')->unique();
            $table->string('kntMaKH');
            $table->dateTime('kntNgayHoaDon');
            $table->dateTime('kntNgayNhan');
            $table->string('kntHoTenKH');
            $table->string('kntEmail');
            $table->string('kntDienthoai', 10);
            $table->string('kntDiachi');
            $table->decimal('kntTongtien', 10);
            $table->tinyInteger('kntStatus');
            $table->timestamps();
            $table->foreign('kntMaKH')->references('kntMaKH')->on('kntkhachhang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knthoadon');
    }
};
