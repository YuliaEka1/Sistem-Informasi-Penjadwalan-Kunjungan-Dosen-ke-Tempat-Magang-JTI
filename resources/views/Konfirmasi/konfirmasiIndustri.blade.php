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
                        <tr>
                            <th class="w-15 text-right">Konfirmasi</th>
                            <th class="w-1">
                            <td class="w-84"><span class="badge bg-warning">Industri</span></td>
                            <div class="card-tools">
                                <form action="{{ route('konfirmasiIndustri.search') }}" method="GET"
                                    class="form-inline float-right">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Cari Industri atau Dosen"
                                            value="{{ request()->get('search') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                </a>
                            </div>
                    </div>

                    <!-- Small boxes (Stat box) -->
                    <div class="card-body">
                        <div class="alert" style="background-color: #FFF9D0; color: #524C42;">
                            <i class="fas fa-exclamation-circle"></i><strong>Perhatian!</strong> Jika Anda Sudah
                            Melakukan Konfirmasi Pada Status <strong>"Terima" dan "Konfirmasi Perubahan"</strong>. Anda Tidak Bisa Melakukan Aksi
                            Pada Status dan Konfirmasi Perubahan Lagi!
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">No</th>
                                    <th style="text-align: center; vertical-align: middle;">Nama Dosen</th>
                                    <th style="text-align: center; vertical-align: middle;">Nama Mahasiswa</th>
                                    <th style="text-align: center; vertical-align: middle;">Nama Industri</th>
                                    <th style="text-align: center; vertical-align: middle;">Alamat Industri</th>
                                    <th style="text-align: center; vertical-align: middle;">Kota</th>
                                    <th style="text-align: center; vertical-align: middle;">Tanggal Kunjungan</th>
                                    <th style="text-align: center; vertical-align: middle;">Status</th>
                                    <th style="text-align: center; vertical-align: middle;">Konfirmasi Perubahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjadwalan as $jadwal)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                                        <td>{{ $jadwal->mahasiswa->dosen->nama_dosen }}</td>
                                        <td>{{ $jadwal->mahasiswa->nama_mhs }}</td>
                                        <td>{{ $jadwal->mahasiswa->nama_industri }}</td>
                                        <td>{{ $jadwal->mahasiswa->alamat_industri }}</td>
                                        <td style="text-align: center;">{{ $jadwal->mahasiswa->kota }}</td>
                                        <td style="text-align: center;">
                                            {{ \Carbon\Carbon::parse($jadwal->tanggal_kunjungan)->format('d-m-Y') }}
                                        </td>
                                        <td style="text-align: center;">
                                            @if (!$jadwal->konfirmasi)
                                                <form action="{{ route('konfirmasiIndustri.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="penjadwalan_id"
                                                        value="{{ $jadwal->id }}">
                                                    <button type="submit" class="btn btn-success"
                                                        onclick="return confirm('Anda yakin ingin menerima?')">Terima</button>
                                                </form>
                                            @else
                                                <!-- Tombol dinonaktifkan jika sudah ada konfirmasi -->
                                                <button type="button" class="btn btn-success" disabled>Terima</button>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <!-- Button untuk membuka modal -->
                                            @if (!$jadwal->konfirmasi)
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#konfirmasiModal">
                                                    <i class="fas fa-history"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-primary" disabled>
                                                    <i class="fas fa-history"></i>
                                                </button>
                                            @endif

                                            <!-- Modal -->
                                            <div class="modal fade" id="konfirmasiModal" tabindex="-1"
                                                aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi
                                                                Perubahan</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('konfirmasiIndustri.simpanData') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="penjadwalan_id"
                                                                    value="{{ $jadwal->id }}">
                                                                <div class="form-group">
                                                                    <label for="konfirmasiPerubahan">Masukkan Perubahan Tanggal Kunjungan:</label>
                                                                    <input class="form-control"
                                                                        id="konfirmasiPerubahan"
                                                                        name="konfirmasi_perubahan" type="date"
                                                                        value="{{ $jadwal->konfirmasi_perubahan ? $jadwal->konfirmasi->konfirmasi_perubahan : '' }}" />
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Simpan</button>
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
