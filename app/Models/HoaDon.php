<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table="hoa_don";
    const TRANG_THAI_CHO_XU_LY = 1; 
    const TRANG_THAI_DA_DUYET = 2;
    const TRANG_THAI_DANG_GIAO = 3;
    const TRANG_THAI_HOAN_THANH = 4;
    const TRANG_THAI_DA_HUY = 5;
    public function quan_tri()
    {
        return $this->belongsTo(QuanTri::class);
    }
    
    public function nha_cung_cap()
    {
        return $this->belongsTo(NhaCungCap::class);
    }
    public function khach_hang()
    {
        return $this->belongsTo(KhachHang::class);
    }
    public function getTongTienFormattedAttribute()
    {
        return number_format($this->tong_tien, 0, ',', '.');
    }
    
}
