@extends('home-theme.master')
@section('content')
<!-- Swiper-->
<section class="section section-lg section-main-bunner section-main-bunner-filter">
    <div class="main-bunner-img" style="background-image: url(&quot;home-theme/images/bg-bunner-2.jpg&quot;); background-size: cover;"></div>
    <div class="main-bunner-inner">
      <div class="container">
        <div class="row row-50 justify-content-lg-center align-items-lg-center">
          <div class="col-lg-12">
            <div class="bunner-content-modern text-center">
              <h1 class="main-bunner-title">Unión por los Niños</h1>
              <p><h4>¡Porque tú también fuiste niño!</h4><br>De la unión de un grupo de amigos con el corazón dispuesto para decirle a la humanidad que el amor es la fuerza que vence al mundo, nace “Unión por los niños”.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section section-xl">
    <div class="container">
      <div class="row row-50 justify-content-lg-between align-items-lg-center">
        <div class="col-lg-6">
          <div class="box-img-animate">
            <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;: 150, &quot;x&quot;: 0,  &quot;smoothness&quot;: 50 }"><img src="home-theme/images/animate-img-2.jpg" alt="" width="400px" height="341px"></div>
            <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;:70, &quot;x&quot;: -250,  &quot;smoothness&quot;: 50 }"><img src="home-theme/images/animate-img-3.jpg" alt="" width="400px" height="341px"></div>
            <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;:20, &quot;x&quot;: 20,  &quot;smoothness&quot;: 50 }"><img src="home-theme/images/animate-img-1.jpg" alt="" width="400px" height="341px"></div>
            <div class="box-img-animate-item" data-parallax-scroll="{&quot;y&quot;:0, &quot;x&quot;: 140,  &quot;smoothness&quot;: 50 }"><img src="home-theme/images/animate-img-6.jpg" alt="" width="400px" height="341px"></div>
          </div>
        </div>
        <div class="col-lg-6 col-xl-5">
          <div class="innset-xl-left-70">
            <h3>¿Qué hacemos?</h3>
            <p class="text-opacity-80">Nuestra labor se enfoca en lograr la Transformación Social Positiva, por lo que nuestro modelo de interacción nos lleva a desarrollar 3 programas a 
              fin de impulsar el desarrollo integral de niñas, niños y adolescentes, que son:</p>
            <div class="row row-50">
              <div class="col-md-6 col-lg-12">
                <div class="box-icon-modern">
                  <div class="box-icon-inner decorate-triangle"><span class="icon-xl linearicons-pencil3 icon-primary"></span></div>
                  <div class="box-icon-caption">
                    <h4>Educación</h4>
                    <p>Facilitar procesos formativos para potencializar su desarrollo personal.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-12">
                <div class="box-icon-modern">
                  <div class="box-icon-inner decorate-circle"><span class="icon-xl linearicons-sun icon-primary"></span></div>
                  <div class="box-icon-caption">
                    <h4>Recreación</h4>
                    <p>Impulsar el desarrollo integral de niñas, niños y adolescentes en situación de casa-hogar mediante actividades recreativas y de convivencia.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-12">
                <div class="box-icon-modern">
                  <div class="box-icon-inner decorate-rectangle"><span class="icon-xl linearicons-rocket icon-primary"></span></div>
                  <div class="box-icon-caption">
                    <h4>Desarrollo Social</h4>
                    <p>Campañas que promueven la cooperación a través de donativos en especie a beneficio de niñas, niños y adolescentes en situación de casa-hogar.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="parallax-container bg-gray-600" data-parallax-img="home-theme/images/parallax-img-2.jpg">
    <div class="parallax-content section-xxl text-center">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-9 col-lg-8 col-xl-8 wow-outer">
            <div class="innset-xl-right-30 innset-xl-left-30">
              <div class="wow slideInDown">
                <h3>Subscribete para mantenerte informado</h3>
                <form class="rd-form rd-mailform rd-form-inline" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="home-theme/bat/rd-mailform.php">
                  <div class="form-wrap">
                    <input class="form-input" id="subscribe-form-email" type="email" name="email" data-constraints="@Email @Required">
                    <label class="form-label" for="subscribe-form-email">Corrreo</label>
                  </div>
                  <div class="form-button">
                    <button class="button button-primary button-lg" type="submit">Subscribir</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection