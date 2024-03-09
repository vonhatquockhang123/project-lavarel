<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongTinSanPham extends Model
{
    use HasFactory;
    protected $table="thong_tin_san_pham";
    public function san_pham()
    {
        return $this->belongsTo(SanPham::class);
    } 
}
