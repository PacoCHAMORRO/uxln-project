@extends('home-theme.master')
@section('title', 'Nuestro Ecosistema')
@section('styles')
    <!-- Bootstrap CSS -->
    <!-- Owl carousel -->
    <link rel="stylesheet" href="{{ asset('home-theme/css/owl.carousel.min2.css') }}">
    <link rel="stylesheet" href="{{ asset('home-theme/css/owl.theme2.css') }}">
    <link rel="stylesheet" href="{{ asset('home-theme/css/magnific-popup2.css') }}">
    <link rel="stylesheet" href="{{ asset('home-theme/css/nivo-lightbox2.css') }}">
    <!-- Animate -->
    <link rel="stylesheet" href="{{ asset('home-theme/css/animate2.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('home-theme/css/main2.css') }}">
    <!-- Responsive Style -->
    <link rel="stylesheet" href="{{ asset('home-theme/css/responsive2.css') }}">
@endsection

@section('content')

<section class="parallax-container" data-parallax-img="home-theme/images/bg-breadcrumbs-about.jpg">
    <div class="parallax-content breadcrumbs-custom context-dark">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-9">
            <h2 class="breadcrumbs-custom-title">Nuestro Ecosistema</h2>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Principal</a></li>
              <li class="active">Nuestro Ecosistema</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
<section class="section section-lg bg-gray-1 bg-gray-1-decor">
    <div class="container">
      <div class="row row-50">
        <div class="col-lg-6">
          <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus officia magnam necessitatibus vitae incidunt</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi minima molestias dolores natus aut dicta. Non corporis, excepturi quae nostrum consequatur officiis, iste modi repellendus, suscipit alias et quo nemo.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="testimonial" class="testimonial section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div id="testimonials" class="owl-carousel wow fadeInUp" data-wow-delay="0.5s">
            <!-- ---------------- ITEM SOLO ----------------- -->
            @foreach ($institutions as $institution)
                <div class="item">
                    <div class="testimonial-item">
                    <div class="img-thumb">
                        <img class="" height="100px" width="100px" src="{{ asset('img') . '/' . $institution->logo }}" alt="Logo">
                    </div>
                    <div class="info">
                        <h2><a href="{{ url('template').'/'.$institution->id }}">{{ $institution->name }}</a></h2>
                    </div>
                    <div class="content">
                        <p class="description">{{ $institution->description }}</p>
                    </div>
                    </div>
                </div>
            @endforeach
            <!-- --------------------------------- -->
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('carousel-scripts')
    <script src="{{ asset('home-theme/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('home-theme/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('home-theme/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('home-theme/js/main.js') }}"></script>
@endsection