<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DungLuong extends Model
{
    use HasFactory;
    protected $table ="dung_luong";
    protected $hidden=['created_at','updated_at'];
    public function chi_tiet_san_pham()
    {
        return $this->belongsTo(CTSanPham::class,'dung_luong_id');
    }
}
