@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>CẬP NHẬT SLIDESHOW</h4>
</div>
<form method="POST" action="{{ route('slides.xl-cap-nhat',['id'=>$silDe->id]) }}" class="container" id="add" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-md-6">
        <label class="form-label">Ảnh:</label><br>
        <img class="img_slide" src="{{asset($silDe->img_url)}}"/>
        @error('hinh_anh')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="tieu_de" class="form-label">Tên tiêu đề:</label>
        <input type="text" class="form-control" name="tieu_de" id="tieu-de" value="{{$silDe->tieu_de}}">
        <span id="tieu_de_error" class="error-message"></span>
        @error('tieu_de')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

</div>

<div class=row>
    <div class="col-md-6">
        <label for="hinh_anh" class="form-label">Chọn slide:</label>
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