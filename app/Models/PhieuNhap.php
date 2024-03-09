<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    use HasFactory;
    protected $table = "phieu_nhap";
    public function nha_cung_cap()
    {
        return $this->belongsTo(NhaCungCap::class);
    } 
    public function getTongTienFormattedAttribute()
    {
        return number_format($this->tong_tien, 0, ',', '.');
    }
}




