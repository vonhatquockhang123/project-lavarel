<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HinhAnh;
use App\Http\Requests\SanPhamRequest;
use App\Models\CTSanPham;
use App\Models\tTSanPham;
use App\Models\DungLuong;
use App\Models\MauSac;
use App\Models\Logo;
use App\Models\ThongTinSanPham;

class SanPhamController extends Controller
{
    public function themMoi()
    {
        $dsLoaiSanPham=LoaiSanPham::all();
        return view('san-pham.them-moi',compact('dsLoaiSanPham'));
    }

    public function xuLyThemMoi(SanPhamRequest $request)
    {
        
        $files=$request->hinh_anh;
        $paths=[];
        
        foreach($files as $file)
        {
            if ($file->isValid() && in_array($file->getClientOriginalExtension(), ['jpg', 'png', 'jpeg'])) {
                // Kiểm tra kích thước của từng tệp tin
                $maxSize = 10240; // 10MB
                if ($file->getSize() <= $maxSize * 1024) { // Chuyển đổi sang byte
                    $paths[] = $file->store('uploads');
                } else {
                    // Kích thước hình ảnh quá lớn
                    return redirect()->back()->with(['error'=>"Kích thước hình ảnh quá lớn. Vui lòng chọn hình ảnh nhỏ hơn 10MB."]);
                }
            } else {
                // Tệp không phải là hình ảnh
                return redirect()->back()->with(['error'=>"Tệp không phải là hình ảnh jpg, png, hoặc jpeg."]);
            }
           
        }     
        $sanPham = new SanPham();
        $sanPham->ten               = $request->ten;
        $sanPham->mo_ta             = $request->mo_ta;
        $sanPham->loai_san_pham_id  = $request->loai_san_pham;
        $sanPham->save();

        $tTSanPham=new ThongTinSanPham();
        $tTSanPham->san_pham_id=$sanPham->id;
        $tTSanPham->do_phan_giai=$request->do_phan_giai;
        $tTSanPham->trong_luong=$request->trong_luong;
        $tTSanPham->man_hinh=$request->man_hinh;
        $tTSanPham->he_dieu_hanh=$request->he_dieu_hanh;
        $tTSanPham->ram=$request->ram;
        $tTSanPham->camera=$request->camera;
        $tTSanPham->pin=$request->pin;
        $tTSanPham->kich_thuoc = $request->kich_thuoc;
        $tTSanPham->save();

        
        for($i=0;$i<count($paths);$i++)
        {
            $hinhAnh=new HinhAnh();
            $hinhAnh->san_pham_id=$sanPham->id;
            $hinhAnh->img_url=$paths[$i];
            $hinhAnh->save();
        }
        
        return redirect()->route('san-pham.danh-sach')->with(['thong_bao'=>"Thêm sản phẩm {$sanPham->ten} thành công!"]);
    }
    
    public function danhSach()
    {
        $dsSanPham=SanPham::paginate(10);
        return view("san-pham.danh-sach", compact('dsSanPham'));
    }

