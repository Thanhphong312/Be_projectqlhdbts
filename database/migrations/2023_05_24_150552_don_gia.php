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
        Schema::create('Don_Gia', function (Blueprint $table) {
            $table->string('DG_MaDon')->primary();
            $table->string('HD_MaND');
            $table->string('DG_MaND');
            $table->string('DG_Thang');
            $table->string('DG_Nam');
            $table->string('DG_Gia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Don_Gia');
    }
};