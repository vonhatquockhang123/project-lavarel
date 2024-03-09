<?php

namespace App\Http\Controllers;

use App\Models\CTHoaDon;
use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\QuanTri;
use App\Models\SanPham;
use App\Models\CTSanPham;
use App\Models\DungLuong;
use App\Models\KhachHang;
use App\Models\MauSac;
use Exception;
use Illuminate\Support\Facades\Auth;

class HoaDonController extends Controller
{
    public function themMoi()
    {
        $dsSanPham=SanPham::whereHas('chi_tiet_san_pham',function($query){
                $query->where('so_luong','>',0);
        })->with('chi_tiet_san_pham')->get();
        
        $dsSanPham->each(function ($sanPham) {
            $sanPham->chi_tiet_san_pham = $sanPham->chi_tiet_san_pham->unique('san_pham_id');
        });
        $dsKhachHang=KhachHang::all();
        
        return view("hoa-don.them-moi",compact('dsSanPham','dsKhachHang'));
 
    }

    public function xuLyThemMoi(Request $request)
    {
        try
        {
       
        $hoaDon= new HoaDon();
        $hoaDon->khach_hang_id= $request->kh;
        $hoaDon->dien_thoai= $request->dien_thoai;
        $hoaDon->save();
        $tongTien=0;
        
        for($i=0;$i<count($request->spID);$i++)
        {
           $ctHoaDon =new CTHoaDon();
           $ctHoaDon->hoa_don_id=$hoaDon->id;
           $ctHoaDon->san_pham_id=$request->spID[$i];
           $ctHoaDon->mau_sac_id=$request->msID[$i];
           $ctHoaDon->dung_luong_id=$request->dlID[$i];
           $ctHoaDon->so_luong=$request->soLuong[$i];
 
           $ctSanPham = CTSanPham::where('san_pham_id', $request->spID[$i])
            ->where('mau_sac_id', $request->msID[$i])
            ->where('dung_luong_id', $request->dlID[$i])
            ->first();
            if(!empty($ctSanPham))
            {
                
                $ctSanPham->so_luong-=$ctHoaDon->so_luong;
                $ctSanPham->save();
            }
            
            
           $ctHoaDon->don_gia=$request->giaBan[$i];
           $ctHoaDon->thanh_tien=$request->thanhTien[$i];
           $ctHoaDon->save();
           
            $tongTien += $ctHoaDon->thanh_tien;
        }
        $hoaDon->tong_tien=$tongTien;
        $hoaDon->trang_thai=HoaDon::TRANG_THAI_HOAN_THANH;
        $hoaDon->save();
        return redirect()->route('hoa-don.danh-sach')->with(['thong_bao'=>"Nhập hóa đơn thành công!"]);
        }catch(Exception $ex)
        {
            $dsHoaDon = HoaDon::all();
            $dsnhanVien=QuanTri::all();
            $dsSanPham=SanPham::all();
            $dsKhachHang=KhachHang::all();
            return view("hoa-don.them-moi",compact('dsHoaDon','dsnhanVien','dsSanPham','dsKhachHang'));
        }
    }
    public function danhSach()
    { 
        $dsHoaDon = HoaDon::orderBy('trang_thai','asc')
                   ->orderBy('ngay_tao', 'desc')
                   ->paginate(10);
        return view("hoa-don.danh-sach", compact('dsHoaDon'));
    }
    public function chiTiet($id)
    {
        
        $dsCTHoaDon=CTHoaDon::where('hoa_don_id',$id)->get();
        
        
        if(empty($dsCTHoaDon))
        {
            return "Chi tiết hóa đơn không tồn tại";
        }
        return view("hoa-don.chi-tiet",compact('dsCTHoaDon'));
        
    }
    public function xoa($id)
    {

        $cTHoaDon=CTHoaDon::where('hoa_don_id',$id)->get();

        $hoaDon=HoaDon::find($id);
        if(empty($cTHoaDon))
        {
            return "Chi tiết hóa đơn không tồn tại";
        }
        $hoaDon->trang_thai=0;
        $hoaDon->save();
        $dsHoaDon=HoaDon::all();
        return redirect()->route('hoa-don.danh-sach',compact('dsHoaDon'))->with(['thong_bao'=>"Xóa hóa đơn thành công!"]);;
    } 
    public function timKiem(Request $request)
    {
        $reQuest=$request->search_name;

        $dsHoaDon = HoaDon::whereHas('khach_hang', function($query) use ($reQuest) {
            $query->where('ho_ten', 'like', '%' . $reQuest . '%');
        })->paginate(10);
        
        if ($dsHoaDon->isEmpty()) {
            $errorMessage = "Tên Khách hàng không tồn tại với từ khóa tìm kiếm: '$reQuest'";
            return view('hoa-don.danh-sach', compact('dsHoaDon', 'reQuest', 'errorMessage'));
        }
        return view('hoa-don.danh-sach',compact('dsHoaDon','reQuest'));
    }
    public function timKiemSdt(Request $request)
    {
        $reQuestSdt=$request->search_sdt;
        $dsHoaDon=HoaDon::where('dien_thoai','like','%'.$reQuestSdt.'%')->paginate(10);
        if ($dsHoaDon->isEmpty()) {
            $errorMessage = "số điện thoại Khách hàng không tồn tại với từ khóa tìm kiếm: '$reQuestSdt'";
            return view('hoa-don.danh-sach', compact('dsHoaDon', 'reQuestSdt', 'errorMessage'));
        }
        return view('hoa-don.danh-sach',compact('dsHoaDon','reQuestSdt'));
    } 
    public function layMauSacDungLuong(Request $request)
    {
        $dsSanPham = CTSanPham::where('san_pham_id',$request->productId)->get();
        return view('hoa-don.chi-tiet-hoa-don',compact('dsSanPham'));
    }
    public function daHuy($id)
    {
        $hoaDon = HoaDon::find($id);
        $hoaDon->trang_thai=HoaDon::TRANG_THAI_DA_HUY;
        $hoaDon->save();

        return redirect()->route('hoa-don.danh-sach')->with('don_hang', "Hóa đơn {$hoaDon->id} đã được hủy!");
    }
    public function duyetDon($id)
    {
        $hoaDon = HoaDon::find($id);
        if (!$hoaDon) {
            return redirect()->route('hoa-don.danh-sach')->with('error', "Hóa đơn không tồn tại.");
        }

        $cTHoaDon=CTHoaDon::where('hoa_don_id',$id)->get();

        if (!$cTHoaDon) {
            return redirect()->route('hoa-don.danh-sach')->with('error', "Chi tiết hóa đơn không tồn tại.");
        }

        
            foreach ($cTHoaDon as $item) {
                $cTSanPham = CTSanPham::where('san_pham_id', $item->san_pham_id)
                                    ->where('mau_sac_id', $item->mau_sac_id)
                                    ->where('dung_luong_id', $item->dung_luong_id)
                                    ->first();
                if (!$cTSanPham) {  
                    return redirect()->route('hoa-don.danh-sach')->with('error', "Chi tiết hóa đơn không tồn tại.");
                }
                $cTSanPham->so_luong -= $item->so_luong;
                $cTSanPham->save();
        }
        $hoaDon->trang_thai=HoaDon::TRANG_THAI_DA_DUYET;
        $hoaDon->save();
        return redirect()->route('hoa-don.danh-sach')->with('don_hang', "Hóa đơn {$hoaDon->id} đã được duyệt và chuyển sang trạng thái đang giao!");
    }
    public function dangGiao($id)
    {
        $hoaDon = HoaDon::find($id);
        $hoaDon->trang_thai=HoaDon::TRANG_THAI_DANG_GIAO;
        $hoaDon->save();
       
        return redirect()->route('hoa-don.danh-sach')->with('don_hang', "Hóa đơn {$hoaDon->id} đang được giao và chuyển sang trạng thái hoàn thành!");
    }
    public function hoanThanh($id)
    {
        $hoaDon = HoaDon::find($id);


        $hoaDon->trang_thai=HoaDon::TRANG_THAI_HOAN_THANH;

        $hoaDon->save();

        return redirect()->route('hoa-don.danh-sach')->with('don_hang', "Hóa đơn {$hoaDon->id} hoàn thành!");
    }


    

    
}
