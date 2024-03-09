<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MauSac;
use App\Models\SanPham;
use App\Models\DungLuong;
use App\Http\Requests\DungLuongRequest;
use App\Http\Requests\MauSacRequest;
class DungLuongMauSacController extends Controller
{
    
    public function danhSach(){
        
        return view("mau-dung-luong.danh-sach");
    }
    public function themMoi(){
        $dsSanPham = SanPham::all();
        return view("mau-dung-luong.them-moi",compact('dsSanPham'));
    }
    public function themMoiMauAjax(MauSacRequest $request){          
            $mauSac             = new MauSac();   
            $mauSac->ten        = $request->mau_sac;
            $mauSac->save();       
        return redirect()->route('mau-dung-luong.danh-sach');
        
    }
    public function themMoiDungLuongAjax(DungLuongRequest $request){     
        $dungLuong              = new DungLuong();
        $dungLuong->ten         = $request->dung_luong;
        $dungLuong->save();   
        return redirect()->route('mau-dung-luong.danh-sach');
    
}
    
    public function danhSachMauSacAjax(){
       
        $dsMauSac = MauSac::all(); 
        return view("mau-dung-luong.danh-sach-mau-ajax",compact('dsMauSac'));
    }
    public function danhSachDungLuongSacAjax(){
       
        $dsDungLuong = DungLuong::all(); 
        return view("mau-dung-luong.danh-sach-dung-luong-ajax",compact('dsDungLuong'));
    }
    public function dungLuongXoa($id){
        $dungLuong= DungLuong::find($id);
        $dungLuong->delete();
        return redirect()->route('mau-dung-luong.danh-sach')->with(['thong_bao'=>"Xóa dung lượng {$dungLuong->ten} thành công"]);
    }
    public function mauSacXoa($id){
        $mauSac=MauSac::find($id);
        $mauSac->delete();
        return redirect()->route('mau-dung-luong.danh-sach')->with(['thong_bao'=>"Xóa màu {$mauSac->ten} thành công"]);
    }
}
