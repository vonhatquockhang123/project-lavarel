<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Quản lý đơn hàng</title>
    <link href="{{ asset('bootstrap-5.2.3/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('sweetalert2/sweetalert2.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('custom.css') }}" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow" id="header-navbar">
<img src="{{asset($logoUrl->img_url??null)}}" id="logo"/>
    <div class="navbar_collapse">
        <div class="bell-mail">
        <div class="dropdown bell" id="bell">
            <a data-feather="bell">
                <a class="text-reset me-3 dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
            </a>

            <ul class="dropdown-menu dropdown-menu-end" id="dropdown-bell" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a aria-current="page" class="dropdown-item active" href="#">Some news</a>
                    </li>
                    <li>
                        <a aria-current="page" class="dropdown-item active" href="#">Another news</a>
                    </li>
                    <li><a aria-current="page" class="dropdown-item active" href="#">Something else here</a>
                    </li>
            </ul>
        </div>

            <a data-feather="mail"></a>

            <div class="dropdown info" id="dropdown-avatar">
                <div class="dropdown-toggle d-flex align-items-center" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset(Auth::user()->avatar_url)}}" class="rounded-circle" />
                </div>
                <span class="admin">{{Auth::user()->username}}</span>
                <ul class="dropdown-menu" id="dropdown-menu" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item" href="{{route('thong-tin')}}"><span data-feather="archive"></span>Thông tin cá nhân</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('dang-xuat')}}"><span data-feather="log-out"></span>Đăng xuất</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky sidebar-sticky">
                    <ul class="nav flex-column">
                        <li>
                            <h3>Menu</h3>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('thong-ke')}}">
                                <span data-feather="trending-up" class="align-text-bottom"></span>
                                Thống kê
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('nhan-vien.danh-sach')}}">
                                <span data-feather="smile" class="align-text-bottom"></span>
                                Quản lý nhân viên
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('khach-hang.danh-sach')}}">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Quản lý khách hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('san-pham.danh-sach')}}">
                                <span data-feather="briefcase" class="align-text-bottom"></span>
                                Quản lý sản phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('loai-san-pham.danh-sach')}}">
                                <span data-feather="box" class="align-text-bottom"></span>
                                Quản lý loại sản phẩm
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('nha-cung-cap.danh-sach')}}">
                                <span data-feather="truck" class="align-text-bottom"></span>
                                Quản lý nhà cung cấp
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('nhap-hang.danh-sach')}}">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Quản lý kho
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('hoa-don.danh-sach')}}">
                                <span data-feather="shopping-bag" class="align-text-bottom"></span>
                                Quản lý hóa đơn
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('mau-dung-luong.danh-sach')}}">
                                <span data-feather="battery-charging" class="align-text-bottom"></span>
                                Quản lý dung lượng và màu sắc
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('binh-luan.danh-sach')}}">
                                <span data-feather="message-square" class="align-text-bottom"></span>
                                Quản lý bình luận
                                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('slides.danh-sach')}}">
                                <span data-feather="file-plus" class="align-text-bottom"></span>
                                Quản lý slideshow
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </nav>




           
  <!-- <div class="container-fluid">
   
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div> -->





            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="{{ asset('bootstrap-5.2.3/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('bootstrap-5.2.3/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="{{ asset('main.js') }}"></script>
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @yield('page-sw')

    @yield('page-js')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dropdown-avatar').click(function(event) {
                event.stopPropagation();
                $('#dropdown-menu').toggle();
                $('#dropdown-bell').hide();
            });

            $('#bell').click(function(event) {
                event.stopPropagation();
                $('#dropdown-bell').toggle();
                $('#dropdown-menu').hide(); 
            });

            $('html').click(function() {
                $('#dropdown-menu').hide();
                $('#dropdown-bell').hide();
            });
        });
    </script>
</body>

</html>