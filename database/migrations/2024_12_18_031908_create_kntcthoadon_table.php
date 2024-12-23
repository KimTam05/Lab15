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
        Schema::create('kntcthoadon', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kntHoaDonID')->unsigned();
            $table->bigInteger('kntSanPhamID')->unsigned();
            $table->integer('kntSLMua');
            $table->float('kntDonGiaMua');
            $table->float('kntThanhTien');
            $table->tinyInteger('kntStatus');
            $table->timestamps();
            $table->foreign('kntHoaDonID')->references('id')->on('knthoadon');
            $table->foreign('kntSanPhamID')->references('id')->on('kntsanpham');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kntcthoadon');
    }
};
