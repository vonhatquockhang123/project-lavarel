@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4><span data-feather="list" ></span>DANH SÁCH BÌNH LUẬN</h4>
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
                <th>Mã bình luận</th>
                <th>Khách hàng</th>
                <th>Sản phẩm</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        @foreach($dsBinhLuan as $binhLuan)
        <tr>
            <td>{{ $binhLuan->id}}</td>
            <td>{{ $binhLuan->khach_hang->ho_ten}}</td>
            <td>{{ $binhLuan->san_pham->ten}}</td>
            <td>{{  $binhLuan->ngay_tao}}</td>
            <td class="chuc-nang">
                <input value="{{ $binhLuan->noi_dung}}" class="noi-dung-binh-luan" readonly/>
                <textarea id="binh-luan"></textarea><br/>
                <span class="error-message" id="error-binh-luan"></span><br/>
                <button class="btn btn-outline-info btn-tra-loi" data-id="{{ $binhLuan->id }}"><span data-feather="message-circle"></span>Trả lời</button>|
                <a href="{{ route('binh-luan.xoa', ['id' => $binhLuan->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>
            </td>
        <tr>
            @endforeach
    </table>
</div>
{{ $dsBinhLuan->links('vendor.pagination.default') }}
@endsection

@section('page-js')
<script type="text/javascript">
    $(document).ready(function() {
    $('.btn-tra-loi').click(function() {
        var button = $(this); // Lưu lại tham chiếu đến nút đang được nhấp
        var id = button.data('id');
        var binhLuan = button.siblings('textarea').val();
        
        $.ajax({
            method: 'POST',
            url: "{{ route('binh-luan.tra-loi', '') }}/" + id,
            data: {
                "_token": "{{ csrf_token() }}",
                "binh_luan": binhLuan
            },
            success: function (response) {
                if (response.success) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response.success,
                    showConfirmButton: true,
                    timer: 3000
                });

                    button.siblings('textarea').val("");
                    button.siblings('.error-message').text("");
                } else if (response.error) {
                    button.siblings('.error-message').text(response.error);
                    button.siblings('textarea').val(""); 
                   
                }
            },
            error: function (xhr, status, error) {
                button.siblings('.error-message').text(xhr.responseJSON.message);
            }
        });
    });
});


</script>
@endsection