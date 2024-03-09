<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    use HasFactory;
    protected $table = "img";
    protected $hidden=['san_pham_id', 'created_at', 'updated_at'];
    public function san_pham()
    {
        return $this->belongsTo(SanPham::class);
    }
}




