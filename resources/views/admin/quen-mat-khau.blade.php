<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('bootstrap-5.2.3/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('custom.css') }}" rel="stylesheet">
  <link href="{{ asset('css/core.min.css' )}}" rel="stylesheet">
</head>
<body>
    <form method="POST" action="{{route('xl-quen-mat-khau')}}" class="reset_password">
  @csrf
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h5>Quên mật khẩu</h5>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Email:</label>
    <input type="email" class="form-control" name="email" required>
    @error('email')
      <span class="error-message">{{$message}}</span>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary" >Gửi email xác nhận</button>
</form>
</body>
</html>






     