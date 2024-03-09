@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><span data-feather="list" ></span>Chi tiết sản phẩm</h1>
    
</div>

<div class="container">
        <div class="info-label">Hình ảnh:</div>
        @foreach($dsHinhAnh as $hinhAnh)
        <img src="{{asset($hinhAnh->img_url)}}" alt="Product Image" class="product-image">
        @endforeach
        <div class="product-info">
            <div class="info-label">Id:</div>
            <div class="info-value">{{$sanPham->id}}</div><br>
            <div class="info-label">Tên sản phẩm:</div>
            <div class="info-value">{{$sanPham->ten}}</div><br>
            <div class="info-label">Mô tả:</div>
            <div class="info-value">{{$sanPham->mo_ta}}</div><br>
            <div class="info-label">Loại sản phẩm:</div>
            <div class="info-value">{{$sanPham->loai_san_pham->ten}}</div>
        </div>
        
    <div class="info-detail">
        <b>Thông tin sản phẩm</b><br/><br/>
        <!-- <ul class="info-ul"> -->
            <li class="info-li">
                <p class="info-p">Độ phân giải: </p>
                <span>{{$tTSanPham->do_phan_giai}}</span>
            </li>
            <li class="info-li">
                <p class="info-p">Trọng lượng: </p>
                <span>{{$tTSanPham->trong_luong}} g</span>
            </li>
            <li class="info-li">
                <p class="info-p">Màn hình: </p>
                <span>{{$tTSanPham->man_hinh}} Inch</span>
            </li>
            <li class="info-li">
                <p class="info-p">Hệ điều hành: </p>
                <span>{{$tTSanPham->he_dieu_hanh}}</span>
            </li>
            <li class="info-li">
                <p class="info-p">Kích thước(dài-ngang-dày): </p>
                <span>{{$tTSanPham->kich_thuoc}}</span>
            </li>
            <li class="info-li">
                <p class="info-p">Camera: </p>
                <span>{{$tTSanPham->camera}}</span>
            </li>
            <li class="info-li">
                <p class="info-p">Pin: </p>
                <span>{{$tTSanPham->pin}} mAh</span>
            </li>
            <li class="info-li">
                <p class="info-p">Ram: </p>
                <span>{{$tTSanPham->ram}} GB</span>
            </li>                        
           
    </div>
    <table class="table ctsp">
        <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Màu sắc</th>
                <th scope="col">Dung lượng</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Số lượng</th>
                </tr>
        </thead>
        <tbody>
            @foreach($dsCTSanPham as $cTSanPham)
            <tr>
                <th scope="row">{{$cTSanPham->id}}</th>
                <td>{{$cTSanPham->mau_sac->ten}}</td>
                <td>{{$cTSanPham->dung_luong->ten}}</td>
                <td>{{$cTSanPham->gia_ban_formatted}}</td>
                <td>{{$cTSanPham->so_luong}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
        <div class="chuc-nang">
            <a href="{{ route('san-pham.cap-nhat', ['id' => $sanPham->id]) }}" class="btn btn-primary">Chỉnh sửa</a> 
        </div>
    </div>
</div>
@endsection