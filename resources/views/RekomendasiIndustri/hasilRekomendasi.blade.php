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
            <h1 class="m-0">Hasil Rekomendasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Hasil Rekomendasi</li>
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
            <tr><th class="w-15 text-right">Hasil</th><th class="w-1">
                <td class="w-84"><span class="badge bg-warning">Rekomendasi</span></td>
                <div class="card-tools">
                <button type="button" class="btn btn-primary" onclick="redirectToPenjadwalan()">Lakukan Penjadwalan</button>
                <script>
                    function redirectToPenjadwalan() {
                        // Redirect user to the desired URL (Penjadwalan.penjadwalan)
                        window.location.href = "{{ route('penjadwalan') }}";
                    }
                </script>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;">No</th>
                            <th style="text-align: center; vertical-align: middle;">Nama Dosen Pembimbing</th>
                            <th style="text-align: center; vertical-align: middle;">Nama Industri</th>
                            <th style="text-align: center; vertical-align: middle;">Alamat Industri</th>
                            <th style="text-align: center; vertical-align: middle;">Tanggal Akhir</th>
                            <th style="text-align: center; vertical-align: middle;">Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($mahasiswaDirekomendasikan as $mahasiswa)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td>{{ $mahasiswa->dosen->nama_dosen }}</td>
                                <td>{{ $mahasiswa->nama_industri }}</td>
                                <td>{{ $mahasiswa->alamat_industri }}</td>
                                <td style="text-align: center;">{{ \Carbon\Carbon::parse($mahasiswa->tgl_akhir)->format('d-m-Y') }}</td>
                                <td style="text-align: center;">{{ $mahasiswa->kota }}</td>
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
<!-- jQuery -->
@include('Template.scripts')
</body>
</html>
