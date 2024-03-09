@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>CẬP NHẬT LOGO</h4>
</div>
<form method="POST" action="{{ route('logo.xl-cap-nhat',['id'=>$loGo->id]) }}" class="container" id="add" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-md-6">
        <label class="form-label">Ảnh:</label><br>
        <img class="img_logo" src="{{asset($loGo->img_url)}}"/>
       
    </div>
</div>

<div class=row>
    <div class="col-md-6">
        <label for="hinh_anh" class="form-label">Chọn logo:</label>
        <input type="file" name="hinh_anh"/>
    </div>
</div>
<div class="col-md-2">
    <button type="submit" class="btn btn-primary"><span data-feather="save"></span>Lưu</button>
  </div>
</form>
@endsection

@section('page-js')
<script type="text/javascript">
    $(document).ready(function(){

       
        
    })
</script>
@endsection