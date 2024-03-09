<?php

namespace Database\Seeders;

use App\Models\SanPham;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sanPham=new SanPham();
        $sanPham->ten="iPhone 13 Pro";
        $sanPham->mo_ta="Giá siêu rẻ";
        $sanPham->loai_san_pham_id=1;
        $sanPham->save();

        $sanPham=new SanPham();
        $sanPham->ten="Samsung A54";
        $sanPham->mo_ta="Giá siêu rẻ";
        $sanPham->loai_san_pham_id=2;
        $sanPham->save();

        $sanPham=new SanPham();
        $sanPham->ten="Xiaomi 13T 5G";
        $sanPham->mo_ta="Giá siêu rẻ";
        $sanPham->loai_san_pham_id=3;
        $sanPham->save();

        $sanPham=new SanPham();
        $sanPham->ten="OPPO A38";
        $sanPham->mo_ta="Giá siêu rẻ";
        $sanPham->loai_san_pham_id=4;
        $sanPham->save();

        $sanPham=new SanPham();
        $sanPham->ten="Nokia C20";
        $sanPham->mo_ta="Giá siêu rẻ";
        $sanPham->loai_san_pham_id=5;
        $sanPham->save();

        $sanPham=new SanPham();
        $sanPham->ten="Samsung C32";
        $sanPham->mo_ta="Giá siêu rẻ";
        $sanPham->loai_san_pham_id=2;
        $sanPham->save();
        echo "Thêm sản phẩm thành công!";

    }
}
