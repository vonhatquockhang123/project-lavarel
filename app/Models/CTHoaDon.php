<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTHoaDon extends Model
{
    use HasFactory;
    protected $table="chi_tiet_hoa_don";
    public function san_pham()
    {
        return $this->belongsTo(SanPham::class);
    }
    public function mau_sac(){
        return $this->belongsTo(MauSac::class);
    }
    public function dung_luong(){
        return $this->belongsTo(DungLuong::class);
    }
    public function getDonGiaFormattedAttribute()
    {
        return number_format($this->don_gia, 0, ',', '.');
    }
    public function getThanhTienFormattedAttribute()
    {
        return number_format($this->thanh_tien, 0, ',', '.');
    }
}
