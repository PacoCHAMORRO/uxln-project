<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>UXLN - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="home-theme/images/favicon.png" type="image/x-icon">
    <!--<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900,900i%7CRoboto:400%7CRubik:100,400,700">-->
    <link rel="stylesheet" href="{{ asset('home-theme/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('home-theme/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('home-theme/css/style.css') }}">
    {{-- Carousel files --}}
    @yield('styles')
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <div class="ie-panel"></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Cargando...</p>
      </div>
    </div>
    <div class="page">
      @include('home-theme.navbar')
      
      @section('content')
      @show
      
      <!-- Page Footer-->
      <footer class="section footer-minimal context-dark">
        <div class="container wow-outer">
          <div class="wow fadeIn">
            <div class="row row-50 row-lg-60">
              <div class="col-12"><a href="{{ url('/') }}"><img src="home-theme/images/logo-white-415x103.png" alt="" width="207" height="51"/></a></div>
              <div class="col-12">
                <ul class="footer-minimal-nav">
                  <li><a href="index.html">Principal</a></li>
                  <li><a href="about-us.html">¿Quiénes Somos?</a></li>
                  <li><a href="ecosystem.html">Nuestro Ecosistema</a></li>
                  <li><a href="donation.html">Dona</a></li>
                  <li><a href="contacts.html">Contacto</a></li>
                </ul>
              </div>
              <div class="col-12">
                <ul class="social-list">
                  <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-facebook" href="https://www.facebook.com/Unionporlosninos/" target="_blank"> </a></li>
                  <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-twitter" href="https://twitter.com/Unionxlosninos" target="_blank"></a></li>
                  <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-youtube-play" href="https://www.youtube.com/channel/UCAGqZ3PVBxDZQXYmJUaT17A" target="_blank"></a></li>
                </ul>
              </div>
            </div>
            <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>Derechos Reservados</span></p>
          </div>
        </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="{{ asset('home-theme/js/core.min.js') }}"></script>
    <script src="{{ asset('home-theme/js/script.js') }}"></script>
    @yield('carousel-scripts')
  </body>
</html>