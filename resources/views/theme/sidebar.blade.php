<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
  <div class="logo">
    <a href="#">
      <img src="images/icon/logo.png" alt="UXLN Admin" />
    </a>
  </div>
  <div class="menu-sidebar__content js-scrollbar1">
    <nav class="navbar-sidebar">
      <ul class="list-unstyled navbar__list">
        <li class="{{ Request::is('admin') ? 'active' : '' }}">
          <a href="{{ url('admin') }}">
            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
        </li>
        <li class="{{ Request::is('admin/institutions') ? 'active' : '' }}">
          <a href="{{ url('admin/institutions') }}">
            <i class="fas fa-home"></i>Casas Hogar</a>
        </li>
        <li class="{{ Request::is('admin/collabs') ? 'active' : '' }}">
          <a href="{{ url('admin/collabs') }}">
            <i class="fas fa-sitemap"></i>Colaboraciones</a>
        </li>
        <li class="{{ Request::is('admin/users') ? 'active' : '' }}">
          <a href="{{ url('admin/users') }}">
            <i class="fas fa-users"></i>Usuarios</a>
        </li>
        <li class="{{ Request::is('workshops') ? 'active' : '' }}">
          <a href="#">
            <i class="fas fa-bullhorn"></i>Talleres</a>
        </li>
        <li>
          <a href="#">
            <i class="far fa-calendar-o"></i>Calendario</a>
        </li>
        <li>
          <a href="#">
            <i class="fas  fa-clock-o"></i>Línea de tiempo</a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
<!-- END MENU SIDEBAR-->
