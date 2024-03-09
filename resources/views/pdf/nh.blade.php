<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            font-family: DejaVu Sans,sans-serif;
            
        }
        .table{
            width: 100%;
            margin-bottom: 1rem;
            text-align: center;
            
        }
        th,td{
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h3 style="text-align: center;">Hóa đơn nhập hàng</h3>
    <h5>Công ty: {{$phieuNhap->nha_cung_cap->ten}}</h5>
    <h5>Mã hóa đơn:{{$phieuNhap->id}} </h5> 
    <h5>Ngày tạo:{{$phieuNhap->ngay_nhap}}</h5>
    <div class="bd-example">
        <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá nhập</th>
                    <th>Giá bán</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dsCTPhieuNhap as $cthd)
                <tr>
                    <td>{{ $cthd->san_pham->ten }}</td>
                    <td>{{ $cthd->so_luong }}</td>
                    <td>{{ $cthd->gia_nhap_formatted }} VND</td>
                    <td>{{ $cthd->gia_ban_formatted }} VND</td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        <span style="margin-left:60%">Thành tiền: {{ $phieuNhap->tong_tien_formatted }} VND</span>
    </div>
</body>
</html>