<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\QuanTriController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\CTPhieuNhapController;
use App\Http\Controllers\HinhAnhController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\DungLuongMauSacController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\InvoiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function(){
    Route::get('/', [ThongKeController::class, 'danhSach'])->name('thong-ke');
    Route::get('/tk-hoa-don', [ThongKeController::class, 'ThongKeHoaDon'])->name('tk-hoa-don');
    Route::get('/san-pham', [SanPhamController::class, 'danhSach'])->name('danh-sach');
    Route::get('hinh-anh/{spid}/{id}', [HinhAnhController::class, 'hinhAnhXoa'])->name('hinh-anh');
    Route::get('dang-xuat', [DangNhapController::class, 'dangXuat'])->name('dang-xuat');
    Route::get('thong-tin',[DangNhapController::class,'thongTin'])->name('thong-tin');
    Route::post('thong-tin',[DangNhapController::class, 'capNhatThongTin'])->name('update-info');
    Route::get('admin/doi-mat-khau', [DangNhapController::class, 'DoiMatKhau'])->name('doi-mat-khau');
    Route::post('admin/doi-mat-khau', [DangNhapController::class, 'xlDoiMatKhau'])->name('xl-doi-mat-khau');

    

    Route::prefix('san-pham')->group(function(){
        Route::name('san-pham.')->group(function(){
            Route::get('them-moi', [SanPhamController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi', [SanPhamController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('/', [SanPhamController::class, 'danhSach'])->name('danh-sach');
            Route::get('/tim-kiem', [SanPhamController::class, 'timKiem'])->name('tim-kiem');
            Route::get('cap-nhat/{id}', [SanPhamController::class, 'capNhat'])->name('cap-nhat');
            Route::get('khoi-phuc/{id}', [SanPhamController::class, 'khoiPhuc'])->name('khoi-phuc');
            Route::get('xoa-vinh-vien/{id}', [SanPhamController::class, 'xoaVinhVien'])->name('xoa-vinh-vien');
            Route::get('thung-rac', [SanPhamController::class, 'thungRac'])->name('thung-rac');
            Route::post('cap-nhat/{id}', [SanPhamController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
            Route::get('chi-tiet/{id}', [SanPhamController::class, 'chiTietSanPham'])->name('chi-tiet');
            Route::get('xoa/{id}', [SanPhamController::class, 'xoa'])->name('xoa'); 
        });
    });

    Route::prefix('loai-san-pham')->group(function(){
        Route::name('loai-san-pham.')->group(function(){
            Route::get('/', [LoaiSanPhamController::class, 'danhSach'])->name('danh-sach');
            Route::get('tim-kiem', [LoaiSanPhamController::class, 'timKiem'])->name('tim-kiem');
            Route::get('them-moi',[LoaiSanPhamController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi',[LoaiSanPhamController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('cap-nhat/{id}', [LoaiSanPhamController::class, 'capNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}', [LoaiSanPhamController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
            Route::get('khoi-phuc/{id}', [LoaiSanPhamController::class, 'khoiPhuc'])->name('khoi-phuc');
            Route::get('xoa-vinh-vien/{id}', [LoaiSanPhamController::class, 'xoaVinhVien'])->name('xoa-vinh-vien');
            Route::get('thung-rac', [LoaiSanPhamController::class, 'thungRac'])->name('thung-rac');
            Route::get('xoa/{id}', [LoaiSanPhamController::class, 'xoa'])->name('xoa');
        });
    });

    Route::prefix('nhap-hang')->group(function(){
        Route::name('nhap-hang.')->group(function(){
            Route::get('them-moi',[CTPhieuNhapController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi',[CTPhieuNhapController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('chi-tiet/{id}',[CTPhieuNhapController::class, 'chiTiet'])->name('chi-tiet');
            Route::get('xoa/{id}',[CTPhieuNhapController::class, 'xoa'])->name('xoa');
            Route::get('/',[CTPhieuNhapController::class, 'danhSach'])->name('danh-sach');
        });
    });
    Route::prefix('khach-hang')->group(function(){
        Route::name('khach-hang.')->group(function(){
            Route::get('/', [KhachHangController::class, 'danhSach'])->name('danh-sach');
            Route::get('/tim-kiem', [KhachHangController::class, 'timKiem'])->name('tim-kiem');
            Route::get('them-moi',[KhachHangController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi',[KhachHangController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('cap-nhat/{id}', [KhachHangController::class, 'capNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}', [KhachHangController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
            Route::get('xoa/{id}', [KhachHangController::class, 'xoa'])->name('xoa');
        });
    });

    Route::prefix('pdf')->group(function(){
        Route::name('pdf.')->group(function(){
            Route::get('hd/{id}',[PDFController::class, 'export_bill_pdf'])->name('hoa-don');
            Route::get('nh/{id}',[PDFController::class, 'export_goods_pdf'])->name('nhap-hang');
        });
    });

   
    
    Route::get('/ajax-lay-chi-tiet',[HoaDonController::class, 'layMauSacDungLuong'])->name('lay-chi-tiet-sp-ajax');

    Route::prefix('hoa-don')->group(function(){
        Route::name('hoa-don.')->group(function(){
            Route::get('/',[HoaDonController::class, 'danhSach'])->name('danh-sach');
           
            Route::get('/tim-kiem', [HoaDonController::class, 'timKiem'])->name('tim-kiem');
            Route::get('/tim-kiem-sdt', [HoaDonController::class, 'timKiemSdt'])->name('tim-kiem-sdt');
            Route::get('chi-tiet/{id}',[HoaDonController::class, 'chiTiet'])->name('chi-tiet');
            Route::get('them-moi',[HoaDonController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi',[HoaDonController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('xoa/{id}',[HoaDonController::class, 'xoa'])->name('xoa');

            Route::get('huy-don/{id}',[HoaDonController::class, 'daHuy'])->name('huy-don');
            Route::get('duyet-don/{id}',[HoaDonController::class, 'duyetDon'])->name('duyet-don');
            Route::get('dang-giao/{id}',[HoaDonController::class, 'dangGiao'])->name('dang-giao');
            Route::get('hoan-thanh/{id}',[HoaDonController::class, 'hoanThanh'])->name('hoan-thanh');

        });
    });

    Route::prefix('nha-cung-cap')->group(function(){
        Route::name('nha-cung-cap.')->group(function(){
            Route::get('/', [NhaCungCapController::class, 'danhSach'])->name('danh-sach');
            Route::get('/tim-kiem', [NhaCungCapController::class, 'timKiem'])->name('tim-kiem');
            Route::get('them-moi',[NhaCungCapController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi',[NhaCungCapController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('cap-nhat/{id}', [NhaCungCapController::class, 'capNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}', [NhaCungCapController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
            Route::get('xoa/{id}', [NhaCungCapController::class, 'xoa'])->name('xoa');
        });
    });

    Route::prefix('nhan-vien')->group(function(){
        Route::name('nhan-vien.')->group(function(){
            Route::get('/', [QuanTriController::class, 'danhSach'])->name('danh-sach');
            Route::get('/tim-kiem', [QuanTriController::class, 'timKiem'])->name('tim-kiem');
            Route::get('them-moi',[QuanTriController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi',[QuanTriController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('cap-nhat/{id}', [QuanTriController::class, 'capNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}', [QuanTriController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
            Route::get('xoa/{id}', [QuanTriController::class, 'xoa'])->name('xoa');
        });
    });
    
    Route::prefix('binh-luan')->group(function(){
        Route::name('binh-luan.')->group(function(){
            Route::get('/',[BinhLuanController::class, 'danhSach'])->name('danh-sach');
            Route::post('tra-loi/{id}',[BinhLuanController::class, 'traLoiBinhLuan'])->name('tra-loi');
            Route::get('xoa/{id}',[BinhLuanController::class, 'xoa'])->name('xoa');
        });
    });

    Route::prefix('mau-dung-luong')->group(function(){
        Route::name('mau-dung-luong.')->group(function(){
            Route::get('/', [DungLuongMauSacController::class, 'danhSach'])->name('danh-sach');
            Route::post('/them-moi/mau', [DungLuongMauSacController::class, 'themMoiMauAjax'])->name('them-moi-mau-ajax');
            Route::post('/them-moi/dung-luong', [DungLuongMauSacController::class, 'themMoiDungLuongAjax'])->name('them-moi-dung-luong-ajax');
            Route::get('/danh-sach-mau', [DungLuongMauSacController::class, 'danhSachMauSacAjax'])->name('danh-sach-mau-ajax');
            Route::get('/mau/xoa/{id}', [DungLuongMauSacController::class, 'mauSacXoa'])->name('mau.xoa');
            Route::get('/dung-luong/xoa/{id}', [DungLuongMauSacController::class, 'dungLuongXoa'])->name('dung-luong.xoa');
            Route::get('/dung-luong', [DungLuongMauSacController::class, 'danhSachDungLuongSacAjax'])->name('danh-sach-dung-luong-ajax');
        });
    });


    Route::prefix('slides')->group(function(){
        Route::name('slides.')->group(function(){
            Route::get('/', [SlidesController::class, 'danhSach'])->name('danh-sach');
            Route::get('cap-nhat/{id}', [SlidesController::class, 'capNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}', [SlidesController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
            });
        });

        Route::prefix('logo')->group(function(){
            Route::name('logo.')->group(function(){
                Route::get('cap-nhat/{id}', [LogoController::class, 'capNhat'])->name('cap-nhat');
                Route::post('cap-nhat/{id}', [LogoController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
                });
            });
});
Route::middleware('guest')->group(function(){
    Route::get('dang-nhap', [DangNhapController::class, 'dangNhap'])->name('dang-nhap');
    Route::post('dang-nhap', [DangNhapController::class, 'xuLyDangNhap'])->name('xl-dang-nhap');

    Route::get('quen-mat-khau', [DangNhapController::class, 'quenMatKhau'])->name('quen-mat-khau');
    Route::post('quen-mat-khau', [DangNhapController::class, 'xuLyQuenMatKhau'])->name('xl-quen-mat-khau');

    Route::get('lay-mat-khau/{customer}/{token}', [DangNhapController::class, 'layMatKhau'])->name('quen-mat-khau');
    Route::post('lay-mat-khau/{customer}/{token}', [DangNhapController::class, 'xuLyLayMatKhau'])->name('xl-lay-mat-khau');
});
















