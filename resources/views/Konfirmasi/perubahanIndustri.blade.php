<!-- resources/views/Konfirmasi/perubahanIndustri.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  @include('Template.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('admin/dist/img/Logo.png') }}" alt="Logo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('Template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('Template.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
@include('Template.alert')
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Konfirmasi Perubahan Industri</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Konfirmasi Perubahan Industri</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card card-info card-outline">
        <div class="card-header">
          <h3 class="card-title"> Daftar Perubahan Tanggal Oleh Industri</h3>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="text-align: center; vertical-align: middle;">No</th>
                <th style="text-align: center; vertical-align: middle;">Nama Dosen</th>
                <th style="text-align: center; vertical-align: middle;">Nama Industri</th>
                <th style="text-align: center; vertical-align: middle;">Alamat Industri</th>
                <th style="text-align: center; vertical-align: middle;">Kota</th>
                <th style="text-align: center; vertical-align: middle;">Tanggal Kunjungan</th>
                <th style="text-align: center; vertical-align: middle;">Perubahan Tanggal</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($penjadwalan as $jadwal)
              <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ optional($jadwal->mahasiswa->dosen)->nama_dosen ?? '-' }}</td>
                <td>{{ $jadwal->mahasiswa->nama_industri }}</td>
                <td>{{ $jadwal->mahasiswa->alamat_industri }}</td>
                <td style="text-align: center;">{{ $jadwal->mahasiswa->kota }}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($jadwal->tanggal_kunjungan)->format('d-m-Y') }}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($jadwal->konfirmasi->konfirmasi_perubahan)->format('d-m-Y') }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('Template.footer')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('Template.scripts')
</body>
</html>
