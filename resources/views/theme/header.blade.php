  <!-- HEADER DESKTOP-->
  <header class="header-desktop">
    <div class="section__content section__content--p30">
            
        <div class="dropdown d-flex">
          <a id="navbarDropdown" class="ml-auto mr-5 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              Hola, {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">                 
                  @csrf
              </form>
          </div>
      </div>
      
    </div>
  </header>
  <!-- HEADER DESKTOP-->

