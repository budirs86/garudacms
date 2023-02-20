<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-danger elevation-4 sidebar-light-purple">
    <!-- Brand Logo -->
    <a href="{{ url('dashboard')}}" class="brand-link bg-primary">
      <img src={{ asset('assets/logo/cms_logo.png')}} alt="CMS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Garuda CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src={{ asset('admin/dist/img/avatar5.png')}} class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          <p>{{ Auth::user()->type }} </p>
          <a href="{{ url('logout') }}" class="btn btn-sm btn-default">Logout</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
                <a href="{{ url('/dashboard')}}" class="nav-link active">
                  <i class="fa fa-home"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
          @if ((Auth::user()->type) == 'manager' )
          
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Pengaturan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
             
                <li class="nav-item">
                  <a href="{{ url('admin/users') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User Management</p>
                  </a>
                </li>
              </ul>
            </ul>
          </li>
         
          @elseif ((Auth::user()->type) == 'admin' )
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="fa fa-globe"></i>
                <p>
                  Halaman dan Menu
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ route('halaman')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Halaman</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/menu') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Menu</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="fa fa-newspaper"></i>
                <p>
                  Berita
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('category') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('berita') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Berita</p>
                  </a>
                </li>
              </ul>
            </li>
        
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="fa fa-image"></i>
                <p>
                  Slide
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('slide')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Slide</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="fa fa-bullhorn"></i>
                <p>
                  Pengumuman
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('pengumuman') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Pengumuman</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="fa fa-image"></i>
                <p>
                 Gallery
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('gallery') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Gallery</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('info') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Infografis</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="fa fa-link nav-icon"></i>
                <p>
                  Aplikasi dan Link
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('aplikasi') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Aplikasi</p>
                  </a>
                </li>  
                <li class="nav-item">
                  <a href="{{ route('link') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Link</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('file') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar File</p>
                  </a>
                </li> 
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="fa fa-tachometer-alt"></i>
                <p>
                  Pengaturan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('pimpinan') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pimpinan</p>
                  </a>
                </li>  
                <li class="nav-item">
                  <a href="{{ route('logo') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Logo</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('alamat') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Seting Alamat</p>
                  </a>
                </li> 
              </ul>
            </li>
          @endif  
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
