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
        Schema::create('kntquantri', function (Blueprint $table) {
            $table->id();
            $table->string('kntTaikhoan', 255)->unique();
            $table->string('kntMatkhau',255);
            $table->tinyInteger('kntStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kntquantri');
    }
};
