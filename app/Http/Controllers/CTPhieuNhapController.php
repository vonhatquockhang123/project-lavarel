<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhieuNhap;
use App\Models\CTPhieuNhap;
use App\Models\CTSanPham;
use App\Models\DungLuong;
use App\Models\MauSac;
use App\Models\NhaCungCap;
use App\Models\QuanTri;
use App\Models\SanPham;
use App\Http\Requests\NhapHangRequest;
use Exception;

class CTPhieuNhapController extends Controller
{
    public function themMoi()
    {
        $dsNhaCungCap = NhaCungCap::all();
        $dsSanPham=SanPham::all();
        $dsQuanTri=QuanTri::all();
        $dsMauSac=MauSac::all();
        $dsDungLuong=DungLuong::all();
        return view("nhap-hang.them-moi",compact('dsNhaCungCap','dsSanPham','dsQuanTri','dsMauSac','dsDungLuong'));
 
    }

    public function xuLyThemMoi(Request $request)
    {
        try
        {
        $phieuNhap= new PhieuNhap();
        $phieuNhap->nha_cung_cap_id=$request->ncc;
        $phieuNhap->save();
        $tongTien=0;
        for($i=0;$i<count($request->idSP);$i++)
        {
            $ctPhieuNhap= new CTPhieuNhap();
            $ctPhieuNhap->phieu_nhap_id         = $phieuNhap->id;
            $ctPhieuNhap->san_pham_id          = $request->idSP[$i];
            $ctSanPham=CTSanPham::where('san_pham_id',$request->idSP[$i])->where('mau_sac_id',$request->idMauSac[$i])->where('dung_luong_id',$request->idDungLuong[$i])->get();
            if(count($ctSanPham)>0){
                $ctSanPham=CTSanPham::where('san_pham_id',$request->idSP[$i])->where('mau_sac_id',$request->idMauSac[$i])->where('dung_luong_id',$request->idDungLuong[$i])->first();
                $ctSanPham->gia_ban=$request->giaBan[$i];
                $ctSanPham->so_luong+=$request->soLuong[$i];
                $ctSanPham->save();
            }
            else{
                $ctSanPham=new CTSanPham();
                $ctSanPham->san_pham_id=$request->idSP[$i];
                $ctSanPham->mau_sac_id=$request->idMauSac[$i];
                $ctSanPham->dung_luong_id=$request->idDungLuong[$i];
                $ctSanPham->gia_ban=$request->giaBan[$i];
                $ctSanPham->so_luong=$request->soLuong[$i];
                $ctSanPham->save();
            }
            
            $ctPhieuNhap->phieu_nhap_id      = $phieuNhap->id;
            $ctPhieuNhap->so_luong           = $request->soLuong[$i];
            $ctPhieuNhap->gia_nhap           = $request->giaNhap[$i];
            $ctPhieuNhap->mau_sac_id         = $request->idMauSac[$i];
            $ctPhieuNhap->dung_luong_id      = $request->idDungLuong[$i];
            $ctPhieuNhap->gia_ban            = $request->giaBan[$i];
            $ctPhieuNhap->thanh_tien         = $request->thanhTien[$i];
            $ctPhieuNhap->save();
            
            $tongTien += $ctPhieuNhap->thanh_tien;

        }
        $phieuNhap->tong_tien=$tongTien;
        $phieuNhap->save();
        return redirect()->route('nhap-hang.danh-sach')->with(['thong_bao'=>"Nhập đơn hàng {$phieuNhap->id} thành công!"]);
        }catch(Exception $ex)
        {
            $dsNhaCungCap = NhaCungCap::all();
            $dsSanPham=SanPham::all();
            $dsnhanVien=QuanTri::all();
            $dsMauSac=MauSac::all();
            $dsDungLuong=DungLuong::all();
            return view("nhap-hang.them-moi",compact('dsNhaCungCap','dsSanPham','dsnhanVien','dsMauSac', 'dsDungLuong'));
        }
    } 
    public function danhSach()
    {
        $dsPhieuNhap=PhieuNhap::all();
        return view("nhap-hang.danh-sach", compact("dsPhieuNhap"));
    }
    public function chiTiet($id)
    {
        $dsCTPhieuNhap=CTPhieuNhap::where("phieu_nhap_id",$id)->get();
        return view("nhap-hang.chi-tiet",compact("dsCTPhieuNhap"));
    }
    public function xoa($id)
    {
        $phieuNhap=PhieuNhap::find($id);
        $phieuNhap->trang_thai=0;
        $phieuNhap->save();
        $dsPhieuNhap=PhieuNhap::all();
        return redirect()->route("nhap-hang.danh-sach", compact("dsPhieuNhap"))->with(['thong_bao'=>"Xóa phiếu nhập {$phieuNhap->ten} thành công!"]);
    }

    
}
