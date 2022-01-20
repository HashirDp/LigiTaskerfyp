<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LigiTasker</title>

  <!-- FAVICON -->
  <link href="{{('images/icon.png')}}" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap-slider.css')}}">
  <!-- Font Awesome -->
  <link href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="{{asset('plugins/slick-carousel/slick/slick.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/slick-carousel/slick/slick-theme.css')}}" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="{{asset('plugins/fancybox/jquery.fancybox.pack.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
@livewireStyles
</head>

<body class="body-wrapper">

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation">
                        <a class="navbar-brand" href="/">
                            <img src="{{asset('images/logo.png')}}" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link "  href="{{route('home.service_categories')}}">All Services Categories</a><i class=""></i></span>
                                    </a>

                                    <!-- Dropdown list -->

                                </li>
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" href="{{route('home.about_us')}}">
                                        About Us <span><i class=""></i></span>
                                    </a>
                                    <!-- Dropdown list -->


                                </li>

                            @if(Route::has('login'))

                            @auth

                            @if(Auth::user()->utype === 'ADM')


                            <li  class="nav-item dropdown dropdown-slide">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                                    My Account (Admin)<span><i class="fa fa-angle-down"></i></span>
                                </a>
                            <div class="dropdown-menu">
                            <!-- <a class="dropdown-item" href="{{route('/admin/dashboard')}}">Dashboard</a> -->
                            <a class="dropdown-item" href="{{route('/admin/service_categories')}}">Service Categories</a>
                            <a class="dropdown-item" href="{{route('/admin/all_services')}}">All Services Categories</a>
                            <a class="dropdown-item" href="{{route('/admin/slider')}}">Manage Slider</a>
                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </div>
                            </li>


                                @elseif(Auth::user()->utype === 'SVP')

                            <li class="nav-item dropdown dropdown-slide"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                                My Account ({{Auth::user()->name}})<span><i class="fa fa-angle-down"></i></span>
                            </a>
                                <div class="dropdown-menu">
                            <!-- <a class="dropdown-item" href="{{route('/sprovider/dashboard')}}">Dashboard</a> -->
                            <a class="dropdown-item" href="{{route('/sprovider/all_services')}}">Services</a>
                            <a class="dropdown-item" href="{{route('sprovider.orders')}}">Order</a>

                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </div>
                            </li>
                                @else

                                <li class="nav-item dropdown dropdown-slide"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                                    My Account({{Auth::user()->name}})<span><i class="fa fa-angle-down"></i></span>
                                </a>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('customer.orders')}}">Order</a>

                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </div>
                        </li>

                                    @endif
                                <li class="nav-item">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf



                                        </form>
                                        </li>
                                        @else
                            <a class="nav-link login-button" href="{{route('login')}}">Login</a>
                            <a class="nav-link text-white add-button" href="{{route('register')}}"><i class="fa fa-plus-circle"></i> Register </a>
                            @endif
                            @endif
                        </div>
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>

<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <img src="{{asset('images/logo-footer.png')}}" alt="">
          <!-- description -->
          <p class="alt-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 offset-lg-1 col-md-3">
        <div class="block">
          <h4>Site Pages</h4>
          <ul>
            <li><a href="#">Boston</a></li>
            <li><a href="#">How It works</a></li>
            <li><a href="#">Deals & Coupons</a></li>
            <li><a href="#">Articls & Tips</a></li>
            <li><a href="terms-condition.html">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
        <div class="block">
          <h4>Admin Pages</h4>
          <ul>
            <li><a href="category.html">Category</a></li>
            <li><a href="single.html">Single Page</a></li>
            <li><a href="store.html">Store Single</a></li>
            <li><a href="single-blog.html">Single Post</a>
            </li>
            <li><a href="blog.html">Blog</a></li>



          </ul>
        </div>
      </div>
      <!-- Promotion -->
      <div class="col-lg-4 col-md-7">
        <!-- App promotion -->
        <div class="block-2 app-promotion">
          <div class="mobile d-flex">
            <a href="">
              <!-- Icon -->
              <img src="{{asset('images/footer/phone-icon.png')}}" alt="mobile-icon">
            </a>
            <p>Get the Dealsy Mobile App and Save more</p>
          </div>
          <div class="download-btn d-flex my-3">
            <a href="#"><img src="{{asset('images/apps/google-play-store.png')}}" class="img-fluid" alt=""></a>
            <a href="#" class=" ml-3"><img src="{{asset('images/apps/apple-app-store.png')}}" class="img-fluid" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-12">
        <!-- Copyright -->
        <div class="copyright">
          <p>Copyright © <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script>. All Rights Reserved, theme by <a class="text-primary" href="https://themefisher.com" target="_blank">themefisher.com</a></p>
        </div>
      </div>
      <div class="col-sm-6 col-12">
        <!-- Social Icons -->
        <ul class="social-media-icons text-right">
          <li><a class="fa fa-facebook" href="https://www.facebook.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-twitter" href="https://www.twitter.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-pinterest-p" href="https://www.pinterest.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-vimeo" href=""></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

<!-- JAVASCRIPTS -->
<script src="{{asset('plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap-slider.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="{{asset('plugins/google-map/gmap.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>


  <!-- tether js -->
<script src="{{asset('plugins/tether/js/tether.min.js')}}"></script>
<script src="{{asset('plugins/raty/jquery.raty-fa.js')}}"></script>
<script src="{{asset('plugins/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{asset('plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('plugins/smoothscroll/SmoothScroll.min.js')}}"></script>
<!-- google map -->

<script src="{{asset('js/script.js')}}"></script>


@stack('scripts')
@livewireScripts
</body>

</html>



