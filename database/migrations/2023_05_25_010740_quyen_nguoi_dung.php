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
        Schema::create('Quyen_Nguoi_Dung', function (Blueprint $table) {
            $table->id();
            $table->string('Q_MaQ');
            $table->string('ND_MaND');
            $table->foreign('Q_MaQ')->references('Q_MaQ')->on('Quyen');
            $table->foreign('ND_MaND')->references('ND_MaND')->on('Nguoi_Dung');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Quyen_Nguoi_Dung');
    }
};