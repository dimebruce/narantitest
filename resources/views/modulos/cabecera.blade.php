<header class="main-header">
    <!-- Logo -->
    <a href="{{url('Inicio')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>🍊</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Biblioteca </b>🍊</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu mr-5">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(auth() -> user()-> foto == "")
              <img src="{{url('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              @else
              <img src="{{url('storage/.auth()->user()foto')}}" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs">{{auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  {{auth()->user()->name}} - {{auth()->user()->rol}}
                  <small>Desarollador de Software</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('perfil')}}" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger text-white">Salir</a>
                </div>
                <form method="post" id="logout-form" action="{{route('logout')}}">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>