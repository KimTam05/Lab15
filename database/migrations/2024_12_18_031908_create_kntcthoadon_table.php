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
            $table->string('kntMaHD');
            $table->string('kntMaSP');
            $table->integer('kntSLMua');
            $table->decimal('kntDonGia', 10);
            $table->decimal('kntThanhTien', 10);
            $table->timestamps();
            $table->foreign('kntMaHD')->references('kntMaHD')->on('knthoadon');
            $table->foreign('kntMaSP')->references('kntMaSP')->on('kntsanpham');
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
