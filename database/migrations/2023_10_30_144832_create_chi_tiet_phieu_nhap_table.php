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
        Schema::create('chi_tiet_phieu_nhap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phieu_nhap_id')->constrained('phieu_nhap');
            $table->foreignId('san_pham_id')->constrained('san_pham');
            $table->foreignId('mau_sac_id')->constrained('mau_sac');
            $table->foreignId('dung_luong_id')->constrained('dung_luong');
            $table->integer("so_luong");
            $table->decimal("gia_nhap",10,0);
            $table->decimal("gia_ban",10,0);
            $table->decimal("thanh_tien",10,0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_phieu_nhap');
    }
};
