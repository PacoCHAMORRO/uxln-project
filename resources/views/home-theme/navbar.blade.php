<!-- Page Header-->
<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
      <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
        <div class="rd-navbar-main-outer">
          <div class="rd-navbar-main">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!-- RD Navbar Brand-->
              <div class="rd-navbar-brand"><a href="index.html"><img class="brand-logo-light" src="home-theme/images/logo-white-415x103.png" alt="" width="207" height="51"/></a></div>
            </div>
            <div class="rd-navbar-main-element">
              <div class="rd-navbar-nav-wrap">
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="rd-nav-link" href="{{ url('/') }}">Principal</a>
                  </li>
                  <li class="rd-nav-item {{ Request::is('about-us') ? 'active' : '' }}"><a class="rd-nav-link" href="{{ url('about-us') }}">¿Quiénes Somos?</a>
                  </li>
                  <li class="rd-nav-item {{ Request::is('ecosystem') ? 'active' : '' }}"><a class="rd-nav-link" href="{{ url('ecosystem') }}">Nuestro Ecosistema</a>
                  </li>
                  <li class="rd-nav-item {{ Request::is('contact') ? 'active' : '' }}"><a class="rd-nav-link" href="{{ url('contact') }}">Contacto</a>
                  </li>
                </ul><a class="button button-primary button-sm" href="{{ url('donation') }}">Dona</a>
              </div>
            </div><a class="button button-primary button-sm" href="{{ url('donation') }}">Dona</a>
          </div>
        </div>
      </nav>
    </div>
  </header>