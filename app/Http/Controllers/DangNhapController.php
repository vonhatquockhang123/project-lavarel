<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NhanVien;
use App\Models\QuanTri;
use App\Models\Logo;
use App\Http\Requests\ThongTinTaiKhoanRequest;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use function Laravel\Prompts\error;

class DangNhapController extends Controller
{
    public function dangNhap()
    {
        $loGo = Logo::first();

    // Kiểm tra nếu tồn tại logo
        // Truyền thông tin logo đến view 'dang-nhap'
        return view('dang-nhap', compact('loGo'));
    
    }
    public function xuLyDangNhap(Request $rq)
    {
        
        $user = QuanTri::whereRaw('BINARY username = ?', [$rq->ten_dang_nhap])->first();

        if ($user && Hash::check($rq->password, $user->password) && $user->trang_thai) {
            Auth::login($user, $rq->has('remember'));

            return redirect()->route('thong-ke')->with(['dang_nhap' => 'Đăng nhập thành công!']);
        }
        if(empty($user))
        {
            return redirect()->route('dang-nhap')->with(['user_name'=>$rq->ten_dang_nhap,'error-login' => 'Mật khẩu không chính xác!','empty_username'=>"Tên tài khoản không tồn tại!"]);  
        }
        return redirect()->route('dang-nhap')->with(['user_name'=>$rq->ten_dang_nhap,'error-login' => 'Mật khẩu không chính xác!']);     
    }
    public function dangXuat()
    {
        Auth::logout();
        return redirect()->route('dang-nhap');
    }
    public function thongTin()
    {
        if(Auth::check())
        { 
            return view('thong-tin');
        } 
        return view('dang-nhap');
    }
    public function capNhatThongTin(ThongTinTaiKhoanRequest $request)
    {
        
        $nhanVien=QuanTri::find(Auth::user()->id);
        if(isset($request->avatar))
        { 
            $file=$request->avatar;
            $path=$file->store('avt');
            $nhanVien->avatar_url=$path;
        }
        $nhanVien->username=$request->username;
        $nhanVien->ho_ten=$request->ho_ten;
        $nhanVien->email=$request->email;
        $nhanVien->dien_thoai=$request->dien_thoai;
        $nhanVien->dia_chi=$request->dia_chi;
        $nhanVien->save();
        return redirect()->route('thong-tin')->with(['thong_bao'=>"Cập nhật thông tin thành công!"]);

    }
    public function DoiMatKhau(){
        return view("admin.doi-mat-khau");
    }
    public function xlDoiMatKhau(Request $rq){
        if (!Hash::check($rq->password, Auth::user()->password)) {
            return redirect()->route("doi-mat-khau")->with(['error' => 'Mật khẩu cũ không đúng!']);
        }
        $taiKhoan=QuanTri::find(Auth::user()->id);
        $taiKhoan->password=Hash::make($rq->respassword);
        $taiKhoan->save();
        return redirect()->route('thong-tin')->with(['thong_bao'=>"Thay đổi mật khẩu thành công!"]);
    }
    public function quenMatKhau(){
        return view("admin.quen-mat-khau");
    }
    public function xuLyQuenMatKhau(Request $request){
        $request->validate([
            'email'=>'required|exists:quan_tri'
        ],[
            'email.required'=> "Vui lòng nhập email hợp lệ!",
            'email.exists'=> "Email này không tồn tại trong hệ thống!",
        ]);
        $token= strtoupper(Str::random(20));
        $quanLy= QuanTri::where('email', $request->email)->first();
        $quanLy->update(['token'=>$token]);
        
       
            Mail::send('email',compact('quanLy'), function($email) use($quanLy){
                    $email->subject('HDK - lấy lại mật khẩu tài khoản');
                    $email->to($quanLy->email, $quanLy->ho_ten);
            });
    
    
            return redirect()->back()->with('thong_bao','Vui lòng check email để thực hiện đổi mật khẩu!');
    }

}