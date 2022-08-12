  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> en linea</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header text-center">MENÚ</li>
        {{-- <li><a href="{{url('Inicio')}}"><i class="fa fa-home"></i> <span>Inicio</span></a></li> --}}
        <li><a href="{{url('Usuarios')}}"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
        <li><a href="{{url('Socios')}}"><i class="fa fa-users"></i> <span>Socios</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Libros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('Libros')}}"><i class="fa fa-arrow-right"></i> Lista</a></li>
            <li><a href="{{url('Crear-Prestamo')}}"><i class="fa fa-arrow-right"></i> Prestar</a></li>
            {{-- <li><a href="{{url('Ver-Prestamos')}}"><i class="fa fa-arrow-right"></i> Prestados</a></li> --}}
          </ul>
        </li>
        
        <li class="header text-center">MOROSOS</li>
        <li><a href="{{url('Morosos')}}"><i class="fa fa-circle-o text-red"></i> <span>Lista Roja</span></a></li>
        <li class="header text-center">CONTACTO</li>
        <li><a href="https://wa.me/+523323738000" target="__blank"><i class="fa fa-whatsapp"></i> <span>{{auth()->user()->name}}</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>