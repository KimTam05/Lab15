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
        Schema::create('kntctgiohang', function (Blueprint $table) {
            $table->id();
            $table->string('kntMaGH')->unique();
            $table->string('kntMaSP')->unique();
            $table->integer('kntSLMua');
            $table->float('kntDonGia');
            $table->float('kntThanhTien');
            $table->timestamps();
            $table->foreign('kntMaGH')->references('kntMaGH')->on('kntgiohang');
            $table->foreign('kntMaSP')->references('kntMaSP')->on('kntsanpham');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kntctgiohang');
    }
};
