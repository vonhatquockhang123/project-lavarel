@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI KHÁCH HÀNG</h1>
</div>
<form method="POST" action="{{ route('khach-hang.xl-them-moi') }}" class="container">
@csrf
<div class="row">
    <div class="col-md-6">
        <label for="ho-ten" class="form-label">Họ tên:</label>
        <input type="text" class="form-control" name="ho_ten" id="ho-ten" value="{{old('ho_ten')}}">
        @error('ho_ten')
            <span class="error-message"> {{ $message }} </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" value="{{old('email')}}">
        @error('email')
            <span class="error-message"> {{ $message }} </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="ten-dang-nhap" class="form-label">Tên đăng nhập:</label>
        <input type="text" class="form-control" name="ten_dang_nhap" id="ten-dang-nhap" value="{{old('ten_dang_nhap')}}">
        @error('ten_dang_nhap')
            <span class="error-message"> {{ $message }} </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="mat-khau" class="form-label">Mật khẩu:</label>
        <input type="text" class="form-control" name="mat_khau" id="mat-khau" value="{{old('mat_khau')}}">
        @error('mat_khau')
            <span class="error-message"> {{ $message }} </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="dien-thoai" class="form-label">Điện thoại:</label>
        <input type="number" class="form-control" name="dien_thoai" id='dien-thoai' value="{{old('dien_thoai')}}">
        @error('dien_thoai')
            <span class="error-message"> {{ $message }} </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="dia-chi" class="form-label">Địa chỉ:</label>
        <input type="text" class="form-control" name="dia_chi" id="dia-chi" value="{{old('dia_chi')}}">
        @error('dia_chi')
            <span class="error-message"> {{ $message }} </span>
        @enderror
    </div>
</div>
<div class="col-md-2">
    <button type="submit" class="btn btn-primary"><span data-feather="save"></span>Lưu</button>
  </div>
</form>
@endsection