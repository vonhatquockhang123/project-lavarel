@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>THÊM MỚI NHÂN VIÊN</h4>
</div>
<form method="POST" action="{{ route('nhan-vien.xl-them-moi') }}" enctype="multipart/form-data" class="container" >
@csrf
<div class="row">
    <div class="col-md-6">
        <label for="ho-ten" class="form-label">Họ tên:</label>
        <input type="text" class="form-control" name="ho_ten" id="ho-ten" value="{{old('ho_ten')}}">
        @error('ho_ten')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="dien_thoai" class="form-label">Điện thoại:</label>
        <input type="number" class="form-control" name="dien_thoai" id='dien-thoai' value="{{old('dien_thoai')}}">
        @error('dien_thoai')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" value="{{old('email')}}">
        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="dia_chi" class="form-label">Địa chỉ:</label>
        <input type="text" class="form-control" name="dia_chi" value="{{old('dia_chi')}}">
        @error('dia_chi')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="username" class="form-label">Tên đăng nhập:</label>
        <input type="text" class="form-control" name="username" id="username" value="{{old('username')}}"> 
        @error('username')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="password" class="form-label">Mật khẩu:</label>
        <input type="text" class="form-control" name="mat_khau" id="password" value="{{old('mat_khau')}}">
        @error('mat_khau')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class=row>
    <div class="col-md-6">
    <label for="hinh_anh" class="form-label">Chọn ảnh: </label>
    <input type="file" name="hinh_anh" required/><br/>
        @error('hinh_anh')
            <span class="error-message">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="col-md-2">
    <button type="submit" class="btn btn-primary"><span data-feather="save"></span>Lưu</button>
  </div>
</form>
@endsection