@extends('master')


@section('page-sw')
@if(session('thong_bao'))
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: "{{session('thong_bao')}}",
        showConfirmButton: true,
        timer: 3000
    })
</script>
@endif
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CHI TIẾT BÌNH LUẬN</h1>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th>Mã bình luận</th>
            <th>Khách hàng</th>
            <th>Sản phẩm</th>
            <th>Nội dung</th>
            </tr>
        </thead>
        @foreach($dsCTHoaDon as $cthoaDon)
        <tr>
            <td>{{ $binhLuan->khach_hang_id}}</td>
            <td>{{ $binhLuan->san_pham_id}}</td>
            <td>{{ $binhLuan->noi_dung }}</td>
            <td>{{ $binhLuan->ngay_tao }}</td>
        <tr>
            @endforeach
    </table>
</div>
@endsection