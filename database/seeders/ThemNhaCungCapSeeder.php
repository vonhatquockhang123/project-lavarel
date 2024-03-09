<?php

namespace Database\Seeders;

use App\Models\NhaCungCap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemNhaCungCapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nhaCungCap=new NhaCungCap();
        $nhaCungCap->ten="Công Ty Nokia";
        $nhaCungCap->dien_thoai="0345844444";
        $nhaCungCap->dia_chi="235 Đồng Khởi, P. Bến Nghé, Q. 1, Tp. Hồ Chí Minh";
        $nhaCungCap->save();

        $nhaCungCap=new NhaCungCap();
        $nhaCungCap->ten="Công Ty TNHH Thế Giới Di Động";
        $nhaCungCap->dien_thoai="0387765321";
        $nhaCungCap->dia_chi="364 Cộng Hòa, P. 13, Q. Tân Bình, Tp. Hồ Chí Minh";
        $nhaCungCap->save();
        echo "Thêm nhà cung cấp thành công!";

    }
}
