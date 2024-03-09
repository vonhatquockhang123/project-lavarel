<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuanTri;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NhanVienRequest;
use LengthException;

class QuanTriController extends Controller
{
    public function themMoi()
    {
        return view("nhan-vien.them-moi");
    }
    public function xuLyThemMoi(NhanVienRequest $request)
    {
            
            $files = $request->file('hinh_anh');
            $quanTri=new QuanTri();
            if (isset($files)) {
                
                $path = $files->store('avt');
                $quanTri->avatar_url=$path;
                $quanTri->ho_ten           = $request->ho_ten;
                $quanTri->email            = $request->email;
                $quanTri->dien_thoai       = $request->dien_thoai;
                $quanTri->dia_chi          = $request->dia_chi;
                
                $quanTri->username   = $request->username;
                $quanTri->password   = Hash::make($request->mat_khau);
                $quanTri->save();
                return redirect()->route('nhan-vien.danh-sach')->with(['thong_bao'=>"Thêm nhân viên {$quanTri->ho_ten} thành công!"]);
            
            
            }
        return view('nhan-vien.them-moi');  
    }
    public function danhSach()
    {
        $dsQuanTri = QuanTri::all();
        return view("nhan-vien.danh-sach", compact('dsQuanTri'));
    }

    public function capNhat($id)
    {
        
        $quanTri = QuanTri::find($id);
        if (empty($quanTri)) {
            return "Loại sản phẩm không tồn tại";
        }
        return view('nhan-vien.cap-nhat', compact('quanTri'));
    }

    public function xuLyCapNhat(NhanVienRequest $request, $id)
    {
        $quanTri = QuanTri::find($id);
        if (empty($quanTri)) {
            return "Nhân viên không tồn tại";
        }
        $file                       = $request->hinh_anh;
        if(isset($file))
        {
            $paths                     = $file->store('avt');
            $quanTri->avatar_url       = $paths;
        }
        
            $quanTri->ho_ten           = $request->ho_ten;
            $quanTri->dien_thoai       = $request->dien_thoai;
            $quanTri->dia_chi          = $request->dia_chi;
            $quanTri->email            = $request->email;
            $quanTri->username         = $request->username;
            $quanTri->trang_thai = isset($request->trang_thai) ? 1 : 0;
            $quanTri->save();       
            return redirect()->route('nhan-vien.danh-sach')->with(['thong_bao'=>"Cập nhật nhân viên {$quanTri->ho_ten} thành công!"]);
        
        
        
    }
    public function xoa($id)
    {
        $quanTri = QuanTri::find($id);
        if (empty($quanTri)) {
            return "nhân viên không tồn tại";
        }
        $quanTri->trang_thai=0;
        $quanTri->save();
        return redirect()->route('nhan-vien.danh-sach')->with(['thong_bao'=>"Xóa nhân viên {$quanTri->ten} thành công!"]);
    }
    public function timKiem(Request $request)
    {
        $reQuest=$request->search_name;
        $dsQuanTri=QuanTri::where('ho_ten','like','%'.$reQuest.'%')->get();
        return view('nhan-vien.danh-sach',compact('dsQuanTri','reQuest'));
    }
}
