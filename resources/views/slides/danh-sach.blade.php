@extends('master')




@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 ><span data-feather="list" ></span>DANH SÁCH LOGO</h4>
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
                <th>Ảnh logo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        @foreach($dsLogo as $Logo)
        <tr>
            <td>
                <img src="{{ asset($Logo->img_url) }}" alt="ảnh" class="img_slide">
            </td>
            <td class="chuc-nang">
                <a href="{{ route('logo.cap-nhat', ['id' => $Logo->id]) }}" class="btn btn-outline-primary"><span data-feather="edit"></span>Chỉnh sửa</a>
            </td>
        <tr>
            @endforeach
        
    </table>
<br><br><br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h4 ><span data-feather="list" ></span>DANH SÁCH SLIDESHOW</h4>
</div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Tên tiêu đề</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        @foreach($dsSlide as $Slide)
        <tr>
            <td>
                <img src="{{asset($Slide->img_url)}}" alt="ảnh" class="img_slide">
            <td>{{ $Slide->tieu_de }}</td>
            <td class="chuc-nang">
                <a href="{{ route('slides.cap-nhat', ['id' => $Slide->id]) }}" class="btn btn-outline-primary"><span data-feather="edit"></span>Chỉnh sửa</a>
            </td>
        <tr>
            @endforeach
        
    </table>


    
</div>
@endsection