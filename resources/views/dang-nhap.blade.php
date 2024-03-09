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
  <form method="POST" action="{{ route('xl-dang-nhap') }}" class="login">
    @csrf
    <div class="hop-dieu-chinh align-items-center mb-3 pb-1">
      <img id="logo-dang-nhap" src="{{$loGo->img_url ?? null}}" alt="logo">
    </div>
    <div class="form-outline mb-4">
      <label class="form-label" for="form2Example17">Tên tài khoản:</label>
      <input type="text" id="form2Example17" name="ten_dang_nhap" class="form-control form-control-lg" value="{{session('user_name') ?? ''}}">
      @if(session('empty_username'))
      <span class="error-message">
        {{ session('empty_username') }}
      </span>
      @endif
    </div>
    <div class="form-outline mb-4">
      <label class="form-label" for="form2Example27">Mật khẩu:</label>
      <input type="password" id="form2Example27" name="password" class="form-control form-control-lg">
      @if(session('error-login'))
      <span class="error-message">
        {{ session('error-login') }}
      </span>
      @endif
    </div>
    <a class="small text-muted" href="#">Forgot password?</a>
    <div class="pt-1 mb-4">
      <button class="btn btn-dark btn-lg btn-block" type="submit">Đăng nhập</button>
    </div>
    
  </form>
  <script src="{{ asset('sweetalert2/sweetalert2.all.min.js')}}"></script>
  <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
  <!-- @if(session('error'))
<script>
        Swal.fire({
        position: 'center',
        icon: 'error',
        title: "{{session('error')}}",
        showConfirmButton: true,
        timer: 6000
        })
    </script>
@endif -->
</body>

</html>