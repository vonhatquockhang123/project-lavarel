<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BinhLuan;
use App\Models\CTBinhLuan;
use Illuminate\Support\Facades\Auth;

class BinhLuanController extends Controller
{
    public function danhSach(){
        $dsBinhLuan=BinhLuan::orderBy('created_at','desc')->paginate(2);
        return view("binh-luan.danh-sach" , compact('dsBinhLuan'));
    }

    public function traLoiBinhLuan(Request $request,$id){
        $request->validate([
        'binh_luan' => 'required|string|between:10,70',
            ], [
                'binh_luan.required' => 'Nội dung bình luận không được để trống.',
                'binh_luan.string' => 'Nội dung bình luận phải là chuỗi.',
                'binh_luan.between' => 'Nội dung bình luận phải từ 10 đến 70 ký tự.',
            ]);

            $binhLuan=BinhLuan::find($id);

            if (empty($binhLuan)) {
                return "Bình luận không tồn tại";
            }
            $cTBL=CTBinhLuan::where('binh_luan_id',$id)->count();
            
            if ($cTBL>0){
                return response()->json(['error' => 'Đã trả lời bình luận']);
            }
            $ctBinhLuan = new CTBinhLuan();
            $ctBinhLuan->binh_luan_id=$id;
            $ctBinhLuan->quan_tri_id=Auth::user()->id;
            $ctBinhLuan->noi_dung=$request->binh_luan;
            $ctBinhLuan->save();

            return response()->json(['success' => 'Bình luận đã được trả lời']);
    }
    
    public function xoa($id){
        $binhLuan=Binhluan::find($id);
        if(empty($binhLuan))
        {
            return "Bình luận không tồn tại";
        }
        $binhLuan->delete();
        $dsBinhLuan=BinhLuan::all();
        return redirect()->route('binh-luan.danh-sach',compact('dsBinhLuan'))->with(['thong_bao'=>"Xóa bình luận {$binhLuan->noi_dung} thành công!"]);;

    }
    
}
