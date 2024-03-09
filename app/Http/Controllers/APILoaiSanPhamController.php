<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\Models\HinhAnh;
class APILoaiSanPhamController extends Controller
{
    public function layDanhSach()
    {
        $dsLoaiSanPham = LoaiSanPham::with([
            'san_pham' => function ($query) {
                $query->whereHas('chi_tiet_san_pham', function ($subquery) {
                    $subquery->where('so_luong', '>', 0); // Filter products with quantity > 0
                });
            },
            'san_pham.img',
            'san_pham.chi_tiet_san_pham' => function ($query) {
                $query->where('so_luong', '>', 0); // Filter product details with quantity > 0
            },
            'san_pham.chi_tiet_san_pham.mau_sac',
            'san_pham.chi_tiet_san_pham.dung_luong',
        ])->get();
        

        return response()->json([ 
            'success' =>true,
            'data'=>$dsLoaiSanPham
        ]);
        
    } 
    public function layChiTiet($id)
    {
        $loaiSanPham = LoaiSanPham::with([
            'san_pham' => function ($query) {
                $query->whereHas('chi_tiet_san_pham', function ($subquery) {
                    $subquery->where('so_luong', '>', 0); 
                });
            },
            'san_pham.img',
            'san_pham.chi_tiet_san_pham' => function ($query) {
                $query->where('so_luong', '>', 0); 
            },
            'san_pham.chi_tiet_san_pham.mau_sac',
            'san_pham.chi_tiet_san_pham.dung_luong',
        ])->find($id);
        
        if(empty($loaiSanPham))
        {
            return response()->json([
                'success' =>false,
                'message'=>"Loại sản phẩm ID {$id} không tồn tại"
            ]);
        }
        return response()->json([
            'success' =>true,
            'data'=>$loaiSanPham
        ]);
    }
    public function themMoi(Request $request)
    {
        $loaiSanPham=new LoaiSanPham();
        $count=LoaiSanPham::where('ten',$request->ten)->count();
        if($count>0)
        {
            return response()->json([
                'success'=>true,
                'message'=>"Tên loại sản phẩm {$request->ten} đã tồn tại"
            ]);
        }

        $loaiSanPham->ten=$request->ten;
        $loaiSanPham->save();
        return response()->json([
            'success'=>true,
            'message'=>"Thêm mới loại sản phẩm tên {$loaiSanPham->ten} thành công"
        ]);
    }
    public function capNhap(Request $request, $id)
    {
        $loaiSanPham =LoaiSanPham::find($id);
        if(empty($loaiSanPham))
        {
            return response()->json([
                'success'=>false,
                'message'=>"Loại sản phẩm ID {$id} không tồn tại"
            ]);
        }
        $count= LoaiSanPham::where('id', '<>', $id)->where('ten',$request->ten)->count();
        if($count>0)
        {
            return response()->json([
                'success'=>false,
                'message'=>'Tên loại sản phẩm đã tồn tại'
            ]);
        }
        if(empty($request->ten)){
            $loaiSanPham->trang_thai=$request->trang_thai;
            $loaiSanPham->save();
            return response()->json([
                'success'=>true,
                'message'=>"Cập nhật loại sản phẩm ID {$id} thành công"
            ]);
        } 
        $loaiSanPham->ten=$request->ten;
        $loaiSanPham->save();
        return response()->json([
            'success'=>true,
            'message'=>"Cập nhật loại sản phẩm ID {$id} thành công"
        ]);
    }
    public function xoa($id)
    {
        $loaiSanPham= LoaiSanPham::find($id);
        
        if(empty($loaiSanPham))
        {
            return response()->json([
                'success'=>false,
                'message'=>"Loại sản phẩm ID {$id} không tồn tại"
            ]);
        }
        $loaiSanPham->trang_thai=0;
        $loaiSanPham->save();
        return response()->json([
            'success'=>true,
            'message'=>"Xóa loại sản phẩm ID {$id} thành công"
        ]);
    }
    public function timKiem(Request $request)
    {
        $loaiSanPham= LoaiSanPham::with('san_pham')->where('ten',$request->ten)->first();
        if(empty($loaiSanPham))
        {
            return response()->json([
                'success'=>false,
                'message'=>"Loại sản phẩm Tên {$request->ten} không tồn tại"
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$loaiSanPham
        ]);
    }
}
