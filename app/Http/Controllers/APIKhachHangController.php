<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHangRequest;
use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class APIKhachHangController extends Controller
{
    public function dangKy(KhachHangRequest $request)
    {
        $taiKhoan=KhachHang::where('email',$request->email)->first();
        if(!empty($taiKhoan))
        {
            return response()->json([
                'success'=>false,
                'message'=>'Email đã tồn tại!'
            ]);
        }
        $khachHang=new KhachHang();
        $khachHang->ho_ten=$request->ho_ten;
        $khachHang->email=$request->email;
        $khachHang->ten_dang_nhap=$request->ten_dang_nhap;
        $khachHang->password=Hash::make($request->mat_khau);
        $khachHang->dien_thoai=$request->dien_thoai;
        $khachHang->dia_chi=$request->dia_chi;
        $khachHang->save();
        return response()->json([
            'success'=>true,
            'message'=>'Đăng ký tài khoản thành công!'
        ]);
    }
    public function capNhapThongTin(Request $request)
    {
        $khachHang= KhachHang::where("email",$request->email)->first();
        if(empty($khachHang)){
            return response()->json([
                'success'=>false,
                'message'=>'Email không tồn tại!'
            ]);
        }
        $khachHang->ho_ten=$request->ho_ten;
        $khachHang->dien_thoai=$request->so_dien_thoai;
        $khachHang->dia_chi=$request->dia_chi;
        $khachHang->save();
        return response()->json([
            'success'=>true,
            'data'=>$khachHang,
            'message'=>"Cập nhật tài khoản thành công!"
        ]);
    }
    public function doiMatKhau(Request $request){
        

        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6|max:40',
            'email'=>'required|email'
        ]);

        $user = KhachHang::where('email',$request->email)->first();

        if(!$user){
            return response()->json([
                "success"=>false,
                "message"=>"Người dùng không tồn tại!",
            ]);
        }

        if(!Hash::check($request->oldPassword, $user->password)){
            return response()->json([
                "success"=>false,
                "message"=>"Mật khẩu không chính xác!",
            ]);
        }

        $user->password=Hash::make($request->newPassword);
        $user->save();
        return response()->json(['message' => 'Mật khẩu đã được cập nhật thành công']);
    }
}
