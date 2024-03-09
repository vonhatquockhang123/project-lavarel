<?php

namespace Database\Seeders;

use App\Models\Slides;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemSlidesShowSeeder extends Seeder
{
    
    public function run(): void
    {
        $sliDe=new Slides();
        $sliDe->img_url="slide/usyx7rN2cPP7RVSHMuw2HWLVu2Xw0zBjB63irsSD.jpg";
        $sliDe->tieu_de="Banner chính";
        $sliDe->save();

        $sliDe=new Slides();
        $sliDe->img_url="slide/bo78nZDykIZkQJIMfRBtbsloi1G1MEuTRSNgJYqI.png";
        $sliDe->tieu_de="Banner phụ 1";
        $sliDe->save();

        $sliDe=new Slides();
        $sliDe->img_url="slide/wNQRGJNJV687ZosbKbtIYseFEGS7s9hMfsINFc7q.png";
        $sliDe->tieu_de="Banner phụ 2";
        $sliDe->save();

        echo "Thêm slides thành công!";
    }
}
