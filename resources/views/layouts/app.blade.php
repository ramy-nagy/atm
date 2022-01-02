<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- :class="{ 'theme-dark': dark }" x-data="data()" --}}

<head>
  <!-- Primary Meta Tags -->
  <meta name="robots" content="INDEX,FOLLOW">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>ATM - {{ \Request::route()->getName() }}</title>

  <meta name="googlebot" content="index,follow">
  <meta name="author" content="ramy-nagy">
  <meta name='description' content='a doorway for all atm Misr employees to access their day-to-day needst.'>
  <meta name='keywords' content='atm, atm egypt, atm Misr'>
  <link rel="canonical" href="https://atm.com"><!-- Canonical SEO -->

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://atm.com">
  <meta property="og:title" content="I atm - Dashboard">
  <meta property="og:description" content='a doorway for all atm Misr employees to access their day-to-day needst.'>
  <meta name='og:image' content="{{asset('assets/images/logo.jpg')}}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://atm.com">
  <meta property="twitter:title" content="I atm - Dashboard">
  <meta property="twitter:description"
    content="a doorway for all atm Misr employees to access their day-to-day needst.">
  <meta property="twitter:image" content="{{asset('assets/images/logo.jpg')}}">

  <!-- Favicons -->
  <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">

  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <!-- Fonts -->
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" rel="preload" type="text/css" as="style" onload="this.rel='stylesheet'"
    href="{{ asset('assets/vendor/aos/aos.css') }}"><!-- aos -->
  <link rel="stylesheet" rel="preload" type="text/css" as="style" onload="this.rel='stylesheet'"
    href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}"><!-- aos -->
  <link rel="stylesheet" rel="preload" type="text/css" as="style" onload="this.rel='stylesheet'"
    href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"><!-- aos -->
  <link rel="stylesheet" rel="preload" type="text/css" as="style" onload="this.rel='stylesheet'"
    href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}"><!-- aos -->
  <link rel="stylesheet" rel="preload" type="text/css" as="style" onload="this.rel='stylesheet'"
    href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}"><!-- aos -->
  <link rel="stylesheet" rel="preload" type="text/css" as="style" onload="this.rel='stylesheet'"
    href="{{ asset('assets/vendor/remixicon/remixicon.css') }}"><!-- aos -->
  <link rel="stylesheet" rel="preload" type="text/css" as="style" onload="this.rel='stylesheet'"
    href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}"><!-- aos -->
  <link rel="stylesheet" rel="preload" type="text/css" as="style" onload="this.rel='stylesheet'"
    href="{{ asset('assets/vendor/notyf/notyf.min.css') }}"><!-- notyf -->
  <!-- Template Main CSS File -->
  <link rel="stylesheet" rel="preload" type="text/css" as="style" onload="this.rel='stylesheet'"
    href="{{ asset('assets/css/style.css') }}"><!-- aos -->
    @livewireStyles

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ url('/')}}">ATM</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          @if (Route::has('login'))
          @auth
          <li class="dropdown active"><a href="#"><span>{{ Auth::user()->name ?? '' }}</span>
              <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">{{ __('ID') }} : <span>{{ Auth::user()->account_id ?? '' }}</span></a></li>
              <li><a href="#">{{ __('Role') }} : <span>{{ Auth::user()->role ?? '' }}</span></a></li>
              <li><a onclick="event.preventDefault(); document.getElementById('logout').submit();"
                  href="{{route('logout')}}">{{ __('Log Out') }}</a></li>
            </ul>
          </li>
          @else
          <li><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
          @if (Route::has('register'))
          <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
          @endif
          @endauth
          @endif

          <form method="POST" id="logout" action="{{ route('logout') }}">
            @csrf
          </form>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
          data-aos="fade-up" data-aos-delay="200">
          @auth <h1 class="mb-4">Welcome {{ Auth::user()->name ?? ''}} </h1>

          @if(Auth::user()->role == 'user')
          {{ $slot }}
          @endif
          @else
          {{ $slot }}
          @endauth
          @auth
          @if(Auth::user()->role == 'admin' && \Request::route()->getName() == 'home' )
            {{ $slot }}
          @endif
        @endauth
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Cliens Section ======= -->
    <section id="cliens" class="cliens section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/clients/client-1.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Cliens Section -->
    @auth
      @if(Auth::user()->role == 'admin' && \Request::route()->getName() <> 'home' )
        {{ $slot }}
      @endif
    @endauth

  </main><!-- End #main -->
  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        © Copyright <strong><span>ATM</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="/">ATM</a> Team
      </div>
    </div>
  </footer>
  @stack('Modal')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/vendor/notyf/notyf.min.js') }}"></script><!-- notyf -->
  @stack('scripts')
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  @livewireScripts


  @if(session('message'))
  <script>
    document.addEventListener("DOMContentLoaded", function() {
            const message = "{{ session('message')}}";
            const type = "{{ session('type') }}";
            var notyf = new Notyf();
            notyf.open({duration: 5000, type:type,
                position: {x: 'right', y: 'top',},
                message});
        });
  </script>
  @endif
  @if ($errors->any())
  @foreach ($errors->all() as $error)
  <script>
    document.addEventListener("DOMContentLoaded", function() {
            const message = "{{ $error }}";
            const type = "error";
            var notyf = new Notyf();
            notyf.open({duration: 5000, type:type,
                position: {x: 'right', y: 'top',},
                message});
        });
  </script>
  @endforeach
  @endif

</body>

</html>