<!DOCTYPE html>
<html lang="en">

<head>
    @include('Template.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('admin/dist/img/Logo.png') }}" alt="Logo" height="60"
                width="60">
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
                        <tr>
                            <th class="w-15 text-right">Daftar Mahasiswa</th>
                            <th class="w-1">
                            <td class="w-84"><span class="badge bg-warning">Magang</span></td>
                            <div class="card-tools">


                            </div>
                    </div>

                    <div class="card-body">
                        <!-- Small boxes (Stat box) -->
                        <!-- Form -->
                        <form id="mahasiswaForm" action="{{ route('simpanMahasiswa2') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="nama_mhs" class="col-sm-2 col-form-label">Nama Mahasiswa:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nama_mhs" name="nama_mhs" value="{{ old('nama_mhs') }}"
                                        class="form-control" placeholder="Nama Mahasiswa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_mhs_2" class="col-sm-2 col-form-label">Nama Mahasiswa 2:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nama_mhs_2" name="nama_mhs_2"
                                        value="{{ old('nama_mhs_2') }}" class="form-control"
                                        placeholder="Nama Mahasiswa 2 (Jika Tidak Ada -)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_mhs_3" class="col-sm-2 col-form-label">Nama Mahasiswa 3:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nama_mhs_3" name="nama_mhs_3"
                                        value="{{ old('nama_mhs_3') }}" class="form-control"
                                        placeholder="Nama Mahasiswa 3 (Jika Tidak Ada -)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nim" class="col-sm-2 col-form-label">NIM:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nim" name="nim" value="{{ old('nim') }}"
                                        class="form-control" placeholder="NIM">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nim_2" class="col-sm-2 col-form-label">NIM 2:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nim_2" name="nim_2" value="{{ old('nim_2') }}"
                                        class="form-control" placeholder="NIM 2 (Jika Tidak Ada -)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nim_3" class="col-sm-2 col-form-label">NIM 3:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nim_3" name="nim_3" value="{{ old('nim_3') }}"
                                        class="form-control" placeholder="NIM 3 (Jika Tidak Ada -)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="durasi_magang" class="col-sm-2 col-form-label">Durasi Magang:</label>
                                <div class="col-sm-10">
                                    <input type="number" id="durasi_magang" name="durasi_magang"
                                        value="{{ old('durasi_magang') }}" class="form-control"
                                        placeholder="Durasi Magang">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_awal" class="col-sm-2 col-form-label">Tanggal Awal:</label>
                                <div class="col-sm-10">
                                    <input type="date" id="tgl_awal" name="tgl_awal"
                                        value="{{ old('tgl_awal') }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_akhir" class="col-sm-2 col-form-label">Tanggal Akhir:</label>
                                <div class="col-sm-10">
                                    <input type="date" id="tgl_akhir" name="tgl_akhir"
                                        value="{{ old('tgl_akhir') }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategori_magang" class="col-sm-2 col-form-label">Kategori Magang:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="kategori_magang" name="kategori_magang"
                                        value="{{ old('kategori_magang') }}" class="form-control"
                                        placeholder="Kategori Magang">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_magang" class="col-sm-2 col-form-label">Jenis Magang:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="jenis_magang" name="jenis_magang"
                                        value="{{ old('jenis_magang') }}" class="form-control"
                                        placeholder="Jenis Magang">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_industri" class="col-sm-2 col-form-label">Nama Industri:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nama_industri" name="nama_industri"
                                        value="{{ old('nama_industri') }}" class="form-control"
                                        placeholder="Nama Industri">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_pemlap" class="col-sm-2 col-form-label">No Pembimbing Lapangan:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="no_pemlap" name="no_pemlap"
                                        value="{{ old('no_pemlap') }}" class="form-control"
                                        placeholder="No Pembimbing Lapangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dosen_id" class="col-sm-2 col-form-label">Nama Dosen Pembimbing:</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" style="width: 100%;" name="dosen_id"
                                        value="{{ old('dosen_id') }}" id="dosen_id">
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
                                    <input type="text" id="no_mahasiswa" name="no_mahasiswa"
                                        value="{{ old('no_mahasiswa') }}" class="form-control"
                                        placeholder="No Mahasiswa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat_industri" class="col-sm-2 col-form-label">Alamat Industri:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="alamat_industri" name="alamat_industri"
                                        value="{{ old('alamat_industri') }}" class="form-control"
                                        placeholder="Alamat Industri">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kota" class="col-sm-2 col-form-label">Kota:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="kota" name="kota" value="{{ old('kota') }}"
                                        class="form-control" placeholder="Kota">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-success toastsDefaultSuccess">Submit</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr JS -->
    <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Custom Script -->
    <script>
        $(document).ready(function() {
            $('#mahasiswaForm').on('submit', function(event) {
                event.preventDefault(); 

                // permintaan AJAX
                $.ajax({
                    url: $(this).attr('action'), // URL aksi form
                    method: $(this).attr('method'), // Metode form (POST)
                    data: $(this).serialize(), // Data form
                    success: function(response) {
                        // Tampilkan pesan sukses Toastr
                        toastr.success('Data telah berhasil disimpan!', 'Sukses', {
                            closeButton: true,
                            timeOut: 1000, // Waktu tampil (1 detik)
                            extendedTimeOut: 1000, // Waktu tambahan jika diarahkan kursor (1 detik)
                            onHidden: function() {
                                window.location.href = "{{ route('dataMahasiswa') }}"; // Redirect ke halaman dataDosen
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
