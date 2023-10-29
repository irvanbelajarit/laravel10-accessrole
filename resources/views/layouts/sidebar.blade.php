<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('LogoGMS.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">RMS MT5</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}} | Role: {{Auth::user()->roles()->first()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item menu-open">
            <a href="{{route('dashboard')}}" class="nav-link {{ set_active('dashboard')}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item ">
            <a href="{{route('dashboard')}}" class="nav-link {{ set_active('dashboard')}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item {{ set_open('dashboard/users*')}} ">
            <a href="#" class="nav-link {{ set_active('dashboard/users*')}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link {{ set_active('dashboard/users')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Users</p>

                </a>
              </li>
              @hasrole('Admin')
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link {{ set_active('dashboard/users/roles')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Access Roles</p>

                </a>
              </li>
              @endhasrole

            </ul>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
