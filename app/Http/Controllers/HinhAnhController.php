<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\HinhAnh;
use App\Models\LoaiSanPham;
use App\Models\ThongTinSanPham;

class HinhAnhController extends Controller
{
    
    public function hinhAnhXoa($spid,$id)
    {
        $sanPham=SanPham::find($spid);
        $hinhAnh=HinhAnh::find($id);
        if(empty($sanPham) || empty($hinhAnh) || $hinhAnh->san_pham_id != $sanPham->id){
            return redirect()->route("san-pham.cap-nhat", ['id' => $spid])->with(['thong_bao' => "Ảnh không tồn tại hoặc không thuộc về sản phẩm này!"]);
        }
        if(!empty($hinhAnh->img_url))
        {
            $imgPath=$hinhAnh->img_url;
            if (file_exists(public_path($imgPath))) {
            unlink(public_path($imgPath));
            $hinhAnh->delete();
            }
        }
        
        return redirect()->route("san-pham.cap-nhat", ['id' => $spid])->with(['thong_bao'=>"Xóa ảnh thành công!"]);
    
    }
    
}
