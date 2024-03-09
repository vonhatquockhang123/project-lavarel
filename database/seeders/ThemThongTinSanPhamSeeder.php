<?php

namespace Database\Seeders;

use App\Models\ThongTinSanPham;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemThongTinSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tTSanPham=new ThongTinSanPham();
        $tTSanPham->san_pham_id="1";
        $tTSanPham->man_hinh="6.1";
        $tTSanPham->do_phan_giai="1284 x 2778 Pixels";
        $tTSanPham->kich_thuoc="Dài 159.9 mm - Ngang 76.7 mm - Dày 8.25 mm";
        $tTSanPham->trong_luong="221";
        $tTSanPham->he_dieu_hanh="iOS 15";
        $tTSanPham->ram="6";
        $tTSanPham->camera="3 camera 12 MP";
        $tTSanPham->pin="3095";
        $tTSanPham->save();

        $tTSanPham=new ThongTinSanPham();
        $tTSanPham->san_pham_id="2";
        $tTSanPham->man_hinh="6.5";
        $tTSanPham->do_phan_giai="HD + (720 x 1600 Pixels)";
        $tTSanPham->kich_thuoc="Dài 169.9 mm, ngang 77.9 mm, dày 8.8 mm";
        $tTSanPham->trong_luong="191";
        $tTSanPham->he_dieu_hanh="Android 11";
        $tTSanPham->ram="2";
        $tTSanPham->camera="3 camera 12 MP";
        $tTSanPham->pin="2950";
        $tTSanPham->save();

        $tTSanPham=new ThongTinSanPham();
        $tTSanPham->san_pham_id="3";
        $tTSanPham->man_hinh="6.4";
        $tTSanPham->do_phan_giai="Full HD+ (1080 x 2340 Pixels)";
        $tTSanPham->kich_thuoc="Dài 169.9 mm, ngang 77.9 mm, dày 8.8 mm";
        $tTSanPham->trong_luong="202";
        $tTSanPham->he_dieu_hanh="Android 12";
        $tTSanPham->ram="8";
        $tTSanPham->camera="32 MP";
        $tTSanPham->pin="5000";
        $tTSanPham->save();

        $tTSanPham=new ThongTinSanPham();
        $tTSanPham->san_pham_id="4";
        $tTSanPham->man_hinh="6.67";
        $tTSanPham->do_phan_giai="1.5K (1220 x 2712 Pixels)";
        $tTSanPham->kich_thuoc="Dài 162.2 mm - Ngang 75.7 mm - Dày 8.49 mm";
        $tTSanPham->trong_luong="197";
        $tTSanPham->he_dieu_hanh="Android 13";
        $tTSanPham->ram="8";
        $tTSanPham->camera="Chính 50 MP & Phụ 50 MP, 12 MP";
        $tTSanPham->pin="5000";
        $tTSanPham->save();

        $tTSanPham=new ThongTinSanPham();
        $tTSanPham->san_pham_id="5";
        $tTSanPham->man_hinh="6.56";
        $tTSanPham->do_phan_giai="HD+ (720 x 1612 Pixels)";
        $tTSanPham->kich_thuoc="Dài 163.74 mm - Ngang 75.03 mm - Dày 8.16 mm";
        $tTSanPham->trong_luong="190";
        $tTSanPham->he_dieu_hanh="Android 13";
        $tTSanPham->ram="4";
        $tTSanPham->camera="Chính 50 MP & Phụ 2 MP";
        $tTSanPham->pin="5000";
        $tTSanPham->save();

        $tTSanPham=new ThongTinSanPham();
        $tTSanPham->san_pham_id="6";
        $tTSanPham->man_hinh="6.4";
        $tTSanPham->do_phan_giai="Full HD+ (1080 x 2400 Pixels)";
        $tTSanPham->kich_thuoc="Dài 158.9 mm - Ngang 73.6 mm - Dày 8.4 mm";
        $tTSanPham->trong_luong="184";
        $tTSanPham->he_dieu_hanh="Android 11";
        $tTSanPham->ram="6";
        $tTSanPham->camera="Chính 64 MP & Phụ 8 MP, 5 MP, 5 MP";
        $tTSanPham->pin="5000";
        $tTSanPham->save();

        echo "Thêm chi tiết sản phẩm thành công!";

    }
}
