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
            // $table->string('CSHT_MaCSHT');
            $table->foreignId('CSHT_MaCSHT')->constrained('Co_So_Ha_Tang');
            $table->string('T_MaCSHT');
            $table->string('T_TenTram');
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