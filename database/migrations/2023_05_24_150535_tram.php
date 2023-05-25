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
        Schema::create('Tram', function (Blueprint $table) {
            $table->string('T_MaTram')->primary();
            $table->string('CSHT_MaCSHT');
            $table->foreign('CSHT_MaCSHT')->references('CSHT_MaCSHT')->on('Co_So_Ha_Tang');
            $table->string('T_MaCSHT');
            $table->foreign('T_MaCSHT')->references('T_MaCSHT')->on('Tram');
            $table->string('HD_TenTram');
            $table->foreign('HD_TenTram')->references('HD_TenTram')->on('Hop_Dong');
            $table->string('T_DiaChi');
            $table->string('T_TinhTrang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Tram');
    }
};