<?php

use App\Http\Controllers\APIAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APISanPhamController;
use App\Http\Controllers\APILoaiSanPhamController;
use App\Http\Controllers\APIKhachHangController;
use App\Http\Controllers\APIHoaDonController;
use App\Http\Controllers\APISlidesController;
use App\Http\Controllers\SlidesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



    Route::post('login', 'APIAuthController@login');
    Route::post('logout',[APIAuthController::class, 'logout']);
    Route::post('refresh', 'APIAuthController@refresh');
    Route::get('me', [APIAuthController::class,'me']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/dang-nhap',[APIAuthController::class,"dangNhap"]);

Route::post('/send-email', [APIAuthController::class, 'sendEmail']);

Route::get('/san-pham',[APISanPhamController::class, "layDanhSach"]);
Route::get('/san-pham/{id}',[APISanPhamController::class, "layChiTiet"]);
Route::post('/san-pham',[APISanPhamController::class, "themMoi"]);
Route::put('/san-pham/{id}',[APISanPhamController::class, "capNhap"]);
Route::delete('/san-pham/{id}',[APISanPhamController::class, 'xoa']);
Route::post('/san-pham/tim-kiem',[APISanPhamController::class, "timKiem"]);
Route::get('/san-pham/tim-ten/{searchTerm}',[APISanPhamController::class, "timKiemTen"]);

Route::get('/loai-san-pham',[APILoaiSanPhamController::class, "layDanhSach"]);
Route::get('/loai-san-pham/{id}',[APILoaiSanPhamController::class, "layChiTiet"]);
Route::post('/loai-san-pham',[APILoaiSanPhamController::class, "themMoi"]);
Route::put('/loai-san-pham/{id}',[APILoaiSanPhamController::class, "capNhap"]);
Route::delete('/loai-san-pham/{id}',[APILoaiSanPhamController::class, 'xoa']);
Route::post('/loai-san-pham/tim-kiem',[APILoaiSanPhamController::class, "timKiem"]);

Route::get('/slide',[APISlidesController::class, 'danhSach']);
Route::post('/hoa-don',[APIHoaDonController::class, "themHoaDon"]);
Route::post('/huy-don',[APIHoaDonController::class, "huyDon"]);
Route::post('/dang-ky',[APIKhachHangController::class, "dangKy"]);
Route::post('/update-info',[APIKhachHangController::class, "capNhapThongTin"]);
Route::post('/doi-mat-khau',[APIKhachHangController::class, "doiMatKhau"]);

Route::post('/binh-luan',[APISanPhamController::class, "binhLuan"]);
Route::post('/danh-gia',[APISanPhamController::class, "danhGia"]);

Route::post('/trang-thai-don-hang/{userId}',[APIHoaDonController::class, "layTrangThaiDonHang"]);





