<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin/dist/img/Logo2.png') }}" alt="Logo2" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIPKUDOTEMA</span>
    </a>

     <!-- Sidebar -->
     <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png" class="img-circle elevation-2" alt="User Image">
          </div>
          
          <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
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
          <li class="nav-item {{ isActiveDashboard() ? 'menu-open' : '' }}">
              <a href="{{ asset('/home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            <li class="nav-item {{ isActiveManajData() ? 'menu-open' : '' }}">
              <a href="javascript:void(0);" class="nav-link {{ isActiveManajData() ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manajemen Data
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">3</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ asset('/dataDosen') }}" class="nav-link {{ Request::is('dataDosen') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Dosen</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ asset('/mahasiswa') }}" class="nav-link {{ Request::is('mahasiswa') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ asset('/tempatMagang') }}" class="nav-link {{ Request::is('tempatMagang') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Industri</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item {{ isActiveManajMagang() ? 'menu-open' : '' }}">
              <a href="javascript:void(0);" class="nav-link {{ isActiveManajMagang() ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manaj Tempat Magang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ asset('/rekomendasi') }}" class="nav-link {{ Request::is('rekomendasi') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekomendasi Tempat Magang</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ asset('/histori') }}" class="nav-link {{ Request::is('histori') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Histori Kunjungan Industri</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
          <li class="nav-item {{ isActivePenjadwalan() ? 'menu-open' : '' }}">
              <a href="{{ asset('/penjadwalan') }}" class="nav-link {{ Request::is('penjadwalan') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Penjadwalan Kunjungan
              </p>
            </a>
            
          </li>
          <li class="nav-item">
          <li class="nav-item {{ isActiveKonfirmasi() ? 'menu-open' : '' }}">
              <a href="javascript:void(0);" class="nav-link {{ isActiveKonfirmasi() ? 'active' : '' }}">
            <i class="nav-icon fas fa-check text"></i>
              <p>
                Konfirmasi Kunjungan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ asset('/konfirmasiDosen') }}" class="nav-link {{ Request::is('konfirmasiDosen') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Konfirmasi Dosen</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ asset('/konfirmasiIndustri') }}" class="nav-link {{ Request::is('konfirmasiIndustri') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Konfirmasi Industri</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
          <li class="nav-item {{ isActiveFeedback() ? 'menu-open' : '' }}">
              <a href="{{ asset('/feedback') }}" class="nav-link {{ Request::is('feedback') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comment"></i>
              <p>
                Feedback & Penyesuaian
              </p>
            </a>
          </li>     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>