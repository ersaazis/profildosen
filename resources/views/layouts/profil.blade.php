<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/uin-128x128.png" type="image/x-icon">

  <meta name="description" content="{{ App\WebConfig::find('webName')->value }}">
  <meta name="keywords" content="{{ App\WebConfig::find('webKeywords')->value }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>{{ App\WebConfig::find('webName')->value }} - {{ App\WebConfig::find('webSub')->value }}</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin">
  <link rel="stylesheet" href="{{ asset('assets/tether/tether.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/soundcloud-plugin/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dropdown/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/animate.css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/theme/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/mobirise/css/mbr-additional.css') }}" type="text/css">  
  
</head>
<body>
  <section id="menu-0" data-rv-view="13">
    <nav class="navbar navbar-dropdown transparent bg-color">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="{{ url('/') }}" class="navbar-logo"><img src="{{asset('assets/images/uin-128x128.png')}}" alt="Mobirise"></a>
                        <a class="navbar-caption" href="{{ url('/') }}">{{ App\WebConfig::find('webName')->value }}</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        <li class="nav-item">
                          <a class="nav-link link" href="{{ url('profil-uin') }}">TENTANG UIN </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link link" href="{{ url('dosen') }}">DOSEN </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link link" href="{{ url('programstudi') }}">PROGRAM STUDI </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link link" href="#"data-toggle="modal" data-target="#search">SEARCH </a>
                        </li>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                          <li class="nav-item">
                            <a class="nav-link link link" href="{{ route('homeUser') }}">DASHBOARD </a>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link link link dropdown-toggle" data-toggle="dropdown-submenu" href="#">{{ strtoupper(Auth::user()->name) }} </a>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                              </form>
                            </div>
                          </li>
                        @endguest
                    </ul>

                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>
        </div>
    </nav>
  </section>

    @yield('content')

  <section class="mbr-section mbr-section-md-padding mbr-footer footer1 mbr-parallax-background" id="contacts1-3" data-rv-view="21" style="background-image: url(assets/images/180803223141-diter-800x450.jpg); padding-top: 90px; padding-bottom: 90px;">
    <div class="mbr-overlay" style="background-color: rgb(60, 60, 60); opacity: 0.8;"></div>
    <div class="container">
        <div class="row">
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <div><img src="{{asset('assets/images/uin-128x128.png')}}"></div>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Alamat</strong><br>Jl. A.H. Nasution No.105, Cipadung, Cibiru, Kota Bandung, Jawa Barat 40614<br></p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                            

            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Website</strong><br>
                <a class="text-primary" href="https://uinsgd.ac.id/">UIN Sunan Gunung Djati Bandung</a><br>
                <a class="text-primary" href="https://simak.uinsgd.ac.id">Portal Akademik</a><br>
                <a class="text-primary" href="https://pmb.uinsgd.ac.id/">PMB UIN SGD Bandung</a></p>
            </div>
        </div>
    </div>
</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-m" data-rv-view="205" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
    <div class="container text-xs-center">
        <p>Copyright (c) 2018.</p>
    </div>
</footer>

<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Search</h5>
      </div>
        <div class="modal-body">
          <form action="{{ url('search') }}" method="POST">
            @csrf
            <select  class="form-control form-control-sm" name="type" id="">
              <option value="dosen">Dosen</option>
              <option value="programstudi">Program Studi</option>
            </select>
            <input class="form-control form-control-sm" type="search" placeholder="Search" name="search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      </div>
    </div>
  </div>
</div>

  <script src="{{ asset('assets/web/assets/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/tether/tether.min.js') }}"></script>
  <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/jarallax/jarallax.js') }}"></script>
  <script src="{{ asset('assets/jquery-mb-ytplayer/jquery.mb.ytplayer.min.js') }}"></script>
  <script src="{{ asset('assets/dropdown/js/script.min.js') }}"></script>
  <script src="{{ asset('assets/touch-swipe/jquery.touch-swipe.min.js') }}"></script>
  <script src="{{ asset('assets/viewport-checker/jquery.viewportchecker.js') }}"></script>
  <script src="{{ asset('assets/smooth-scroll/smooth-scroll.js') }}"></script>
  <script src="{{ asset('assets/theme/js/script.js') }}"></script>
  </body>
</html>