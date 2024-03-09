<?php

namespace Database\Seeders;

use App\Models\DungLuong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemDungLuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dungLuong=new DungLuong();
        $dungLuong->ten="128";
        $dungLuong->save();

        $dungLuong=new DungLuong();
        $dungLuong->ten="256";
        $dungLuong->save();

        $dungLuong=new DungLuong();
        $dungLuong->ten="512";
        $dungLuong->save();

        echo "Thêm dung lượng thành công!";
    }
}
