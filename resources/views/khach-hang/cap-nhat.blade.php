@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT KHÁCH HÀNG</h1>
</div>
<form class="container" method="POST" action="{{ route('khach-hang.xl-cap-nhat', ['id' => $khachHang->id]) }}">
   @csrf
   <div class="row">
        <div class="col-md-6">
            <label for="ho_ten" class="form-label">Họ tên:</label>
            <input type="text" class="form-control" name="ho_ten" value="{{old('ho_ten',$khachHang->ho_ten)}}">
            @error('ho_ten')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" name="email" value="{{old('email',$khachHang->email)}}">
            @error('email')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="ten_dang_nhap" class="form-label">Tên đăng nhập:</label>
            <input type="text" class="form-control" name="ten_dang_nhap" value="{{old('ten_dang_nhap',$khachHang->ten_dang_nhap)}}"readonly>
            @error('ten_dang_nhap')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="mat-khau" class="form-label">Mật khẩu:</label>
            <input type="password" class="form-control" name="mat_khau" value="{{old('mat_khau',$khachHang->password)}}" readonly>
            @error('mat_khau')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="dien_thoai" class="form-label">Điện thoại:</label>
            <input type="number" class="form-control" name="dien_thoai" value="{{old('dien_thoai',$khachHang->dien_thoai)}}">
            @error('dien_thoai')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-6">
            <label for="dia_chi" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" name="dia_chi" value="{{old('dia_chi',$khachHang->dia_chi)}}">
            @error('dia_chi')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-6">
            <label for="trang_thai" class="form-label">Trạng thái</label>
            <?php if($khachHang->trang_thai==1):?>
            <input type="checkbox" name="trang_thai" checked>
            <?php else:?>
            <input type="checkbox" name="trang_thai">
            <?php endif;?>
        </div>
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary" class="Luu"><span data-feather="save"></span>Lưu</button>
    </div>
</form>
@endsection