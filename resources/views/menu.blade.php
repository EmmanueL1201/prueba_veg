<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- <!-- Brand Logo -->
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Session::get('session_nombre')}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ asset('inicio') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
                <span class="right badge badge-success">ver</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('alumnos') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Alumnos
                <span class="right badge badge-success">ver</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('carreras') }}" class="nav-link">
              <i class="nav-icon fas fa-award"></i>
              <p>
                Carreras
                <span class="right badge badge-success">ver</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('grupos') }}" class="nav-link">
              <i class="nav-icon fas fa-align-justify"></i>
              <p>
                Grupos
                <span class="right badge badge-success">ver</span>
              </p>
            </a>
          </li>
          
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>