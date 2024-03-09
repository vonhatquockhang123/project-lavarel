@extends('master')


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT SẢN PHẨM</h1>
</div>
@if(session('thong_bao'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <div> 
              {{session('thong_bao')}}
        </div>
    </div>
@endif
<form class="container" method="POST" action="{{ route('san-pham.xl-cap-nhat', ['id' => $sanPham->id]) }}" enctype="multipart/form-data">
    @csrf

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Ảnh</th>
            </tr>
        </thead>
        @foreach($dsHinhAnh as $hinhAnh)
        <tr>
            <td>
                <img class="img" src="{{asset($hinhAnh->img_url)}}" alt="hinh_anh" />
            </td>
            <td class="td-xoa-anh">
                <a href="{{ route('hinh-anh',  ['spid' => $sanPham->id, 'id' => $hinhAnh->id]) }}" class="btn btn-outline-danger">Xóa</a>

            </td>
        <tr>
            @endforeach
    </table>
    
    <div class="row">
        <div class="col-md-6">
            <label for="ten" class="form-label">Tên:</label>
            <input type="text" class="form-control" id="ten" name="ten" value="{{old('ten',$sanPham->ten)}}" />
            @error('ten')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-3">
        <label for="do-phan-giai" class="form-label">Độ phân giải:</label>
        <input type="text" id="do-phan-giai" class="form-control" name="do_phan_giai" value="{{old('do_phan_giai',$tTSanPham->do_phan_giai)}}">
        @error('do_phan_giai')
            <span class="error-message">{{ $message }}</span>
            @enderror
    </div>
    <div class="col-md-3">
        <label for="trong-luong" class="form-label">Trọng lượng(g):</label>
        <input type="number" id="trong-luong" class="form-control" name="trong_luong" step="0.1" value="{{old('trong_luong',$tTSanPham->trong_luong)}}">
        @error('trong_luong')
            <span class="error-message">{{ $message }}</span>
            @enderror
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="mo-ta" class="form-label">Mô tả:</label>
            <input type="text" class="form-control" id="mo-ta" name="mo_ta" value="{{old('mo_ta',$sanPham->mo_ta)}}" />
            @error('mo_ta')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-3">
        <label for="man-hinh" class="form-label">Màn hình(inch):</label>
        <input type="number" id="man-hinh" class="form-control" name="man_hinh" step="0.1" value="{{old('man_hinh',$tTSanPham->man_hinh)}}">
        @error('man_hinh')
            <span class="error-message">{{ $message }}</span>
            @enderror
    </div>
    <div class="col-md-3">
        <label for="kich-thuoc" class="form-label">Kích thước(dài-ngang-dày):</label>
        <textarea type="text" id="kich-thuoc" class="form-control" cols="3" name="kich_thuoc">{{old('kich_thuoc',$tTSanPham->kich_thuoc)}}</textarea>
        @error('kich_thuoc')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="loai_san_pham" class="form-label">Loại sản phẩm:</label>
            <select name="loai_san_pham" class="form-select">
                <option type="text" class="form-control" name="loai_san_pham" value="{{old('loai_san_pham',$sanPham->loai_san_pham->id)}}">
                    {{$sanPham->loai_san_pham->ten}}
                </option>
                @foreach($dsLoaiSanPham as $loaiSanPham)
                <option value="{{$loaiSanPham->id}}">
                    {{$loaiSanPham->ten}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
        <label for="he-dieu-hanh" class="form-label">Hệ điều hành:</label>
        <input type="text" id="he-dieu-hanh" class="form-control" name="he_dieu_hanh" value="{{old('he_dieu_hanh',$tTSanPham->he_dieu_hanh)}}">
        @error('he_dieu_hanh')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="ram" class="form-label">Ram(GB):</label>
        <input type="number" id="ram" class="form-control" name="ram" value="{{old('ram',$tTSanPham->ram)}}">
        @error('ram')
            <span class="error-message">{{ $message }}</span>
            @enderror
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="hinh-anh" class="form-label">Thêm ảnh: </label>
            <input type="file" name="hinh_anh[]"  multiple/><br/>
            @if(session('error'))
            <span class="error-message">{{session('error')}}</span>
            @endif
        </div>
        <div class="col-md-3">
        <label for="camera" class="form-label">Camera:</label>
        <input type="text" id="camera" class="form-control" name="camera" value="{{old('camera',$tTSanPham->camera)}}">
        @error('camera')
            <span class="error-message">{{ $message }}</span>
            @enderror
    </div>
    <div class="col-md-3">
        <label for="pin" class="form-label">Pin(mAh):</label>
        <input type="number" id="pin" class="form-control" name="pin" value="{{old('pin',$tTSanPham->pin)}}">
        @error('pin')
            <span class="error-message">{{ $message }}</span>
            @enderror   
    </div>
    </div>  
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary" class="Luu"><span data-feather="save"></span>Lưu</button>
    </div>

</form>

@endsection