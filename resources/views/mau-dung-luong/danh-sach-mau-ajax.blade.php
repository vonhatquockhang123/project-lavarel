


<div class="table-responsive">
    <table class="table table-striped table-sm" id="mau-dung-luong">
        <thead>
            <tr>
                <th>Id</th>
                <th>Màu sắc</th>
            </tr>  
        </thead>
        @foreach($dsMauSac as $mauSac)
        <tr>  
            <td>    
                {{ $mauSac->id }}
            </td>
            <td>    
                {{ $mauSac->ten }}
            </td>
            <td class="chuc-nang">
                <a href="{{route('mau-dung-luong.mau.xoa', ['id'=>$mauSac->id])}}" class="btn btn-outline-danger">Xóa</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>