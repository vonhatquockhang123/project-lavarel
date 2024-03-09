@extends('master')



@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4><span data-feather="list" ></span>DANH SÁCH NHÀ CUNG CẤP</h4>
    <form action="{{route('nha-cung-cap.tim-kiem')}}" class="submit_search" id="search-form">
    
        <div class="Search">
            <input type="search" class="form-control form-control-dark" name="search_name" value="{{$reQuest ?? null}}" placeholder="Tên nhà cung cấp..." aria-label="Search" />
            <button class="btn btn-primary seach" type="submit"><span data-feather="search"></span></button>
        </div>
    </form>
        

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('nha-cung-cap.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a>
        </div>
    </div>
</div>
@if(session('thong_bao'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <div> 
              {{session('thong_bao')}}
        </div>
    </div>
@endif
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        @foreach($dsnhaCungCap as $nhaCungCap)
        <tr>
            <td>{{ $nhaCungCap->id }}</td>
            <td>{{ $nhaCungCap->ten }}</td>
            <td>{{ $nhaCungCap->dien_thoai }}</td>
            <td>{{ $nhaCungCap->dia_chi }}</td>
            <?php
            if ($nhaCungCap->trang_thai == 1) {
                $trang_thai = "Hoạt động";
            } else {
                $trang_thai = "Không hoạt động";
            }
            ?>
            <td>{{ $trang_thai }}</td>
            <td class="chuc-nang">
                <a href="{{ route('nha-cung-cap.cap-nhat', ['id' => $nhaCungCap->id]) }}" class="btn btn-outline-primary"><span data-feather="edit"></span></a> |
                <a href="{{ route('nha-cung-cap.xoa', ['id' => $nhaCungCap->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>
            </td>
        <tr>
            @endforeach
    </table>
    @if(isset($errorMessage))
        <div class="alert alert-danger">
            {{ $errorMessage }}
        </div>
    @endif
</div>
@endsection