<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\Http\Requests\LoaiSanPhamRequest;
use App\Models\SanPham;
class LoaiSanPhamController extends Controller
{
    public function themMoi()
    {
        return view('loai-san-pham.them-moi');
    }

    public function xuLyThemMoi(LoaiSanPhamRequest $request)
    {
        $loaiSanPham = new LoaiSanPham();
        if($request->ten!=null)
        {
            $loaiSanPham->ten       = $request->ten;
            $loaiSanPham->save();
            return redirect()->route('loai-san-pham.danh-sach')->with(['thong_bao'=>"Thêm loại sản phẩm {$loaiSanPham->ten} thành công!"]);
        }
        return view('loai-san-pham.them-moi');
        
    }

    public function danhSach()
    {
        $dsLoaiSanPham=LoaiSanPham::paginate(10);
        return view("loai-san-pham.danh-sach", compact('dsLoaiSanPham'));
    }

    public function capNhat($id)
    {
        
        $loaiSanPham = LoaiSanPham::find($id);
        if (empty($loaiSanPham)) {
            return redirect()->route('loai-san-pham.danh-sach')->with(['thong_bao'=>"Loại sản phẩm không tồn tại!"]);
        }

        return view('loai-san-pham.cap-nhat', compact('loaiSanPham'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $loaiSanPham = LoaiSanPham::find($id);
        if (empty($loaiSanPham)) {
            return redirect()->route('loai-san-pham.danh-sach')->with(['thong_bao'=>"Loại sản phẩm không tồn tại!"]);
        }
        $loaiSanPham->ten = $request->ten;
        $loaiSanPham->save();
        return redirect()->route('loai-san-pham.danh-sach')->with(['thong_bao'=>"Cập nhật loại sản phẩm {$loaiSanPham->ten} thành công!"]);
    }

    public function xoa($id)
    {
        $sanPham=SanPham::where('loai_san_pham_id',$id)->first();
        $loaiSanPham = LoaiSanPham::find($id);
        if(!empty($sanPham))
        {
            return redirect()->route('loai-san-pham.danh-sach')->with(['error'=>"Loại sản phẩm {$loaiSanPham->ten} đã tồn tại trong bảng sản phẩm!"]);
        }
       
        if (empty($loaiSanPham)) {
            return redirect()->route('loai-san-pham.danh-sach')->with(['thong_bao'=>"Loại sản phẩm không tồn tại!"]);
        }
        $loaiSanPham->delete();
        return redirect()->route('loai-san-pham.danh-sach')->with(['thong_bao'=>"Xóa loại sản phẩm {$loaiSanPham->ten} thành công!"]);
    }
    public function thungRac()
    {
        $dsLoaiSanPham=LoaiSanPham::onlyTrashed()->get();
        return view('loai-san-pham.thung-rac',compact('dsLoaiSanPham'));
    }
    public function khoiPhuc($id)
    {
        $loaiSanPham=LoaiSanPham::withTrashed()->find($id);
        $loaiSanPham->restore();
        $dsLoaiSanPham=LoaiSanPham::onlyTrashed()->get();
        return redirect()->route('loai-san-pham.thung-rac',compact('dsLoaiSanPham'))->with(['thong_bao'=>"Phục hồi loại sản phẩm {$loaiSanPham->ten} thành công "]);
    }
    
    public function xoaVinhVien($id)
    {
        $loaiSanPham=LoaiSanPham::withTrashed()->find($id);
        $loaiSanPham->forceDelete();
        $dsLoaiSanPham=LoaiSanPham::onlyTrashed()->get();
        return view('loai-san-pham.thung-rac',compact('dsLoaiSanPham'))->with(['thong_bao'=>"Xóa vĩnh viễn loại sản phẩm {$loaiSanPham->ten} thành công "]);
    }
    public function timKiem(Request $request)
    {
        $reQuest=$request->search_name;
        $dsLoaiSanPham=LoaiSanPham::where('ten','like','%'.$reQuest.'%')->paginate(10);
        if ($dsLoaiSanPham->isEmpty()) {
            $errorMessage = "Tên loại sản phẩm không tồn tại với từ khóa tìm kiếm: '$reQuest'";
            return view('loai-san-pham.danh-sach', compact('dsLoaiSanPham', 'reQuest', 'errorMessage'));
        }
        return view('loai-san-pham.danh-sach',compact('dsLoaiSanPham','reQuest'));
    }
}
