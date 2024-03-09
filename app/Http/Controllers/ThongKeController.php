<?php

namespace App\Http\Controllers;

use App\Models\CTHoaDon;
use App\Models\CTSanPham;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\PhieuNhap;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ThongKeController extends Controller
{
    public function danhSach()
    {
        $hoaDon=HoaDon::where('trang_thai',4)->count();
        $huyHoaDon=HoaDon::where('trang_thai',5)->count();
        $tongTien = HoaDon::where('trang_thai',4)->sum('tong_tien');
        $tongTienHoaDon = number_format($tongTien, 0, ',', '.');

        $khachHang=KhachHang::count();

        $soLuongSanPham=CTSanPham::sum('so_luong');
        
        $tongGiaNhap=PhieuNhap::sum('tong_tien');
        $tongTienGiaNhap = number_format($tongGiaNhap, 0, ',', '.');

        $sanPhamBanChay = CTHoaDon::select('san_pham_id', DB::raw('SUM(so_luong) as tong_so_luong'))
        ->groupBy('san_pham_id')
        ->orderByDesc('tong_so_luong')
        ->take(3)
        ->get();
        
        return view('thong-ke',compact('huyHoaDon','hoaDon','khachHang','soLuongSanPham','tongTienGiaNhap','tongTienHoaDon','sanPhamBanChay'));
    }
    public function ThongKeHoaDon(Request $request){

        try {
            $Month = $request->month;
            $Year = $request->year;
    
            // Chỉ lấy dữ liệu nếu cả hai tham số tháng và năm đều được cung cấp
            if ($Month && $Year) {
                $data = DB::table('hoa_don')
                ->join('chi_tiet_hoa_don', 'hoa_don.id', '=', 'chi_tiet_hoa_don.hoa_don_id')
                ->whereYear('hoa_don.created_at', $Year)
                ->whereMonth('hoa_don.created_at', $Month)
                ->where('hoa_don.trang_thai', 4)
                ->select(
                    DB::raw('DATE(hoa_don.created_at) as date'),
                    DB::raw('COUNT(DISTINCT hoa_don.id) as count'),
                    DB::raw('SUM(chi_tiet_hoa_don.thanh_tien) as tongtien'),
                    DB::raw('SUM(chi_tiet_hoa_don.so_luong) as soluong')
                )
                ->groupBy('date')
                ->get();

                
            } else {
                // Nếu không có tham số, trả về dữ liệu rỗng hoặc thông báo lỗi
                $data = [];
            }
    
           
    
            // Trả về JSON response sau khi kiểm tra request
            return response()->json($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Lỗi máy chủ'], 500);
        }
    }
}
