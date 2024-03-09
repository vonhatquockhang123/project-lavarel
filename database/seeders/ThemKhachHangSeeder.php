<?php

namespace Database\Seeders;

use App\Models\KhachHang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ThemKhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $khachHang=new KhachHang();
       $khachHang->ho_ten='Võ Văn Vinh';
       $khachHang->ten_dang_nhap='VanVinh';
       $khachHang->dien_thoai='0946147417';
       $khachHang->email='vanvinh@gmail.com';
       $khachHang->password=Hash::make(123);
       $khachHang->save();

       $khachHang=new KhachHang();
       $khachHang->ho_ten='Đào Hải Đăng';
       $khachHang->ten_dang_nhap='HaiDang';
       $khachHang->dien_thoai='0941486416';
       $khachHang->email='haidang@gmail.com';
       $khachHang->password=Hash::make(123);
       $khachHang->save();

       $khachHang=new KhachHang();
       $khachHang->ho_ten='Trần Thế Thông';
       $khachHang->ten_dang_nhap='TheThong';
       $khachHang->dien_thoai='0989714477';
       $khachHang->email='thethong@gmail.com';
       $khachHang->password=Hash::make(123);
       $khachHang->save();

       echo 'Thêm khách hàng thành công!';
    }
}
