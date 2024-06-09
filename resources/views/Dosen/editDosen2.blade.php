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
            <h1 class="m-0">Data Dosen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Dosen </li>
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
      <tr><th class="w-15 text-right">Edit Data Dosen</th><th class="w-1">
      <td class="w-84"><span class="badge bg-warning">Pembimbing</span></td>
      <div class="card-tools">
      
</div>
</div>

<div class="card-body">
    <!-- Form -->
    <form id="editDosenForm" action="{{ url('updateDosen2',$dosen->id) }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" placeholder="Nama Dosen" value="{{ $dosen->nama_dosen }}">
    </div>
    <div class="form-group">
        <input type="text" id="nip" name="nip" class="form-control" placeholder="NIP" value="{{ $dosen->nip }}">
    </div>
    <div class="form-group">
        <input type="number" id="jumlah_bimbingan" name="jumlah_bimbingan" class="form-control" placeholder="Jumlah Bimbingan" value="{{ $dosen->jumlah_bimbingan }}">
    </div>
    <div class="form-group">
        <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Nomor Hp" value="{{ $dosen->no_hp }}">
    </div>

    <button type="submit" class="btn btn-success toastsDefaultSuccess">Ubah Data</button>
    
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr JS -->
    <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Custom Script -->
    <script>
    $(document).ready(function() {
        $('#editDosenForm').on('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara default

            // Contoh permintaan AJAX
            $.ajax({
                url: $(this).attr('action'), // URL aksi form
                method: 'POST', // Metode form (POST)
                data: $(this).serialize(), // Data form
                success: function(response) {
                    // Tampilkan pesan sukses Toastr
                    toastr.success('Data berhasil diubah!', 'Sukses', {
                        closeButton: true,
                        timeOut: 1000, // Waktu tampil (1 detik)
                        extendedTimeOut: 1000, // Waktu tambahan jika diarahkan kursor (1 detik)
                        onHidden: function() {
                            window.location.href = "{{ route('dataDosen2') }}"; // Redirect ke halaman dataDosen
                        }
                    });
                },
                error: function(xhr) {
                    // Tampilkan pesan error Toastr
                    toastr.error('Terjadi kesalahan saat menyimpan form.', 'Error', {
                        closeButton: true,
                        timeOut: 2000, // Waktu tampil (2 detik)
                        extendedTimeOut: 1000 // Waktu tambahan jika diarahkan kursor (1 detik)
                    });
                }
            });
        });
    });
</script>
@include('Template.scripts')
</body>
</html>
