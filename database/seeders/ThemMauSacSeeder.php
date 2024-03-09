<?php

namespace Database\Seeders;

use App\Models\MauSac;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemMauSacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mauSac=new MauSac();
        $mauSac->ten="Đen";
        $mauSac->save();

        $mauSac=new MauSac();
        $mauSac->ten="Xanh dương";
        $mauSac->save();

        $mauSac=new MauSac();
        $mauSac->ten="Titan đen";
        $mauSac->save();

        $mauSac=new MauSac();
        $mauSac->ten="Titan trắng";
        $mauSac->save();

        echo "Thêm màu sắc thành công!";

    }
}
