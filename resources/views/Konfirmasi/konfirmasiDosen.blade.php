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
            <h1 class="m-0">Konfirmasi Dosen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Konfirmasi Dosen</li>
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
        <h3 class="card-title">Daftar Konfirmasi Dosen</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="text-align: center;">No</th>
              <th style="text-align: center;">Nama Dosen</th>
              <th style="text-align: center;">Nama Industri</th>
              <th style="text-align: center;">Alamat Industri</th>
              <th style="text-align: center;">Kota</th>
              <th style="text-align: center;">Tanggal Kunjungan</th>
              <th style="text-align: center;">Status</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($konfirmasiDosen as $konfirmasi)
    <tr>
        <td style="text-align: center;">{{ $loop->iteration }}</td>
        
        <td>{{ optional(optional($konfirmasi->konfirmasiIndustri->mahasiswa)->dosen)->nama_dosen ?? '' }}</td>
        <td>{{ optional($konfirmasi->konfirmasiIndustri->mahasiswa)->nama_industri ?? '' }}</td>
        <td>{{ optional($konfirmasi->konfirmasiIndustri->mahasiswa)->alamat_industri ?? '' }}</td>
        <td style="text-align: center;">{{ optional($konfirmasi->konfirmasiIndustri->mahasiswa)->kota ?? '' }}</td>
        <td style="text-align: center;">
            {{ optional($konfirmasi->konfirmasiIndustri->tanggal_kunjungan)->format('d-m-Y') ?? '' }}
        </td>

        <td style="text-align: center;">
            @if ($konfirmasi->status !== 'dikonfirmasi')
                <form action="{{ route('konfirmasiDosen.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="konfirmasi_industri_id" value="{{ $konfirmasi->konfirmasiIndustri->id }}">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Anda yakin ingin mengkonfirmasi?')">Konfirmasi</button>
                </form>
            @else
                <!-- Tombol dinonaktifkan jika sudah ada konfirmasi -->
                <button type="button" class="btn btn-success" >Konfirmasi</button>
            @endif
        </td>
    </tr>
@endforeach



          </tbody>
        </table>
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
