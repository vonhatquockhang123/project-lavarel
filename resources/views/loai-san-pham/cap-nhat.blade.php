@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT LOẠI SẢN PHẨM</h1>
</div>
<form class="container" method="POST" action="{{ route('loai-san-pham.xl-cap-nhat', ['id' => $loaiSanPham->id]) }}">
   @csrf
   <div class="row">
    <div class="col-md-6">
        <label for="ten" class="form-label">Tên:</label>
        <input type="text" class="form-control" name="ten" value="{{$loaiSanPham->ten}}">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="trang_thai" class="form-label">Trạng thái</label>
        <?php if ($loaiSanPham->trang_thai == 1) :?>
        <input type="checkbox" name="trang_thai" checked/>
        <?php else:?>
        <input type="checkbox" name="trang_thai"/>
        <?php endif;?>
    </div>
</div>
    <div class="col-md-2">
    <button type="submit" class="btn btn-primary" class="Luu"><span data-feather="save"></span>Lưu</button>
  </div>

</form>
@endsection