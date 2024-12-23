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
        Schema::create('kntloaisanpham', function (Blueprint $table) {
            $table->id();
            $table->string('kntMaLoai')->unique();
            $table->string('kntTenLoai');
            $table->tinyInteger('kntStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kntloaisanpham');
    }
};
