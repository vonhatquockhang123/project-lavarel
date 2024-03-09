<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTPhieuNhap extends Model
{
    use HasFactory;
    protected $table = "chi_tiet_phieu_nhap";
    public function phieu_nhap()
    {
        return $this->belongsTo(PhieuNhap::class);
    }
    public function san_pham()
    {
        return $this->belongsTo(SanPham::class);
    }
    public function getGiaNhapFormattedAttribute()
    {
        return number_format($this->gia_nhap, 0, ',', '.');
    }
    public function getGiaBanFormattedAttribute()
    {
        return number_format($this->gia_ban, 0, ',', '.');
    }
    public function getThanhTienFormattedAttribute()
    {
        return number_format($this->thanh_tien, 0, ',', '.');
    }
    public function mau_sac()
    {
        return $this->belongsTo(MauSac::class);
    }
    public function dung_luong()
    {
        return $this->belongsTo(DungLuong::class);
    }
}




