<?php

namespace Database\Seeders;

use App\Models\QuanTri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class ThemAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quanTri=new QuanTri();
        $quanTri->avatar_url='avt/9f1eFXrFyin63Eh3B4OOwHYdtp0kLJuu0QnC6cd4.jpg';
        $quanTri->ho_ten='Âu Tuấn Hưng';
        $quanTri->dien_thoai='0947417471';
        $quanTri->email='tuanhung@gmail.com';
        $quanTri->dia_chi='Quận 1, TP.HCM';
        $quanTri->username='tuanhung';
        $quanTri->password=Hash::make(123);
        $quanTri->save();
       

        $quanTri=new QuanTri();
        $quanTri->avatar_url='avt/9f1eFXrFyin63Eh3B4OOwHYdtp0kLJuu0QnC6cd4.jpg';
        $quanTri->ho_ten='Nguyễn Tuấn Dĩ';
        $quanTri->dien_thoai='0464184141';
        $quanTri->email='tuandi@gmail.com';
        $quanTri->dia_chi='Quận 7, TP.HCM';
        $quanTri->username='tuandi';
        $quanTri->password=Hash::make(123);
        $quanTri->save();
        

        $quanTri=new QuanTri();
        $quanTri->avatar_url='avt/9f1eFXrFyin63Eh3B4OOwHYdtp0kLJuu0QnC6cd4.jpg';
        $quanTri->ho_ten='Võ Nhật Quốc Khang';
        $quanTri->dien_thoai='0978414164';
        $quanTri->email='quockhang@gmail.com';
        $quanTri->dia_chi='Quận Cam, TP.HCM';
        $quanTri->username='quockhang';
        $quanTri->password=Hash::make(123);
        $quanTri->save();
        
        echo "Thêm quản trị thành công!";

    }
}
