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
        Schema::create('chi_tiet_binh_luan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('binh_luan_id')->constrained('binh_luan');
            $table->foreignId('quan_tri_id')->constrained('quan_tri');
            $table->text('noi_dung');
            $table->timestamp('ngay_tao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_binh_luan');
    }
};
