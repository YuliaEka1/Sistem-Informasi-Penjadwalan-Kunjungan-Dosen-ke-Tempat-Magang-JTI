

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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Penjadwalan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laporan Penjadwalan </li>
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
      <tr><th class="w-15 text-right">Laporan</th><th class="w-1">
      <td class="w-84"><span class="badge bg-warning">Penjadwalan</span></td>
      <div class="card-tools">
      <a href=" {{ route('cetakPenjadwalan') }} " class="btn btn-primary"><i class="fas fa-print"></i></a>         
            </div>
            <div class="card-body">
    <!-- Small boxes (Stat box) -->
    <table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center; vertical-align: middle;">No</th>
            <th style="text-align: center; vertical-align: middle;">Nama Dosen Pembimbing</th>
            <th style="text-align: center; vertical-align: middle;">Nama Industri</th>
            <th style="text-align: center; vertical-align: middle;">Alamat Industri</th>
            <th style="text-align: center; vertical-align: middle;">Kota</th>
            <th style="text-align: center; vertical-align: middle;">Tanggal Kunjungan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjadwalan as $index => $penjadwalan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ optional($penjadwalan->mahasiswa->dosen)->nama_dosen }}</td>
                    <td>{{ $penjadwalan->mahasiswa->nama_industri }}</td>
                    <td>{{ $penjadwalan->mahasiswa->alamat_industri }}</td>
                    <td>{{ $penjadwalan->mahasiswa->kota }}</td>
                    <td style="text-align: center;">{{ \Carbon\Carbon::parse($penjadwalan->tanggal_kunjungan)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
            </div>
    </section>

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
<!-- jQuery -->
@include('Template.scripts')
</body>
</html>
