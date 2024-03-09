<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\Providers\Auth as ProvidersAuth;

class APIAuthController extends Controller
{
    public function dangNhap(Request $request)
    { 
        $credentials = $request->only(['email', 'password']);

        $user = KhachHang::where('email', $credentials['email'])->where('trang_thai', 1)->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['error' => 'Đăng nhập không thành công'], 401);
        }

        $token = auth('api')->login($user);

        return $this->respondWithToken($token);
    }

    public function logout()
    { 
        auth('api')->logout();
        return response()->json(['message' => 'Đăng xuất thành công!']);
    }
    public function me() 
    {
        
        return response()->json([auth('api')->user()]);
    }

    protected function respondWithToken($token)
    {
       
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>JWTAuth::factory()->getTTL()*60,
        ]);
    }
    public function sendEmail(Request $request){
        
        $khachHang = KhachHang::where('email', $request->email)->first();

        if (!$khachHang) {
            return response()->json([
                'access' => false,
                'message' => 'Email không tồn tại!',
            ]);
        }

        $numbers = range(0, 9);
        $randomPassword = '';
        for ($i = 0; $i < 6; $i++) {
            $randomPassword .= $numbers[mt_rand(0, 9)];
        }
        
        $khachHang->password = Hash::make($randomPassword);
        $khachHang->save(); 

      
        $data = [
            'name' => $khachHang->ho_ten,
            'password' => $randomPassword,
        ];

        Mail::send('email', $data, function($message) use ($khachHang) {
            $message->to($khachHang->email)->subject('Mật Khẩu Mới');
        });

        return response()->json([
            'access' => true,
            'message' => 'Email với mật khẩu mới đã được gửi!'
        ]);
    }
    
}
