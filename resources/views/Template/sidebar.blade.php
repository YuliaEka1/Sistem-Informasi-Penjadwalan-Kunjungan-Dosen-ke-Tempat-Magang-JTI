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
          <a href="#" class="d-block text-primary">{{ auth()->user()->name }}</a>
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
        <!-- Dashboard Menu (Admin only) -->
        @if(Auth::user()->role == 'admin')
            <li class="nav-item {{ isActiveDashboard() ? 'menu-open' : '' }}">
                <a href="{{ url('/home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
        @endif

        <!-- Manajemen Data Menu (Admin and Dosen) -->
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dosen' || Auth::user()->role == 'mahasiswa' || Auth::user()->role == 'industri' )
            <li class="nav-item {{ isActiveManajData() ? 'menu-open' : '' }}">
                <a href="javascript:void(0);" class="nav-link {{ isActiveManajData() ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manajemen Data
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dosen')
                        <li class="nav-item">
                            <a href="{{ url('/dataDosen') }}" class="nav-link {{ Request::is('dataDosen') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Dosen</p>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'mahasiswa')
                        <li class="nav-item">
                            <a href="{{ url('/dataMahasiswa') }}" class="nav-link {{ Request::is('dataMahasiswa') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Mahasiswa</p>
                            </a>
                        </li>
                    @endif
                    <!-- @if(Auth::user()->role == 'admin' || Auth::user()->role == 'industri')
                        <li class="nav-item">
                            <a href="{{ url('/tempatMagang') }}" class="nav-link {{ Request::is('tempatMagang') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Industri</p>
                            </a>
                        </li>
                    @endif -->
                </ul>
            </li>
        @endif

        <!-- Manaj Tempat Magang Menu  -->
        @if(Auth::user()->role == 'admin')
            <li class="nav-item {{ isActiveManajMagang() ? 'menu-open' : '' }}">
                <a href="javascript:void(0);" class="nav-link {{ isActiveManajMagang() ? 'active' : '' }}">
                    <i class="nav-icon fas fa-building"></i>
                    <p>
                        Manaj Tempat Magang
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/rekomendasiIndustri') }}" class="nav-link {{ Request::is('rekomendasiIndustri') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Rekomen Kunjungan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/hasilRekomendasi') }}" class="nav-link {{ Request::is('hasilRekomendasi') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Hasil Rekomendasi</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <!-- Penjadwalan Kunjungan Menu -->
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dosen' || Auth::user()->role == 'mahasiswa' || Auth::user()->role == 'industri')
            <li class="nav-item {{ isActivePenjadwalan() ? 'menu-open' : '' }}">
                <a href="javascript:void(0);" class="nav-link {{ isActivePenjadwalan() ? 'active' : '' }}">
                    <i class="nav-icon fas fa-calendar-check"></i>
                    <p>
                        Penjadwalan Kunjungan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                @if(Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ url('/penjadwalan') }}" class="nav-link {{ Request::is('penjadwalan') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kelola Penjadwalan</p>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dosen' || Auth::user()->role == 'mahasiswa' || Auth::user()->role == 'industri')
                        <li class="nav-item">
                            <a href="{{ url('/laporanPenjadwalan') }}" class="nav-link {{ Request::is('laporanPenjadwalan') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Penjadwalan</p>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dosen')
                    <li class="nav-item">
                        <a href="{{ url('/kelompokDosen') }}" class="nav-link {{ Request::is('kelompokDosen') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kelompok Dosen</p>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- Konfirmasi Kunjungan Menu -->
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dosen' || Auth::user()->role == 'mahasiswa' || Auth::user()->role == 'industri')
            <li class="nav-item {{ isActiveKonfirmasi() ? 'menu-open' : '' }}">
                <a href="javascript:void(0);" class="nav-link {{ isActiveKonfirmasi() ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clipboard-check"></i>
                    <p>
                        Konfirmasi Kunjungan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'mahasiswa' || Auth::user()->role == 'industri')
                        <li class="nav-item">
                            <a href="{{ url('/konfirmasiIndustri') }}" class="nav-link {{ Request::is('konfirmasiIndustri') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Konfirmasi Industri</p>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dosen')
                        <li class="nav-item">
                            <a href="{{ url('/konfirmasiDosen') }}" class="nav-link {{ Request::is('konfirmasiDosen') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Konfirmasi Dosen</p>
                            </a>
                        </li>
                    @endif
                </ul>
                @if(Auth::user()->role == 'admin')
            <li class="nav-item {{ isActiveperubahanIndustri() ? 'menu-open' : '' }}">
                <a href="{{ url('/perubahanIndustri') }}" class="nav-link {{ Request::is('perubahanIndustri') ? 'active' : '' }}">
                <i class="nav-icon fas fa-envelope"></i>
                    <p>Message</p>
                </a>
            </li>
        @endif
            </li>
        @endif
    </ul>
</nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>