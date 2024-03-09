
<div class="table-responsive">
    <table class="table table-striped table-sm" id="mau-dung-luong">
        <thead>
            <tr>
                <th>Id</th>
                <th>Dung lượng</th>
            </tr>  
        </thead>
        <tbody>
        @foreach($dsDungLuong as $dungLuong)
        <tr>  
            <td>    
                {{ $dungLuong->id }}
            </td>
            <td>    
                {{ $dungLuong->ten }} GB
            </td>
            <td class="chuc-nang">
                <a href="{{route('mau-dung-luong.dung-luong.xoa',['id'=> $dungLuong->id])}}" class="btn btn-outline-danger">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>