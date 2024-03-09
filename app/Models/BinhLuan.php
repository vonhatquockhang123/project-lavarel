<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $table="binh_luan";

    public function khach_hang(){

        return $this->belongsTo(KhachHang::class);
    }
    public function san_pham(){
        
        return $this->belongsTo(SanPham::class);
    }
    public function chi_tiet_binh_luan(){

        return $this->hasOne(CTBinhLuan::class);
    }
}
