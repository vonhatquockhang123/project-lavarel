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
        Schema::create('quan_tri', function (Blueprint $table) {
            $table->id();
            $table->text('avatar_url')->nullable();
            $table->string("ho_ten",40);
            $table->string("dien_thoai",10)->nullable();
            $table->string("email",80)->nullable();
            $table->string("dia_chi",128)->nullable();
            $table->string("username",60);
            $table->string("password",100);
            $table->boolean("trang_thai")->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quan_tri');
    }
};
