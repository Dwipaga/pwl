<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar" style="margin-bottom: 600px">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Dwi Paga ayuba</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Pilihan Menu
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/dashboard" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/profil" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pengalaman" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengalaman</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/hobi" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Hobi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/matkul" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Matakuliah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/keluarga" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Keluarga</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
              <a href="{{ url('/mahasiswa')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Mahasiswa</p>
              </a>
          </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>