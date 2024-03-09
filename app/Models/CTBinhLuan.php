<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTBinhLuan extends Model
{
    use HasFactory;
    protected $table="chi_tiet_binh_luan";
    public function quan_tri(){
        return $this->belongsTo(QuanTri::class);
    }
}