    public function capNhat($id)
    {
        $dsLoaiSanPham=LoaiSanPham::all();
        $sanPham = SanPham::find($id);
        $dsHinhAnh=HinhAnh::where('san_pham_id',$id)->get();
        $tTSanPham=ThongTinSanPham::where('san_pham_id',$id)->first();
        if (empty($sanPham)) {
            return "Sản phẩm không tồn tại";
        }
        return view('san-pham.cap-nhat', compact('sanPham', 'dsLoaiSanPham','dsHinhAnh','tTSanPham'));
    }
    public function xuLyCapNhat(SanPhamRequest $request, $id)
    {
        $sanPham = SanPham::find($id);
        if(!$sanPham){
            $dsSanPham=SanPham::all();
           return view('san-pham.danh-sach',compact('dsSanPham'))->with(["thong_bao"=>"Sản phẩm không tồn tại!"]);
        }
        $files=$request->hinh_anh;
        $sanPham->ten               = $request->ten;
        $sanPham->mo_ta             = $request->mo_ta;
        $sanPham->loai_san_pham_id  = $request->loai_san_pham;
        $sanPham->save();

        $tTSanPham=ThongTinSanPham::where('san_pham_id',$id)->first();
        $tTSanPham->san_pham_id=$sanPham->id;
        $tTSanPham->do_phan_giai=$request->do_phan_giai;
        $tTSanPham->trong_luong=$request->trong_luong;
        $tTSanPham->man_hinh=$request->man_hinh;
        $tTSanPham->he_dieu_hanh=$request->he_dieu_hanh;
        $tTSanPham->ram=$request->ram;
        $tTSanPham->camera=$request->camera;
        $tTSanPham->pin=$request->pin;
        $tTSanPham->kich_thuoc = $request->kich_thuoc;
        $tTSanPham->save();

        if(!empty($files))
        {
            $paths=[];
            
            foreach($files as $file)
            {
                if ($file->isValid() && in_array($file->getClientOriginalExtension(), ['jpg', 'png', 'jpeg'])) {
                    // Kiểm tra kích thước của từng tệp tin
                    $maxSize = 10240; // 10MB
                    if ($file->getSize() <= $maxSize * 1024) { // Chuyển đổi sang byte
                        $paths[] = $file->store('uploads');
                    } else {
                        // Kích thước hình ảnh quá lớn
                        return redirect()->back()->with(['error'=>"Kích thước hình ảnh quá lớn. Vui lòng chọn hình ảnh nhỏ hơn 10MB."]);
                    }
                } else {
                    // Tệp không phải là hình ảnh
                    return redirect()->back()->with(['error'=>"Tệp không phải là hình ảnh jpg, png, hoặc jpeg."]);
                }
            
            }
           
            for($i=0;$i<count($paths);$i++)
            {
                $hinhAnh=new HinhAnh();
                $hinhAnh->san_pham_id=$id;
                $hinhAnh->img_url=$paths[$i];
                $hinhAnh->save();
            }
        }  
        return redirect()->route('san-pham.danh-sach')->with(['thong_bao'=>"Cập nhật sản phẩm {$sanPham->ten} thành công!"]);
    }

    public function xoa($id)
    {
        $sanPham = SanPham::find($id);
        if (empty($sanPham)) {
            return "Sản phẩm không tồn tại";
        }
        
        $sanPham->delete();
        return redirect()->route('san-pham.danh-sach')->with(['thong_bao'=>"Xóa sản phẩm {$sanPham->ten} thành công!"]);
    }
    public function thungRac()
    {
        $dsSanPham=SanPham::onlyTrashed()->get();
        return view('san-pham.thung-rac',compact('dsSanPham'));
    }
    public function khoiPhuc($id)
    {
        $sanPham=SanPham::withTrashed()->find($id);
        $sanPham->restore();
        $dsSanPham=SanPham::onlyTrashed()->get();
        return redirect()->route('san-pham.thung-rac',compact('dsSanPham'))->with(['thong_bao'=>"Phục hồi sản phẩm {$sanPham->ten} thành công "]);
    }
    
    public function xoaVinhVien($id)
    {
        $sanPham=SanPham::withTrashed()->find($id);
        $sanPham->forceDelete();
        return view('san-pham.thung-rac',compact('dsSanPham'))->with(['thong_bao'=>"Xóa vĩnh viễn sản phẩm {$sanPham->ten} thành công "]);
    }
    public function chiTietSanPham($id)
    {
        $sanPham=SanPham::find($id);
        $tTSanPham=ThongTinSanPham::where('san_pham_id',$id)->first();
        $dsHinhAnh=HinhAnh::where('san_pham_id',$id)->get();
        $dsCTSanPham=CTSanPham::where('san_pham_id',$id)->get();
        return view('san-pham.chi-tiet', compact('sanPham', 'tTSanPham', 'dsHinhAnh','dsCTSanPham'));
    }
    public function timKiem(Request $request)
    {
        $reQuest=$request->search_name;
        $dsSanPham=SanPham::where('ten','like','%'.$reQuest.'%')->paginate(10);
        if ($dsSanPham->isEmpty()) {
            $errorMessage = "Tên sản phẩm không tồn tại với từ khóa tìm kiếm: '$reQuest'";
            return view('san-pham.danh-sach', compact('dsSanPham', 'reQuest', 'errorMessage'));
        }
       
        return view('san-pham.danh-sach',compact('dsSanPham','reQuest'));
    }
}
