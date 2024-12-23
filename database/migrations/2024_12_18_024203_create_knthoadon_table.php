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
            $table->bigInteger('kntMaKH')->unsigned();
            $table->dateTime('kntNgayHoaDon');
            $table->dateTime('kntNgayNhan');
            $table->string('kntHoTenKH');
            $table->string('kntEmail');
            $table->string('kntDienThoai', 10);
            $table->string('kntDiaChi');
            $table->float('kntTongTriGia');
            $table->tinyInteger('kntStatus');
            $table->foreign('kntMaKH')->references('id')->on('kntkhachhang');
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
