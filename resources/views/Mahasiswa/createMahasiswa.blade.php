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
            <h1 class="m-0">Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Mahasiswa </li>
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
      <tr><th class="w-15 text-right">Daftar Mahasiswa</th><th class="w-1">
      <td class="w-84"><span class="badge bg-warning">Magang</span></td>
      <div class="card-tools">
      
    
</div>
</div>

<div class="card-body">
    <!-- Small boxes (Stat box) -->
    <form action="" method="post">
    @csrf
    <div class="form-group">
        <input type="text" id="nama_mhs" name="nama_mhs" class="form-control" placeholder="Nama Mahasiswa">
    </div>
    <div class="form-group">
        <input type="text" id="nim" name="nim" class="form-control" placeholder="NIM">
    </div>
    <div class="form-group">
        <input type="number" id="durasi_magang" name="durasi_magang" class="form-control" placeholder="Durasi Magang">
    </div>
    <div class="form-group">
        <label for="tgl_awal">Tanggal Awal Magang:</label>
        <input type="date" id="tgl_awal" name="tgl_awal" class="form-control">
    </div>
    <div class="form-group">
        <label for="tgl_akhir">Tanggal Akhir Magang:</label>
        <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control">
    </div>
    <div class="form-group">
        <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Nomor HP">
    </div>
    <div class="form-group">
        <input type="text" id="kategori_magang" name="kategori_magang" class="form-control" placeholder="Kategori Magang">
    </div>
    <div class="form-group">
        <input type="text" id="jenis_magang" name="jenis_magang" class="form-control" placeholder="Jenis Magang">
    </div>
    <div class="form-group">
        <label for="nama_dosen">Nama Dosen Pembimbing:</label>
        <select id="nama_dosen" name="nama_dosen" class="form-control">
            <!-- Anda dapat menambahkan pilihan nama dosen dari data yang ada di database -->
        </select>
    </div>
    <div class="form-group">
        <label for="alamat_industri">Alamat Industri Magang:</label>
        <select id="alamat_industri" name="alamat_industri" class="form-control">
            <!-- Anda dapat menambahkan pilihan alamat industri dari data yang ada di database -->
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

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
