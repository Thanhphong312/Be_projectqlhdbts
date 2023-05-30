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
        Schema::create('Nguoi_Dung', function (Blueprint $table) {
            $table->string('ND_MaND')->primary();
            $table->string('name');
            $table->string('ND_GioiTinh');
            $table->string('ND_DiaChi');
            $table->string('ND_Email')->unique();
            $table->string('password');
            $table->string('ND_SDT')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Nguoi_Dung');
    }
};