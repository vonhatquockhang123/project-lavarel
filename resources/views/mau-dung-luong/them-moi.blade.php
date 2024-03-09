@extends('master')

@section('content')
<div id="thong-bao" class="alert alert-danger" style="display: none;"></div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2">Nhập Màu Sắc Và Dung Lượng</h2>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="san_pham" class="form-label">Sản phẩm:</label>
    <select name="san_pham" class="form-select" id="san-pham">
      <option selected disabled>Chọn sản phẩm</option>
      @foreach($dsSanPham as $sanPham)
      <option value="{{$sanPham->id}}">{{$sanPham->ten}}</option>
      @endforeach
    </select>
    <span class="error" id="error-san-pham">Vui lòng chọn sản phẩm!</span>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="mau_sac" class="form-label">Màu sắc:</label>
    <input type="text" class="form-control" name="mau_sac" id="mau-sac">
    @error('mau_sac')
            <span class="error-message">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="dung_luong" class="form-label">Dung lượng:</label>
    <input type="text" class="form-control" name="dung_luong" id="dung-luong">
    @error('dung_luong')
            <span class="error-message">{{ $message }}</span>
    @enderror
  </div>
</div>
<button type="button" id="btn-them" class="btn btn-success"><span data-feather="plus"></span>Thêm</button>
<br>
<form method="POST" action="{{route('mau-dung-luong.xl-them-moi')}}">
  @csrf
  <div class="table-responsive">
    <table class="table table-striped table-sm" id="tb-ds-san-pham">
      <thead>
        <tr>
          <th>STT</th>
          <th>Sản phẩm</th>
          <th>Màu sắc</th>
          <th>Dung lượng</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <input type="hidden" id="sp-id" name="sp" />
  <div class="col-md-2">
    <button type="submit" class="btn btn-primary"><span data-feather="save"></span>Lưu</button>
  </div>
</form>
@endsection

@section('page-js')
<script type="text/javascript">
  $(document).ready(function() {

    $("#btn-them").click(function() {
      var stt = $("#tb-ds-san-pham tbody tr").length + 1;
      var tenSP = $("#san-pham").find(":selected").text();
      var idSP = $("#san-pham").find(":selected").val();
      var mauSac = $("#mau-sac").val();
      var dungLuong = $("#dung-luong").val();
      
      

      if ($("#sp-id").val() === "" || $("#sp-id").val() === "Chọn sản phẩm") {
        $("#error-san-pham").show();
        return;
      } else {
        $("#error-san-pham").hide();
      }

      if (mauSac === "") {
        $("#error-mau-sac").show();
        return;
      } else {
        $("#error-mau-sac").hide();
      }

      if (dungLuong === "") {
        $("#error-dung-luong").show();
        return;
      } else {
        $("#error-dung-luong").hide();
      }

 

      var row = <tr>
      <td>${stt}</td>
      <td>${tenSP}<input type="hidden" name="idSP[]" value="${idSP}"/></td>
      <td>${mauSac}<input type="hidden" name="mauSac[]" value="${mauSac}"/></td>
      <td>${dungLuong}<input type="hidden" name="dungLuong[]" value="${dungLuong}"/></td>
      <td>
        <button type="button" id="btn-xoa">Xóa</button>
      </td>
      </tr>

      $('#tb-ds-san-pham').find('tbody').append(row);
      $("#san-pham").val("Chọn sản phẩm");
      $("#dung-luong").val("");
      $("#mau-sac").val("");
    });

    $('#tb-ds-san-pham').on('click', '#btn-xoa', function() {
      var tr = $(this).closest('tr');
      tr.remove();
    });

    $("#san-pham, #so-luong, #gia-nhap, #gia-ban").change(function() {
      $(`#error-${this.id}`).hide();
    });

    $("#nha-cung-cap").click(function() {
      $("#ncc-id").val(this.value);
    });

    $("#san-pham").click(function() {
      $("#sp-id").val(this.value);
    });

  });
</script>
@endsection