<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiSanPham extends Model
{
    use HasFactory,SoftDeletes;
    protected $hidden=['created_at','updated_at','trang_thai'];
    protected $table = "loai_san_pham";
    public function san_pham()
    {
        return $this->hasMany(SanPham::class,'loai_san_pham_id');
    }
    public function img()
    {
        return $this->belongsTo(HinhAnh::class);
    }   
    public function chi_tiet_san_pham()
    {
        // Đảm bảo rằng có sự tương ứng với tên bảng và khóa ngoại
        return $this->hasManyThrough(
            CTSanPham::class,
            SanPham::class,
            'loai_san_pham_id', // Khóa ngoại của LoaiSanPham trong SanPham
            'san_pham_id', // Khóa ngoại của SanPham trong ChiTietSanPham
            'id', // Khóa chính của LoaiSanPham
            'id' // Khóa chính của ChiTietSanPham
        );
    }
}




