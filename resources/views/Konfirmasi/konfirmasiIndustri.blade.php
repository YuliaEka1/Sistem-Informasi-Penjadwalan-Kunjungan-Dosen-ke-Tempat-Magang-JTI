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
            <h1 class="m-0">Konfirmasi Industri</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Konfirmasi Industri</li>
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
      <tr><th class="w-15 text-right">Konfirmasi</th><th class="w-1">
      <td class="w-84"><span class="badge bg-warning">Industri</span></td>
      <div class="card-tools">
           
</a>
</div>
</div>

<div class="card-body">
    <!-- Small boxes (Stat box) -->
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
                <th style="text-align: center;">Konfirmasi Perubahan</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($penjadwalan as $jadwal)
<tr>
    <td style="text-align: center;">{{ $loop->iteration }}</td>
    <td>{{ $jadwal->mahasiswa->dosen->nama_dosen }}</td>
    <td>{{ $jadwal->mahasiswa->nama_industri }}</td>
    <td>{{ $jadwal->mahasiswa->alamat_industri }}</td>
    <td style="text-align: center;">{{ $jadwal->mahasiswa->kota }}</td>
    <td style="text-align: center;">{{ \Carbon\Carbon::parse($jadwal->tanggal_kunjungan)->format('d-m-Y') }}</td>
    <td style="text-align: center;">
        @if (!$jadwal->konfirmasi)
            <form action="{{ route('konfirmasiIndustri.store') }}" method="POST">
                @csrf
                <input type="hidden" name="penjadwalan_id" value="{{ $jadwal->id }}">
                <button type="submit" class="btn btn-success" onclick="return confirm('Anda yakin ingin menerima?')">Terima</button>
            </form>
        @else
            <!-- Tombol dinonaktifkan jika sudah ada konfirmasi -->
            <button type="button" class="btn btn-success" disabled>Terima</button>
        @endif
    </td>
    <td style="text-align: center;">
      <!-- Button untuk membuka modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasiModal">
          Perubahan
      </button>

  <!-- Modal -->
  <div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Perubahan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
              <form action="{{ route('konfirmasiIndustri.simpanData') }}" method="post">
                  @csrf
                  <input type="hidden" name="penjadwalan_id" value="{{ $jadwal->id }}">
                  <div class="form-group">
                      <label for="konfirmasiPerubahan">Konfirmasi:</label>
                      <textarea class="form-control" id="konfirmasiPerubahan" name="konfirmasi_perubahan" ></textarea>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
              </form>
              </div>
            
        </div>
    </div>
</div>

    </td>
</tr>
@endforeach

        </tbody>
    </table>
</div>
<!-- /.row -->
<!-- Main row -->
<!-- /.row (main row) -->
      <!-- /.container-fluid -->
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
