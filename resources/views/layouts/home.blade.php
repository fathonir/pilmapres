<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>PILMAPRES 2020</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="/front/img/vavicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
          rel="stylesheet">

    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta property="og:type" content="@yield('type')"/>
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" name="description" content="@yield('fb_description')"/>
    <meta property="og:image:url" content="@yield('image')"/>
    <meta property="og:image" content="@yield('image')"/>

    <meta property="og:url" content="@yield('url')"/>
    <meta property="og:image:type" content="image/jpeg"/>
    <meta property="og:image:width" content="650"/>
    <meta property="og:image:height" content="366"/>
    <meta name="description" content="@yield('description')"/>
    <meta content="@yield('description')" itemprop="headline"/>

    <meta name="thumbnailUrl" content="@yield('thumbs')" itemprop="thumbnailUrl"/>
    <meta property="og:site_name" content="CMYK"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image:title" content="@yield('titletwit')"/>
    <meta name="twitter:description" content="@yield('description')"/>
    <meta name="twitter:image:src" content="@yield('imagetwit')"/>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Arimo:300,400,700,400italic,700italic'/>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
    <!-- Font Awesome Icons -->
    {!! Html::style('/front/css/font-awesome.min.css') !!}
    <!-- Bootstrap core CSS -->
    {!! Html::style('/front/css/bootstrap.min.css') !!}
    {!! Html::style('/front/css/hover-dropdown-menu.css') !!}
    <!-- Icomoon Icons -->
    {!! Html::style('/front/css/icons.css') !!}
    <!-- Revolution Slider -->
    {!! Html::style('/front/css/revolution-slider.css') !!}
    {!! Html::style('/front/rs-plugin/css/settings.css') !!}
    <!-- Animations -->
    {!! Html::style('/front/css/animate.min.css') !!}
    <!-- Owl Carousel Slider -->
    {!! Html::style('/front/css/owl/owl.carousel.css') !!}
    {!! Html::style('/front/css/owl/owl.theme.css') !!}
    {!! Html::style('/front/css/owl/owl.transitions.css') !!}
    <!-- PrettyPhoto Popup -->
    {!! Html::style('/front/css/prettyPhoto.css') !!}
    <!-- Custom Style -->
    {!! Html::style('/front/css/style.css') !!}
    <!-- Color Scheme -->
    {!! Html::style('/front/css/responsive.css') !!}
    {!! Html::style('/front/css/color.css') !!}
    {!! Html::style('/front/css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('css/sweetalert.css') !!}
    {!! Html::script('js/sweetalert.min.js') !!}
    @yield('head')
</head>
<body>
<div id="page">
    <!-- Page Loader -->
    <div id="pageloader">
        <div class="loader-item fa fa-spin text-color">
        </div>
    </div>

    <div id="top-bar" class="top-bar-section top-bar-bg-color">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Top Contact -->
                    <div class="top-contact link-hover-black hidden-xs">
                        <a href="https://www.kemdikbud.go.id/"><b>Kementerian Pendidikan dan Kebudayaan</b></a>
                    </div>
                    <!-- Top Social Icon -->
                    <div class="top-social-icon icons-hover-black">
                        <a href="https://www.facebook.com/puspresnas.puspresnas.1"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/puspresnas"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.instagram.com/puspresnas/"><i class="fa fa-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UC-NYR136dYUJLsSiWRfLNKA"><i class="fa fa-youtube"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Sticky Navbar -->
    <header id="sticker" class="sticky-navigation">
        <!-- Sticky Menu -->
        <div class="sticky-menu relative">
            <!-- navbar -->
            <div class="navbar navbar-default navbar-bg-light" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <!-- Button For Responsive toggle -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span></button>
                                <!-- Logo -->

                                <a class="navbar-brand hidden-xs" href="/home">
                                    <img class="site_logo" alt="Site Logo" src="/front/img/FAI.png"
                                         style="width: 257px;">
                                </a>
                                <a class="navbar-brand visible-xs" href="/home">
                                    <img class="site_logo" alt="Site Logo" src="/front/img/FAI.png"
                                         style="width: 240px;">
                                </a>
                            </div>
                            <!-- Navbar Collapse -->
                            <div class="navbar-collapse collapse">
                                <!-- nav -->
                                <ul class="nav navbar-nav">
                                    <!-- Home  Mega Menu -->
                                    <!-- <li class="mega-menu">
                                      <a href="/home">Home</a>
                                    </li> -->
                                    <!-- Mega Menu Ends -->
                                    <!-- Pages Mega Menu -->
                                    <li class="has-submenu">
                                        <!-- <a href="#"></a> -->
                                        <ul class="dropdown-menu sm-nowrap">
                                            <li>
                                                <!-- Home Mage Menu grids Begins -->
                                                <div class="page-links">
                                                    <div>
                                                        <a href="about-us.html">Sambutan Dekan</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- Pages Menu Ends -->
                                    <!-- Portfolio Menu -->
                                    <li>
                                        <a href="{{ URL::to('/') }}">Halaman Depan</a>
                                    </li>
                                    <li>
                                        <a href="https://pilmapres.kemdikbud.go.id/cbt" target="_blank"
                                           style="font-size: 18px; color: green; font-weight: bold; border: 2px dashed green; border-radius: 5px">
                                            Halaman CBT
                                        </a>
                                    </li>
                                    @guest
                                        <li><a href="{{ route('register-peserta.index') }}">Registrasi</a></li>
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    @else
                                        <li>
                                            <a href="#">
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    @if (Auth::user()->hasUserGroup->group->name == "Peserta")
                                                        <a href="/mahasiswa/home">
                                                            Halaman Peserta
                                                        </a>
                                                    @elseif (Auth::user()->hasUserGroup->group->name == "Admin Master")
                                                        <a href="/admin">
                                                            Halaman Admin
                                                        </a>
                                                    @endif
                                                </li>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                          style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endguest
                                    <li>
                                    </li>
                                    <!-- Ends Header Block -->
                                    <!-- Footer Block -->
                                </ul>
                                <!-- Right nav -->
                                <!-- Header Contact Content -->
                                <div class="bg-white hide-show-content no-display header-contact-content">
                                    <p class="vertically-absolute-middle">Call Us
                                        <strong>126</strong></p>
                                    <button class="close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- Header Contact Content -->
                                <!-- Header Search Content -->
                                <div class="bg-white hide-show-content no-display header-search-content">
                                    <form role="search" class="navbar-form vertically-absolute-middle">
                                        <div class="form-group">
                                            <input type="text" placeholder="Enter your text &amp; Search Here"
                                                   class="form-control" id="s" name="s" value=""/>
                                        </div>
                                    </form>
                                    <button class="close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- Header Search Content -->
                                <!-- Header Share Content -->
                                <div class="bg-white hide-show-content no-display header-share-content">
                                    <div class="vertically-absolute-middle social-icon gray-bg icons-circle i-3x">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-google"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a></div>
                                    <button class="close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- Header Share Content -->
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- navbar -->
        </div>
        <!-- Sticky Menu -->
    </header>
    @yield('content')

    <footer id="footer">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 widget bottom-xs-pad-20">
                        <a><img src="/front/img/FAI.png"></a>
                        <p><strong>PUSAT PRESTASI NASIONAL</strong></p>
                        <p>Jalan Jenderal Sudirman Pintu Satu, Senayan, Jakarta 10270</p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 widget bottom-xs-pad-20">
                        <div class="widget-title">
                            <!-- Title -->
                            <h3 class="title" align="center">Hubungi Kami</h3>
                        </div>
                        <p align="center"></p>
                        <h5><strong><span class="fa fa-phone"></span> | (021) 5731177</strong></h5>
                        <h5><strong><span class="fa fa-envelope"></span> | <a
                                        href="mailto:dikti.puspresnas@kemdikbud.go.id">dikti.puspresnas@kemdikbud.go.id</a></strong>
                        </h5>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 widget newsletter bottom-xs-pad-20">
                        <div class="widget-title">
                            <h3 class="title" align="center">Sosial Media</h3>
                        </div>
                        <div class="social-icon gray-bg icons-circle i-5x" align="center">
                            <a href="https://www.facebook.com/puspresnas.puspresnas.1"><i
                                        class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/puspresnas"><i href="#" class="fa fa-twitter"></i></a>
                            <a href="https://www.instagram.com/puspresnas/"><i href="#" class="fa fa-instagram"></i>
                            </a>
                            <a href="https://www.youtube.com/channel/UC-NYR136dYUJLsSiWRfLNKA"><i href="#"
                                                                                                  class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                    <!-- .newsletter -->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="footer2">
                    <div class="col-md-4">
                        <a href="https://www.kemdikbud.go.id/"><img src="/front/img/ftrlogo.png"
                                                                    style="width: 70%; margin-left: 25px;"></a>
                    </div>
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-1">
                        <div class="col-xs-2  col-sm-6 col-md-6 text-right page-scroll gray-bg icons-circle i-3x">
                            <!-- Goto Top -->
                            <a href="#page">
                                <i class="glyphicon glyphicon-arrow-up i-4x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom -->
    </footer>
</div>

<!-- Scripts -->
{!! Html::script('/front/js/jquery.min.js') !!}
{!! Html::script('/front/js/bootstrap.min.js') !!}
<!-- Menu jQuery plugin -->
{!! Html::script('/front/js/hover-dropdown-menu.js') !!}
<!-- Menu jQuery Bootstrap Addon -->
{!! Html::script('/front/js/jquery.hover-dropdown-menu-addon.js') !!}
<!-- Scroll Top Menu -->
{!! Html::script('/front/js/jquery.easing.1.3.js') !!}
<!-- Sticky Menu -->
{!! Html::script('/front/js/jquery.sticky.js') !!}
<!-- Bootstrap Validation -->
{!! Html::script('/front/js/bootstrapValidator.min.js') !!}
<!-- Revolution Slider -->
{!! Html::script('/front/rs-plugin/js/jquery.themepunch.tools.min.js') !!}
{!! Html::script('/front/rs-plugin/js/jquery.themepunch.revolution.min.js') !!}
{!! Html::script('/front/js/revolution-custom.js') !!}
<!-- Portfolio Filter -->
{!! Html::script('/front/js/jquery.mixitup.min.js') !!}
<!-- Animations -->
{!! Html::script('/front/js/jquery.appear.js') !!}
{!! Html::script('/front/js/effect.js') !!}
<!-- Owl Carousel Slider -->
{!! Html::script('/front/js/owl.carousel.min.js') !!}
<!-- Pretty Photo Popup -->
{!! Html::script('/front/js/jquery.prettyPhoto.js') !!}
<!-- Parallax BG -->
{!! Html::script('/front/js/jquery.parallax-1.1.3.js') !!}
<!-- Fun Factor / Counter -->
{!! Html::script('/front/js/jquery.countTo.js') !!}
<!-- Twitter Feed -->
{!! Html::script('/front/js/tweet/carousel.js') !!}
{!! Html::script('/front/js/tweet/scripts.js') !!}
{!! Html::script('/front/js/tweet/tweetie.min.js') !!}
{!! Html::script('/front/js/moment.js') !!}
{!! Html::script('/front/js/bootstrap-datetimepicker.min.js') !!}
<!-- Background Video -->
{!! Html::script('/front/js/jquery.mb.YTPlayer.js') !!}
<!-- Custom Js Code -->
{!! Html::script('/front/js/custom.js') !!}
<!-- Scripts -->
@yield('js')
</body>
</html>