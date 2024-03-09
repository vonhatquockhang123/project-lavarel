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
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->id();
            $table->foreignId('khach_hang_id')->constrained('khach_hang');
            $table->string("dien_thoai",10);
            $table->string("dia_chi",128)->nullable();
            $table->decimal("tong_tien",12,0)->nullable();
            $table->string("phuong_thuc_tt",60)->default('Tiền mặt');
            $table->unsignedSmallInteger("trang_thai")->default(1);
            $table->timestamp("ngay_tao");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_don');
    }
};
