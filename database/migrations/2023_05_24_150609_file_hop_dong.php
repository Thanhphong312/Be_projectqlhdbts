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
        Schema::create('File_Hop_Dong', function (Blueprint $table) {
            $table->string('F_File')->primary();
            $table->string('HD_MaND');
            $table->string('F_MaND');
            $table->string('F_Loai');
            $table->string('F_NgayTao');
            $table->string('F_NgaySua');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('File_Hop_Dong');
    }
};