@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT NHÂN VIÊN</h1>
</div>
<form class="container" method="POST" id="update" action="{{ route('nhan-vien.xl-cap-nhat', ['id' => $quanTri->id]) }}" enctype="multipart/form-data">
   @csrf
   <div class="row">
        <div class="col-md-6">
            <label for="ho-ten" class="form-label">Họ tên:</label>
            <input type="text" class="form-control" name="ho_ten" id="ho-ten" value="{{old('ho_ten',$quanTri->ho_ten)}}">
            @error('ho_ten')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="dien-thoai" class="form-label">Điện thoại:</label>
            <input type="number" class="form-control" name="dien_thoai" id="dien-thoai" value="{{old('dien_thoai',$quanTri->dien_thoai)}}">
            @error('dien_thoai')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{old('email',$quanTri->email)}}">
            @error('email')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="dia_chi" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" name="dia_chi" value="{{old('dia_chi',$quanTri->dia_chi)}}">
            @error('dia_chi')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div> 
    <div class="row">
        <div class="col-md-6">
            <label for="username" class="form-label">Tên tài khoản:</label>
            <input type="text" class="form-control" name="username" id="username" value="{{old('username',$quanTri->username)}}" readonly>
            @error('username')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="password" class="form-label">Mật khẩu:</label>
            <input type="password" class="form-control" name="mat_khau" value="{{old('mat_khau',$quanTri->password)}}" readonly>
        </div>
    </div>
    <div class=row>
    <div class="col-md-6">
        <label for="hinh_anh" class="form-label">Chọn ảnh đại diện:</label>
        <input type="file" name="hinh_anh"/><br>
        @error('hinh_anh')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>
    <div class="row"> 
    <div class="col-md-6">
        <label for="trang_thai" class="form-label">Trạng thái</label>
        <?php if($quanTri->trang_thai==1):?>
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