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
      <tr><th class="w-15 text-right">Edit Mahasiswa</th><th class="w-1">
      <td class="w-84"><span class="badge bg-warning">Magang</span></td>
      <div class="card-tools">
      
    
</div>
</div>

<div class="card-body">
    <!-- Small boxes (Stat box) -->
    <form action="{{ route('updateMahasiswa2',$mahasiswa->id) }}" method="post">
    @csrf
    <div class="form-group row">
        <label for="nama_mhs" class="col-sm-2 col-form-label">Nama Mahasiswa 1:</label>
        <div class="col-sm-10">
            <input type="text" id="nama_mhs" name="nama_mhs" class="form-control" placeholder="Nama Mahasiswa 1" value="{{ $mahasiswa->nama_mhs }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_mhs_2" class="col-sm-2 col-form-label">Nama Mahasiswa 2:</label>
        <div class="col-sm-10">
            <input type="text" id="nama_mhs_2" name="nama_mhs_2" class="form-control" placeholder="Nama Mahasiswa 2" value="{{ $mahasiswa->nama_mhs_2 }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_mhs_3" class="col-sm-2 col-form-label">Nama Mahasiswa 3:</label>
        <div class="col-sm-10">
            <input type="text" id="nama_mhs_3" name="nama_mhs_3" class="form-control" placeholder="Nama Mahasiswa 3" value="{{ $mahasiswa->nama_mhs_3 }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="nim" class="col-sm-2 col-form-label">NIM 1:</label>
        <div class="col-sm-10">
            <input type="text" id="nim" name="nim" class="form-control" placeholder="NIM Mahasiswa 1" value="{{ $mahasiswa->nim }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="nim_2" class="col-sm-2 col-form-label">NIM 2:</label>
        <div class="col-sm-10">
            <input type="text" id="nim_2" name="nim_2" class="form-control" placeholder="NIM Mahasiswa 2" value="{{ $mahasiswa->nim_2 }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="nim_3" class="col-sm-2 col-form-label">NIM 3:</label>
        <div class="col-sm-10">
            <input type="text" id="nim_3" name="nim_3" class="form-control" placeholder="NIM Mahasiswa 3" value="{{ $mahasiswa->nim_3 }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="durasi_magang" class="col-sm-2 col-form-label">Durasi Magang:</label>
        <div class="col-sm-10">
            <input type="number" id="durasi_magang" name="durasi_magang" class="form-control" placeholder="Durasi Magang" value="{{ $mahasiswa->durasi_magang }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="tgl_awal" class="col-sm-2 col-form-label">Tanggal Awal:</label>
        <div class="col-sm-10">
            <input type="date" id="tgl_awal" name="tgl_awal" class="form-control" value="{{ $mahasiswa->tgl_awal }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="tgl_akhir" class="col-sm-2 col-form-label">Tanggal Akhir:</label>
        <div class="col-sm-10">
            <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control" value="{{ $mahasiswa->tgl_akhir }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="kategori_magang" class="col-sm-2 col-form-label">Kategori Magang:</label>
        <div class="col-sm-10">
            <input type="text" id="kategori_magang" name="kategori_magang" class="form-control" placeholder="Kategori Magang" value="{{ $mahasiswa->kategori_magang }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="jenis_magang" class="col-sm-2 col-form-label">Jenis Magang:</label>
        <div class="col-sm-10">
            <input type="text" id="jenis_magang" name="jenis_magang" class="form-control" placeholder="Jenis Magang" value="{{ $mahasiswa->jenis_magang }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_industri" class="col-sm-2 col-form-label">Nama Industri:</label>
        <div class="col-sm-10">
            <input type="text" id="nama_industri" name="nama_industri" class="form-control" placeholder="Nama Industri" value="{{ $mahasiswa->nama_industri }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="no_pemlap" class="col-sm-2 col-form-label">No Pembimbing Lapangan:</label>
        <div class="col-sm-10">
            <input type="text" id="no_pemlap" name="no_pemlap" class="form-control" placeholder="No Pembimbing Lapangan" value="{{ $mahasiswa->no_pemlap }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="dosen_id" class="col-sm-2 col-form-label">Nama Dosen Pembimbing:</label>
        <div class="col-sm-10">
            <select class="form-control select2" style="width: 100%;" name="dosen_id" id="dosen_id" value="{{ $mahasiswa->dosen_id }}">
                <option value=""> Pilih Dosen Pembimbing </option>
                @foreach ($dosen as $item)
                <option value="{{ $item->id }}">{{ $item->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="no_mahasiswa" class="col-sm-2 col-form-label">No Mahasiswa:</label>
        <div class="col-sm-10">
            <input type="text" id="no_mahasiswa" name="no_mahasiswa" class="form-control" placeholder="No Mahasiswa" value="{{ $mahasiswa->no_mahasiswa }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="alamat_industri" class="col-sm-2 col-form-label">Alamat Industri:</label>
        <div class="col-sm-10">
            <input type="text" id="alamat_industri" name="alamat_industri" class="form-control" placeholder="Alamat Industri" value="{{ $mahasiswa->alamat_industri }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="kota" class="col-sm-2 col-form-label">Kota:</label>
        <div class="col-sm-10">
            <input type="text" id="kota" name="kota" class="form-control" placeholder="Kota" value="{{ $mahasiswa->kota }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
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
