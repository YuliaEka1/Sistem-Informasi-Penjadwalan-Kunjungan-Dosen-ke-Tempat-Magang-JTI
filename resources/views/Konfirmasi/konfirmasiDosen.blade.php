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
                                    <th style="text-align: center; vertical-align: middle;">No</th>
                                    <th style="text-align: center; vertical-align: middle;">Nama Dosen</th>
                                    <th style="text-align: center; vertical-align: middle;">Nama Mahasiswa</th>
                                    <th style="text-align: center; vertical-align: middle;">Nama Industri</th>
                                    <th style="text-align: center; vertical-align: middle;">Alamat Industri</th>
                                    <th style="text-align: center; vertical-align: middle;">Kota</th>
                                    <th style="text-align: center; vertical-align: middle;">Tanggal Kunjungan</th>
                                    <th style="text-align: center; vertical-align: middle;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konfirmasiDosen as $konfirmasi)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($konfirmasi->penjadwalan && $konfirmasi->penjadwalan->mahasiswa && $konfirmasi->penjadwalan->mahasiswa->dosen)
                                                {{ $konfirmasi->penjadwalan->mahasiswa->dosen->nama_dosen }}
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                        <td>
                                            @if ($konfirmasi->penjadwalan && $konfirmasi->penjadwalan->mahasiswa)
                                                {{ $konfirmasi->penjadwalan->mahasiswa->nama_mhs }}
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                        <td>
                                            @if ($konfirmasi->penjadwalan && $konfirmasi->penjadwalan->mahasiswa)
                                                {{ $konfirmasi->penjadwalan->mahasiswa->nama_industri }}
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                        <td>
                                            @if ($konfirmasi->penjadwalan && $konfirmasi->penjadwalan->mahasiswa)
                                                {{ $konfirmasi->penjadwalan->mahasiswa->alamat_industri }}
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            @if ($konfirmasi->penjadwalan && $konfirmasi->penjadwalan->mahasiswa)
                                                {{ $konfirmasi->penjadwalan->mahasiswa->kota }}
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            @if ($konfirmasi->penjadwalan)
                                                {{ \Carbon\Carbon::parse($konfirmasi->penjadwalan->tanggal_kunjungan)->format('d-m-Y') }}
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            @if ($konfirmasi->penjadwalan && !$konfirmasi->penjadwalan->konfirmasiDosen)
                                                <form action="{{ route('konfirmasiDosen.store') }}" method="POST"
                                                    onsubmit="return confirm('Anda yakin sudah menyelesaikan kunjungan?')">
                                                    @csrf
                                                    <input type="hidden" name="penjadwalan_id"
                                                        value="{{ $konfirmasi->penjadwalan->id }}">
                                                    <button type="submit" class="btn btn-success">Selesai</button>
                                                </form>
                                            @else
                                            <span class="badge bg-warning">Selesai</span>
                                            @endif
                                        </td>
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
