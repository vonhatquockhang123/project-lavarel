<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\CTHoaDon;
use App\Models\CTPhieuNhap;
use App\Models\NhaCungCap;
use App\Models\PhieuNhap;

class PDFController extends Controller
{
    public function export_bill_pdf($id)
    {
        $hoaDon=HoaDon::find($id);
        $dsCTHoaDon=CTHoaDon::where('hoa_don_id',$id)->get();
        $pdf = app('dompdf.wrapper')->loadView('pdf.hd', ['hoaDon'=>$hoaDon],['dsCTHoaDon'=>$dsCTHoaDon]);
        return $pdf->stream('hoa-don.pdf');
    }
    public function export_goods_pdf($id)
    {
        $phieuNhap=PhieuNhap::find($id);
        $dsCTPhieuNhap=CTPhieuNhap::where('phieu_nhap_id',$id)->get();
        $pdf = app('dompdf.wrapper')->loadView('pdf.nh', ['phieuNhap'=>$phieuNhap],['dsCTPhieuNhap'=>$dsCTPhieuNhap]);
        return $pdf->stream('hoa-don.pdf');
    }
}
