<?php

namespace Database\Seeders;

use App\Models\Logo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemLoGoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loGo=new Logo();
        $loGo->img_url='logo/bDL9vBd5wi3VACrS65pnsk66M1gZqKhLtVxZQt4l.png';
        $loGo->save();
        echo 'Thêm logo thành công!';
    }
}
