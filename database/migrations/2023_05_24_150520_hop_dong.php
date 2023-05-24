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
        Schema::create('Hop_Dong', function (Blueprint $table) {
            $table->string('HD_MaHD')->primary();
            $table->string('ND_MaND');
            $table->string('T_MaTram');
            $table->string('DV_MaDV');
            $table->string('CSHT_MaCSHT');
            $table->string('HD_MaND');
            $table->string('HD_MaCSHT');
            $table->string('HD_MaDV');
            $table->string('HD_MaTram');
            $table->string('HD_TenTram');
            $table->string('HD_NgayDangKy');
            $table->string('HD_NgayHetHan');
            $table->string('HD_NgayPhuLuc');
            $table->string('HD_GiaGoc');
            $table->string('HD_GiaHienTai');
            $table->string('HD_SoTaiKhoan');
            $table->string('HD_TenCTK');
            $table->string('HD_TenNH');
            $table->string('HD_TenChuDauTu');
            $table->string('HD_HDScan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Hop_Dong');
    }
};