<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MauSac extends Model
{
    use HasFactory;
    protected $table ="mau_sac";
    protected $hidden=['created_at','updated_at'];
    public function san_pham()
    {
        return $this->belongsTo(SanPham::class);
    }
    public function chi_tiet_san_pham()
    {
        return $this->belongsTo(CTSanPham::class,'mau_sac_id');
    }
    
}
