<table class="table hd-ctsp" id='table-hd-ctsp'>
        <thead>
                <tr>
                <th scope="col">Màu sắc</th>
                <th scope="col">Dung lượng</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Số lượng tồn</th>
                <th scope="col">Nhập số lượng mua</th>
                <th scope="col">Chọn mua</th>
                </tr>
        </thead>
        <tbody>
            @foreach($dsSanPham as $sanPham)
            <tr>
                <td id="td-mau-sac">{{$sanPham->mau_sac->ten}}<input type="hidden" value="{{$sanPham->mau_sac->id}}" id="mau-sac-id"/></td>
                <td id="td-dung-luong">{{$sanPham->dung_luong->ten}}<input type="hidden" value="{{$sanPham->dung_luong->id}}" id="dung-luong-id"/></td>
                <td>{{$sanPham->gia_ban}}<input type="hidden" value="{{$sanPham->gia_ban}}" name="gia_ban" id="gia-ban-id"/></td>
                <td>{{$sanPham->so_luong}}</td>
                <td><input type="number" max="{{$sanPham->so_luong}}" min="1" name="so_luong" id='so-luong-ct'/></td>
                <td><input type="checkbox" name="chon_mua" id="chon-mua"></td>
            </tr>
            @endforeach
        </tbody>
</table>