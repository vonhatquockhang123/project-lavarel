<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use App\Models\CTBinhLuan;
use App\Models\DanhGia;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class APISanPhamController extends Controller
{
    public function layDanhSach()
    {
        
        $dsSanPham = SanPham::with([
            'loai_san_pham',
            'img',
            'chi_tiet_san_pham' => function ($query) {
                $query->with('mau_sac','dung_luong');
            }
        ])->get();
        
        
        return response()->json([
            'success' =>true,
            'data'=>$dsSanPham
        ]);
    }
    public function layChiTiet($id)
    {
        try{
            $sanPham = SanPham::with([
                'thong_tin_san_pham',
                'danh_gia',
                'binh_luan.khach_hang'=>function($query){
                    $query->select('id','ho_ten');
                },
                'binh_luan.chi_tiet_binh_luan.quan_tri'=>function($query){
                    $query->select('id','ho_ten');
                },
                'loai_san_pham', 
                'img', 
                'chi_tiet_san_pham' => function($query) {
                    $query->with(['mau_sac', 'dung_luong']);
                }
            ])->findOrFail($id);
        if(empty($sanPham))
        {
            return response()->json([
                'success' =>false,
                'message'=>"Sản phẩm ID {$id} không tồn tại"
            ]);
        }
        return response()->json([
            'success' =>true,
            'data'=>$sanPham
        ]);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'success' => false,
                'message' => "Sản phẩm ID {$id} không tồn tại"
            ]);
        }
    }
    
    public function timKiem(Request $request )
    {
        $sanPham=SanPham::with('loai_san_pham')->where('ten',$request->ten)->first();
        if(empty($sanPham))
        {
            return response()->json([
                'success'=>false,
                'message'=>"Sản phẩm tên {$request->ten} không tồn tại"
            ]); 
        }
        return response()->json([
            'success'=>true,
            'data'=>$sanPham
        ]);
    } 
    public function timKiemTen($searchTerm)
    {
        $ten=$searchTerm;
        $sanPham = SanPham::with([
            'loai_san_pham',
            'img',
            'chi_tiet_san_pham' => function ($query) {
                $query->with('mau_sac', 'dung_luong');
            }
        ])->where('ten', 'like', $ten . '%')->get();
        if($sanPham->isEmpty())
        {
            return response()->json([
                'success'=>false,
                'message'=>"Sản phẩm không tồn tại"
            ]); 
        }
        return response()->json([
            'success'=>true,
            'data'=>$sanPham
        ]);
    }
    public function danhGia(Request $request){
        $request->validate([
            'khach_hang_id' => 'required|numeric',
            'san_pham_id' => 'required|numeric',
            'so_sao' => 'required|numeric|between:1,5',
        ],[
            'khach_hang_id.required' => 'ID khách hàng là bắt buộc.',
            'khach_hang_id.numeric' => 'ID khách hàng phải là một số.',
            'san_pham_id.required' => 'ID sản phẩm là bắt buộc.',
            'san_pham_id.numeric' => 'ID sản phẩm phải là một số.',
            'so_sao.required' => 'Số sao là bắt buộc.',
            'so_sao.numeric' => 'Nội dung bình luận là bắt buộc.',
            'so_sao.between' => 'Số sao phải từ :between',
        ]);
        
        $danhGia=new DanhGia();
        $danhGia->khach_hang_id=$request->khach_hang_id;
        $danhGia->san_pham_id=$request->san_pham_id;
        $danhGia->so_sao=$request->so_sao;
        $danhGia->save();

        return response()->json([
            'success'=>true,
            'message'=>"Đánh giá thành công!"
        ]);
    }
    public function binhLuan(Request $request){

        $request->validate([
            'khach_hang_id' => 'required|numeric',
            'san_pham_id' => 'required|numeric',
            'noi_dung' => 'required|string|',
        ], [
            'khach_hang_id.required' => 'ID khách hàng là bắt buộc.',
            'khach_hang_id.numeric' => 'ID khách hàng phải là một số.',
            'san_pham_id.required' => 'ID sản phẩm là bắt buộc.',
            'san_pham_id.numeric' => 'ID sản phẩm phải là một số.',
            'noi_dung.required' => 'Nội dung bình luận là bắt buộc.',
            'noi_dung.string' => 'Nội dung bình luận phải là một chuỗi ký tự.',
        ]);
            $binhLuan=new BinhLuan();
            $binhLuan->khach_hang_id=$request->khach_hang_id;
            $binhLuan->san_pham_id=$request->san_pham_id;
            $binhLuan->noi_dung=$request->noi_dung;
            $binhLuan->save();
        return response()->json([
            'success'=>true,
            'message'=>"Bình luận thành công!"
        ]);

    }
    
}
