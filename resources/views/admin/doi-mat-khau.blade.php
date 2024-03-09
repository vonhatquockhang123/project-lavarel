
@extends('master')


@section('content')




@if(session('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div> 
              {{session('error')}}
        </div>
    </div>
@endif
<body>
    <form method="POST" action="{{route('xl-doi-mat-khau')}}" class="reset_password">
  @csrf
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Thay đổi mật khẩu</h4>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Nhập mật khẩu cũ:</label>
    <input type="password" class="form-control" name="password" required>
  </div>
  <div class="mb-3">
    <label for="respassword" class="form-label">Nhập mật khẩu mới:</label>
    <input type="password" class="form-control" name="respassword" required>
  </div>
  <button type="submit" class="btn btn-primary" ><span data-feather="save"></span>Lưu</button>
</form>
</body>
@endsection