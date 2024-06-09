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
                        <tr>
                            <th class="w-15 text-right">Kelola</th>
                            <th class="w-1">
                            <td class="w-84"><span class="badge bg-warning">Penjadwalan</span></td>
                            <form action="{{ route('penjadwalan.search') }}" method="GET"
                                class="form-inline float-right">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="search" class="form-control" placeholder="Search"
                                        value="{{ request()->get('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="card-body">
                                <!-- Di tampilan, Anda dapat menggunakan Blade atau PHP untuk menampilkan data -->
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;">No</th>
                                            <th style="text-align: center; vertical-align: middle;">Nama Dosen
                                                Pembimbing</th>
                                            <th style="text-align: center; vertical-align: middle;">Nama Industri</th>
                                            <th style="text-align: center; vertical-align: middle;">Alamat Industri</th>
                                            <th style="text-align: center; vertical-align: middle;">Kota</th>
                                            <th style="text-align: center; vertical-align: middle;">Tanggal Akhir</th>
                                            <th style="text-align: center; vertical-align: middle;">Rekomendasi Tanggal
                                                Kunjungan</th>
                                            <th style="text-align: center; vertical-align: middle;">Tanggal Kunjungan
                                            </th>
                                        </tr>
                                    </thead>
                                    <form action="{{ route('penjadwalan.store') }}" method="POST">
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
                                                            <td style="text-align: center;">
                                                                {{ \Carbon\Carbon::parse($mhs->tgl_akhir)->format('d-m-Y') }}
                                                            </td>
                                                            <td style="text-align: center;">
                                                                {{ \Carbon\Carbon::parse($mhs->tgl_akhir)->subDays(7)->format('d-m-Y') }}
                                                            </td>
                                                            <!-- Tambahkan input field untuk tanggal kunjungan yang dapat diedit -->
                                                            <td style="text-align: center;">
                                                                <input type="date" name="tanggal_kunjungan[]"
                                                                    value="{{ session('tanggal_kunjungan')[$loop->index] ?? 'dd/mm/yyyy' }}"
                                                                    placeholder="dd/mm/yyyy">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                        <div class="form-group row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="submit"
                                                    class="btn btn-primary float-right">Simpan</button>
                                            </div>
                                        </div>
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
