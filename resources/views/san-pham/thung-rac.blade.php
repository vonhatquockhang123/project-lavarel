@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4><span data-feather="list" ></span>DANH SÁCH SẢN PHẨM ĐÃ XÓA</h4>
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
        <th>Id</td>
        <th>Tên</th>
        <th>Mô tả</th>  
        <th>Loại sản phẩm</th>
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dsSanPham as $sanPham)
    <tr>
        <td>{{ $sanPham->id }}</td>
        <td>{{ $sanPham->ten }}</td>
        <td>{{ $sanPham->mo_ta }}</td>
        <td>{{ $sanPham->loai_san_pham->ten }}</td>
        <td class="chuc-nang">
            <a href="{{ route('san-pham.khoi-phuc', ['id' => $sanPham->id]) }}" class="btn btn-outline-primary"><span data-feather="rotate-ccw"></span>Khôi phục</a> |
            <a href="{{ route('san-pham.xoa-vinh-vien', ['id' => $sanPham->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span>Xóa vĩnh viễn</a>
        </td>
    <tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('#search-form').submit(function(e) {
           
            e.preventDefault();

            
            var searchValue = $('search_name]').val();

           
            if (searchValue.trim() !== '') {
                console.log('Searching for: ' + searchValue);
            }
        });
    })
</script>
@section('page-js')

@endsection -->