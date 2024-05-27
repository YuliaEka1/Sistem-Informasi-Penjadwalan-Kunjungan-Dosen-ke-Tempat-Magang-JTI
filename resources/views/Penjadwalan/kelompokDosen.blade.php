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
                        <h1 class="m-0">Laporan Kelompok Dosen</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Laporan Kelompok Dosen</li>
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
                    <tr><th class="w-15 text-right">Laporan</th><th class="w-1">
                        <td class="w-84"><span class="badge bg-warning">Kelompok Dosen</span></td>
                        <div class="card-tools">
                          <a href=" {{ route('cetakKelompok') }} " class="btn btn-primary"><i class="fas fa-print"></i></a>         
            </div>
            <div class="card-body">
                    <div class="card-body">
                        <!-- Small boxes (Stat box) -->
                        @php
                          $colors = ['#76ABAE', '#6DC5D1', '#A0DEFF', '#C0D6E8', '#C4E4FF',
                          '#57A6A1', '#7ABA78', '#BACD92', '#75A47F', '#8DECB4', 
                                    '#57A6A1', '#6DC5D1', '#A0DEFF', '#C0D6E8', '#C4E4FF',
                                    '#FED8B1', '#F6EEC9', '#C7B7A3', '#EADBC8', '#D8AE7E',
                                    '#FFFF80', '#FFDB5C', '#FDDE55'];
                          $currentColorIndex = 0;
                          $alphabet = range('A', 'Z');
                        @endphp
                        @foreach ($groupedPenjadwalan as $index => $group)
                        <h5>Kelompok {{ $alphabet[$index % count($alphabet)] }}</h5>
                            <table class="table table-bordered" style="background-color: {{ $colors[$index % count($colors)] }}">
                                <thead>
                                    <tr>
                                    <th style="text-align: center; vertical-align: middle;">No</th>
                                    <th style="text-align: center; vertical-align: middle;">Nama Dosen Pembimbing</th>
                                    <th style="text-align: center; vertical-align: middle;">Nama Industri</th>
                                    <th style="text-align: center; vertical-align: middle;">Alamat Industri</th>
                                    <th style="text-align: center; vertical-align: middle;">Kota</th>
                                    <th style="text-align: center; vertical-align: middle;">Tanggal Kunjungan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($group as $penjadwalan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ optional($penjadwalan->mahasiswa->dosen)->nama_dosen }}</td>
                                            <td>{{ $penjadwalan->mahasiswa->nama_industri }}</td>
                                            <td>{{ $penjadwalan->mahasiswa->alamat_industri }}</td>
                                            <td>{{ $penjadwalan->mahasiswa->kota }}</td>
                                            <td style="text-align: center;">{{ \Carbon\Carbon::parse($penjadwalan->tanggal_kunjungan)->format('d-m-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br> <!-- Add space between tables -->
                        @endforeach
                    </div>
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
