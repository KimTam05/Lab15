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
        Schema::create('kntgiohang', function (Blueprint $table) {
            $table->id();
            $table->string('kntMaGH')->unique();
            $table->string('kntMaKH');
            $table->string('kntHoTenKH');
            $table->string('kntEmail');
            $table->string('kntDienthoai', 10);
            $table->string('kntDiachi');
            $table->tinyInteger('kntStatus');
            $table->foreign('kntMaKH')->references('kntMaKH')->on('kntkhachhang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kntgiohang');
    }
};
