@extends('master')

@section('content')
 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>THÊM MỚI SẢN PHẨM</h4>
</div>
<form method="POST" action="{{ route('san-pham.xl-them-moi') }}" enctype="multipart/form-data" class="container">
    @csrf
    <h5 class="offset-md-6">Thông tin sản phẩm:</h5>
    <div class="row">
        <div class="col-md-6">
            <label for="ten" class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="ten" value="{{old('ten')}}">
            @error('ten')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="do-phan-giai" class="form-label">Độ phân giải:</label>
            <input type="text" id="do-phan-giai" class="form-control" name="do_phan_giai" value="{{old('do_phan_giai')}}">
            @error('do_phan_giai')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="trong-luong" class="form-label">Trọng lượng(g):</label>
            <input type="number" id="trong-luong" class="form-control" name="trong_luong" step="0.1" value="{{old('trong_luong')}}">
            @error('trong_luong')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="loai-san-pham" class="form-label">Loại sản phẩm:</label>
            <select name="loai_san_pham" class="form-select">     
            @foreach($dsLoaiSanPham as $LoaiSanPham)
                @php
                    $selectedValue = old('loai_san_pham', $LoaiSanPham->id);
                @endphp
            <option value="{{ $LoaiSanPham->id }}"   {{ $selectedValue ==   $LoaiSanPham->id ? 'selected' : '' }} >
                {{ $LoaiSanPham->ten }}
            </option>
            @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="camera" class="form-label">Camera:</label>
            <input type="text" id="camera" class="form-control" name="camera" value="{{old('camera')}}">
            @error('camera')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="pin" class="form-label">Pin(mAh):</label>
            <input type="number" id="pin" class="form-control" name="pin" value="{{old('pin')}}">
            @error('pin')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="mo-ta" class="form-label">Mô tả:</label>
            <input type="text" id="mo-ta" class="form-control" name="mo_ta" value="{{old('mo_ta')}}">
            @error('mo_ta')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-3"> 
            <label for="kich-thuoc" class="form-label">Kích thước(dài-ngang-dày):</label>
            <textarea type="text" id="kich-thuoc" class="form-control" cols="3" name="kich_thuoc">{{old('kich_thuoc')}}</textarea>
            @error('kich_thuoc')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="man-hinh" class="form-label">Màn hình(inch):</label>
            <input type="number" id="man-hinh" class="form-control" name="man_hinh" step="0.1" value="{{old('man_hinh')}}">
            @error('man_hinh')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="hinh_anh[]" class="form-label">Chọn ảnh: </label>
            <input type="file" name="hinh_anh[]" value="{{old('hinh_anh')}}" multiple required/><br/>
            @if(session('error'))
            <span class="error-message">{{session('error')}}</span>
            @endif
        </div>
        <div class="col-md-3 offset-md-3">
            <label for="he-dieu-hanh" class="form-label">Hệ điều hành:</label>
            <input type="text" id="he-dieu-hanh" class="form-control" name="he_dieu_hanh" value="{{old('he_dieu_hanh')}}">
            @error('he_dieu_hanh')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="ram" class="form-label">Ram(GB):</label>
            <input type="number" id="ram" class="form-control" name="ram" value="{{old('ram')}}">
            @error('ram')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary"><span data-feather="save"></span>Lưu</button>
    </div>
</form>
@endsection