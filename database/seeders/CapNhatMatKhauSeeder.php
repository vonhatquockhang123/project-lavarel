<?php

namespace Database\Seeders;

use App\Models\NhanVien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CapNhatMatKhauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=NhanVien::all();
        foreach($users as $user){
            echo "Cập nhật mật khẩu cho user {$user->username}";
            $user->password=Hash::make($user->password);
            $user->save();
        }
    }
}
