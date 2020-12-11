@extends('home-theme.master')
@section('title', '¿Quiénes Somos?')
@section('content')
<section class="parallax-container" data-parallax-img="home-theme/images/bg-breadcrumbs-about.jpg">
    <div class="parallax-content breadcrumbs-custom context-dark">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-9">
            <h2 class="breadcrumbs-custom-title">¿Quiénes Somos?</h2>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Principal</a></li>
              <li class="active">¿Quiénes Somos?</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section section-lg bg-gray-1 bg-gray-1-decor">
    <div class="container">
      <div class="row row-50">
        <div class="col-lg-6 pr-xl-5"><img src="home-theme/images/about-us-1-518x430.jpg" alt="" width="518" height="430"/>
        </div>
        <div class="col-lg-6">
          <h3>Sobre Nosotros</h3>
          <div class="text-with-divider">
            <div class="divider"></div>
            <h4 class="text-opacity-70">Somos un grupo de jóvenes emprendedores sociales comprometidos con la Transformación Social Positiva</h4>
          </div>
          <p>Unión por los Niños es una Organización de la Sociedad Civil establecida en la ciudad de Guadalajara, Jalisco desde diciembre del año 
            2004 que impulsa el desarrollo integral y de manera sostenible de niños, niñas y adolescentes en situación de vulnerabilidad provenientes 
            de poblaciones marginadas y/o en condición de casa-hogar.</p>
          <p>Tenemos como…</p>
          <p>Misión: Lograr una transformación social positiva en nuestra comunidad a través de la formación para un cambio de vida.</p>
          <p>Visión: Posicionarnos como un referente en Jalisco en la generación e incremento de felicidad y bienestar en niñas, niños y adolescentes, voluntarios y formadores en casas-hogar.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="section section-lg bg-default">
    <div class="container">
      <h3 class="text-center">Nuestros Valores</h3>
      <div class="row row-30 row-md-40 row-xl-60">
        <div class="col-md-6 col-lg-4">
          <div class="box-icon-modern">
            <div class="box-icon-inner decorate-triangle"><span class="icon-xl linearicons-heart icon-primary"></span></div>
            <div class="box-icon-caption">
              <h4>Amor</h4>
              <p>Fuerza interna (consciente o inconsciente) que nos lleva a generar actos de generosidad con los demás.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="box-icon-modern">
            <div class="box-icon-inner decorate-circle"><span class="icon-xl linearicons-leaf icon-primary"></span></div>
            <div class="box-icon-caption">
              <h4>Trascendencia</h4>
              <p>Fomentamos el desarrollo de proyectos de vida, así como un crecimiento personal que prevalecerá a otras áreas y/o a través del tiempo y el espacio.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="box-icon-modern">
            <div class="box-icon-inner decorate-rectangle"><span class="icon-xl linearicons-sun-wind icon-primary"></span></div>
            <div class="box-icon-caption">
              <h4>Esperanza</h4>
              <p>Convencidos de que un mundo mejor es posible y acompañados de la acción, sembramos en nuestros beneficiarios y voluntarios la semilla para edificar una sociedad en valores.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="box-icon-modern">
            <div class="box-icon-inner decorate-rectangle"><span class="icon-xl linearicons-shield icon-primary"></span></div>
            <div class="box-icon-caption">
              <h4>Confianza</h4>
              <p>Fundamentamos nuestro trabajo en la honestidad y transparencia con nuestros beneficiarios, colaboradores y donantes, para incrementar nuestro impacto social.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="box-icon-modern">
            <div class="box-icon-inner decorate-triangle"><span class="icon-xl linearicons-flag3 icon-primary icon-xl-min"></span></div>
            <div class="box-icon-caption">
              <h4>Cultura de paz</h4>
              <p>propiciamos procesos para la vivencia valores, actitudes y comportamientos que rechazan la violencia y proponen la construcción de una mejor realidad para nuestros beneficiarios, 
                colaboradores y donantes, adoptando una cultura de paz.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection