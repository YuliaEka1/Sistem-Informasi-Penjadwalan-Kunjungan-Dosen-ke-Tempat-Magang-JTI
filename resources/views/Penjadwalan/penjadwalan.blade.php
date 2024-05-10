

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
            <h1 class="m-0">Penjadwalan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penjadwalan </li>
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
                <h3 class="card-title">Data Direkomendasikan</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" onclick="doScheduling()">Lakukan Penjadwalan</button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama Dosen Pembimbing</th>
                            <th style="text-align: center;">Nama Industri</th>
                            <th style="text-align: center;">Alamat Industri</th>
                            <th style="text-align: center;">Tanggal Akhir</th>
                            <th style="text-align: center;">Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Menggunakan variabel $i untuk nomor -->
    @foreach ($mahasiswaDirekomendasikan as $mahasiswa)
        <tr>
            <td style="text-align: center;">{{ $loop->iteration }}</td>
            <td>{{ $mahasiswa->dosen->nama_dosen }}</td>
            <td>{{ $mahasiswa->nama_industri }}</td>
            <td>{{ $mahasiswa->alamat_industri }}</td>
            <td style="text-align: center;">{{ $mahasiswa->tgl_akhir }}</td>
            <td style="text-align: center;">{{ $mahasiswa->kota }}</td>
        </tr>
    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
    </section>

            <!-- Bagian tabel yang akan ditampilkan hasil penjadwalan -->
<div class="card-header">
    <h3 class="card-title">Data Penjadwalan</h3>
</div>

<section class="content">
        <div class="card card-info card-outline">
<div class="card-body">
    <!-- Di tampilan, Anda dapat menggunakan Blade atau PHP untuk menampilkan data -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Nama Dosen Pembimbing</th>
            <th style="text-align: center;">Nama Industri</th>
            <th style="text-align: center;">Alamat Industri</th>
            <th style="text-align: center;">Kota</th>
            <th style="text-align: center;">Tanggal Kunjungan</th>
        </tr>
    </thead>
    <form action="{{ route('simpan-data') }}" method="POST">
    @csrf <!-- Tambahkan CSRF token untuk keamanan -->
    <tbody>
    @php $i = 1 @endphp
    @foreach ($scheduledData as $kota => $tanggal)
        @foreach ($tanggal as $tgl => $mahasiswa)
            @foreach ($mahasiswa as $mhs)
                <tr>
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>{{ $mhs->dosen->nama_dosen }}</td>
                    <td>{{ $mhs->nama_industri }}</td>
                    <td>{{ $mhs->alamat_industri }}</td>
                    <td style="text-align: center;">{{ $kota }}</td>
                    <!-- Tambahkan input field untuk tanggal kunjungan yang dapat diedit -->
                    <td style="text-align: center;"><input type="date" name="tanggal_kunjungan[]" value="{{ $tgl }}"></td>
                    <!-- Tambahkan input hidden untuk data mahasiswa -->
                    <input type="hidden" name="mahasiswa_id[]" value="{{ $mhs->id }}">
                </tr>
            @endforeach
        @endforeach
    @endforeach
</tbody>

    <!-- Tambahkan tombol submit di luar perulangan -->
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

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
