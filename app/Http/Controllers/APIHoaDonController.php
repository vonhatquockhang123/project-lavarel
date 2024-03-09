<?php

namespace App\Http\Controllers;

use App\Models\CTHoaDon;
use App\Models\HoaDon;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;

class APIHoaDonController extends Controller
{
    public function themHoaDon(Request $request)
    {
        
        
        if(empty($request->hd[0]))
        {
            return response()->json([
                'success'=>false,
                'message'=>"Thanh toán không thành công!"
            ]);
        }
        $hoaDon=new HoaDon();
        $hoaDon->khach_hang_id=$request->hd[0]['khach_hang_id'];
        $hoaDon->tong_tien=$request->hd[0]['tong_tien'];
        $hoaDon->dia_chi=$request->hd[0]['dia_chi'];
        $hoaDon->dien_thoai=$request->hd[0]['dien_thoai'];
        $hoaDon->phuong_thuc_tt=$request->hd[0]['phuong_thuc_tt'];   
        $hoaDon->save();
        for($i=0;$i<count($request->cthd);$i++)
        {
            $cTHoaDon=new CTHoaDon();
            $cTHoaDon->hoa_don_id=$hoaDon->id;
            $cTHoaDon->san_pham_id=$request->cthd[$i]['san_pham_id'];
            $cTHoaDon->mau_sac_id=$request->cthd[$i]['mau_sac_id'];
            $cTHoaDon->dung_luong_id=$request->cthd[$i]['dung_luong_id'];
            $cTHoaDon->so_luong=$request->cthd[$i]['so_luong'];
            $cTHoaDon->don_gia=$request->cthd[$i]['gia_ban'];
            $cTHoaDon->thanh_tien=$request->cthd[$i]['thanh_tien'];
            $cTHoaDon->save();
        }
        
            return response()->json([
                "success"=>true,
                "message"=>"Thanh toán thành công!",
                "orderId" => $hoaDon->id,
            ]);
        
    }
    public function huyDon(Request $request){
        $hoaDon = HoaDon::find($request->orderId);
        
        if(empty($hoaDon)){
            return response()->json([
                "success"=>false,
                "message"=>"Hóa đơn không tồn tại!"
            ]);
        }
        if($hoaDon->trang_thai!=HoaDon::TRANG_THAI_CHO_XU_LY){

            return response()->json([
                "success"=>false,
                "message"=>"Hóa đơn hủy không thành công!"
            ]);
        }
        $hoaDon->trang_thai=HoaDon::TRANG_THAI_DA_HUY;
        $hoaDon->save();

        return response()->json([
            "success"=>true,
            "message"=>"Hủy hóa đơn thành công!",
            "data"=>$hoaDon
        ]);
    }
    public function layTrangThaiDonHang($userId){
        try {
           
    
            // Lấy danh sách hóa đơn dựa trên user ID
            $hoaDon = HoaDon::where("khach_hang_id", $userId)->get();
    
            if ($hoaDon->isEmpty()) {
                return response()->json([
                    "success" => false,
                    "message" => "Không tìm thấy đơn hàng cho người dùng này!",
                ]);
            }
    
            $trangThaiDonHang = [];
    
            // Lặp qua danh sách hóa đơn và lấy trạng thái tương ứng
            foreach ($hoaDon as $donHang) {
                $trangThaiDonHang[] = [
                    'orderId' => $donHang->id, // Đặt lại tên cột tương ứng trong CSDL
                    'trang_thai' => $donHang->trang_thai, // Đặt lại tên cột tương ứng trong CSDL
                ];
            }
     
            return response()->json([
                "success" => true,
                "message" => "Lấy trạng thái thành công!",
                "data" => $trangThaiDonHang,
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Có lỗi khi xử lý yêu cầu: " . $e->getMessage(),
            ]);
        }
    }
}
