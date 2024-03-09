@extends('master')


@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4><span data-feather="list"></span>DANH SÁCH MÀU SẮC VÀ DUNG LƯỢNG</h4>
</div>
@if(session('thong_bao'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <div> 
              {{session('thong_bao')}}
        </div>
    </div>
@endif
<div class="them-m-dl">
    <h6 class="add-color">Thêm màu sắc</h6>
    <div class="row">
        <div class="col-md-6">
            <label for="mau_sac" class="form-label">Nhập màu sắc:</label>
            <input type="text" class="form-control" name="mau_sac" id="mau-sac">
        
            <span id ="error-mau-sac" class="error-message"></span>
        
        </div>
    </div>
    <button class="btn btn-primary" id="save-color"><span data-feather="save"></span>Lưu</button>
    <h6 class="add-size">Thêm dung lượng</h6>
    <div class="row">
        <div class="col-md-6">
            <label for="dung_luong" class="form-label">Nhập dung lượng:</label>
            <input type="text" class="form-control" name="dung_luong" id="dung-luong">
            <span class="error-message" id="error-dung-luong"></span>
        </div>
    </div>
    <button class="btn btn-primary" id="save-size"><span data-feather="save"></span>Lưu</button>
</div>
<div class="color_size">
    <button id="btn-color" class="btn btn-primary">Xem danh sách màu</button>
    <div id="list-color"></div>
    <br>
    <button id="btn-size" class="btn btn-primary">Xem danh dung lượng</button>
    <div id="list-size"></div>
</div>
@endsection

@section('page-js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#btn-color').click(function() {
            $.ajax({
                    method: 'GET',
                    url: "{{route('mau-dung-luong.danh-sach-mau-ajax')}}"
                })
                .done(function(response) {
                    $('#list-color').html(response);
                });
        });

        $('#btn-size').click(function() {
            $.ajax({
                    method: 'GET',
                    url: "{{route('mau-dung-luong.danh-sach-dung-luong-ajax')}}"
                })
                .done(function(response) {
                    $('#list-size').html(response);
                })
        })
         
        $('#save-color').click(function() {
            var mauSac=$('#mau-sac').val();
            $.ajax({
                method: 'POST',
                url: "{{route('mau-dung-luong.them-moi-mau-ajax')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "mau_sac": mauSac
                },
                success: function (response) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: `Thêm màu ${mauSac} thành công!`,
                        showConfirmButton: true,
                        timer: 3000
                    });
                    $('#mau-sac').val("");
                    $("#error-mau-sac").text("");
                },
                error: function (xhr, status, error) {
                    $("#error-mau-sac").text(xhr.responseJSON.message);
                }
            });

            
        });

        $('#save-size').click(function() {
            var dungLuong=$('#dung-luong').val();
        //     $.ajax({
        //             method: "POST",
        //             url: "{{route('mau-dung-luong.them-moi-dung-luong-ajax')}}",
        //             data: {
        //                 "_token":"{{ csrf_token() }}",
        //                 "dung_luong":dungLuong
        //             },
                    
                    

        //         })
        //         .done(function(response) {
        //             Swal.fire({
        //                         position: 'center',
        //                         icon: 'success',
        //                         title: `Thêm dung lượng ${dungLuong} thành công!`,
        //                         showConfirmButton: true,
        //                         timer: 3000
        //                     });
        //                     $('#dung-luong').val("");
        //         });
        // });
        $.ajax({
            method: 'POST',
            url: "{{route('mau-dung-luong.them-moi-dung-luong-ajax')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "dung_luong": dungLuong
            },
            success: function (response) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: `Thêm dung lượng ${dungLuong} thành công!`,
                    showConfirmButton: true,
                    timer: 3000
                });
                $('#dung-luong').val("");
                $("#error-dung-luong").text("");
            },
            error: function (xhr, status, error) {
                $("#error-dung-luong").text(xhr.responseJSON.message);
            }
        });
    });
    })

</script>
@endsection