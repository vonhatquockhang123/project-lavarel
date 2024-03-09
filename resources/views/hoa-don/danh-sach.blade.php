@extends('master')


@section('page-sw')
@if(session('don_hang'))
<script>
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: "{{session('don_hang')}}",
        showConfirmButton: true,
        timer: 9000
        })
    </script>
@endif
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4><span data-feather="list" ></span>DANH SÁCH HÓA ĐƠN</h4>
    <form action="{{route('hoa-don.tim-kiem')}}" class="submit_search" id="search-form">
    <div class="Search">
        <input type="search" class="form-control form-control-dark" name="search_name" value="{{$reQuest ?? null}}" placeholder="Tên khách hàng..." aria-label="Search" />
        <button class="btn btn-primary seach" type="submit"><span data-feather="search"></span></button>
    </div>
    </form>
    <form action="{{route('hoa-don.tim-kiem-sdt')}}" class="submit_search" id="search-form">
        <div class="Search">
            <input type="number" class="form-control form-control-dark" name="search_sdt" value="{{$reQuestSdt ?? null}}" placeholder="Số điện thoại khách hàng..." aria-label="Search" />
            <button class="btn btn-primary seach" type="submit"><span data-feather="search"></span></button>
        </div>
        </form>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('hoa-don.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a>
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
                <th>Khách hàng</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Phương thức thanh toán</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        @foreach($dsHoaDon as $hoaDon)
        <tr>
            <td>{{$hoaDon->id}}</td>
            <td>{{ $hoaDon->khach_hang->ho_ten }}</td>
            <td>{{ $hoaDon->dien_thoai }}</td>
            <td>{{ $hoaDon->dia_chi }}</td>
            <td>{{ $hoaDon->tong_tien_formatted }}</td>
            <td>{{ $hoaDon->phuong_thuc_tt }}</td>
            <td>{{ $hoaDon->ngay_tao }}</td>

            @if ($hoaDon->trang_thai == 1)
            <td class="trang-thai-don"> 
                        <button type="button" class="btn btn-danger huy-don-btn" data-id="{{ $hoaDon->id }}">Hủy</button>    
                &nbsp;
                <a href="{{route('hoa-don.duyet-don', ['id' => $hoaDon->id])}}">
                    <button type="submit" class="btn btn-success">Duyệt</button>
                </a>
            </td>
            @elseif ($hoaDon->trang_thai == 2)
                <td>
                <a href="{{route('hoa-don.dang-giao',['id'=> $hoaDon->id])}}">
                    <button type="submit" class="btn btn-warning">Đang giao</button>
                </a>
                </td>
            @elseif ($hoaDon->trang_thai == 3)
                <td>
                    <a href="{{route('hoa-don.hoan-thanh',['id'=> $hoaDon->id])}}">
                        <button type="submit" class="btn btn-secondary">Hoàn thành</button>
                    </a>
                </td>
            @elseif ($hoaDon->trang_thai == 4)
            <td>
                    <button class="btn btn-light">Đã thanh toán</button>
            </td>
            @elseif ($hoaDon->trang_thai == 5)
                <td>
                        <button type="submit" class="btn btn-light">Đã hủy</button>
                </td>
            @endif



            <td class="chuc-nang">
                <a href="{{ route('hoa-don.chi-tiet', ['id' => $hoaDon->id]) }}" class="btn btn-outline-info"><span data-feather="chevrons-right"></span></a>|
                <a href="{{ route('hoa-don.xoa', ['id' => $hoaDon->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>|
                <a href="{{ route('pdf.hoa-don',['id' => $hoaDon->id]) }}" class="btn btn-outline-secondary"><span data-feather="download"></span></a>
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
{{ $dsHoaDon->links('vendor.pagination.default') }}
<script>
function confirmHuyDon(url) {
    if (confirm("Bạn có chắc chắn muốn hủy đơn này?")) {
        window.location.href = url;
    }
}
</script>
@endsection

@section('page-js')
<script type="text/javascript">
    $(document).ready(function(){
        $('.huy-don-btn').on('click', function(){
        var hoaDonId = $(this).data('id');
        var confirmHuy = false; 

        if (!confirmHuy) {
            var confirmXoa = confirm("Bạn có muốn Xóa hóa đơn này không?");

            if (confirmXoa) {
                window.location.href = "{{ route('hoa-don.huy-don', '') }}/" + hoaDonId;
            } else {
                window.location.href = "{{ route('hoa-don.danh-sach') }}";
            }
        }
    
    });
    });
</script>
@endsection