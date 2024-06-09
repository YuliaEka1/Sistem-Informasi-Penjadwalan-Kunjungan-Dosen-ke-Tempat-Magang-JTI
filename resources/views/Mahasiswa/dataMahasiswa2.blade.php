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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">No</th>
                                    <th style="text-align: center; vertical-align: middle;">Login Mhs</th>
                                    <th style="text-align: center; vertical-align: middle;">Login Industri</th>
                                    <th style="text-align: center; vertical-align: middle;">Nama Mahasiswa 1</th>
                                    <th style="text-align: center; vertical-align: middle;">Nama Mahasiswa 2</th>
                                    <th style="text-align: center; vertical-align: middle;">Nama Mahasiswa 3</th>
                                    <th style="text-align: center; vertical-align: middle;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dtMahasiswa as $item)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                                        <td>{{ $item->mhs ? $item->mhs->email : '-' }}</td>
                                        <td>{{ $item->industri ? $item->industri->email : '-' }}</td>
                                        <td>{{ $item->nama_mhs }}</td>
                                        <td>{{ $item->nama_mhs_2 }}</td>
                                        <td>{{ $item->nama_mhs_3 }}</td>
                                        <td>

                                            <div class="text-center">
                                                @if (auth()->user()->role === 'mahasiswa' && !$item->industri)
                                                    <a href="{{ route('tambahIndustri', ['mhs' => $item]) }}">
                                                        <i class="fa fa-user fa-sm"></i>
                                                    </a>
                                                @endif
                                                <a href="#"
                                                    class="ajax_modal btn btn-xs btn-info tooltips text-light"
                                                    data-toggle="modal" data-target="#myModal{{ $item->id }}"
                                                    data-placement="left" data-original-title="Detail Data">
                                                    <i class="fa fa-list fa-sm"></i>
                                                </a>
                                                <a href="{{ route('editMahasiswa2', ['id' => $item->id]) }}"
                                                    class="ajax_modal btn btn-xs btn-warning tooltips text-secondary"
                                                    data-placement="left" data-original-title="Edit Data"><i
                                                        class="fa fa-edit"></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <!-- Tambahkan kelas modal-lg di sini -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Detail Data Mahasiswa
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label for="nama_mhs" class="col-sm-2 col-form-label">Nama
                                                                Mahasiswa 1:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->nama_mhs }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="nama_mhs_2" class="col-sm-2 col-form-label">Nama
                                                                Mahasiswa 2:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->nama_mhs_2 }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="nama_mhs_3" class="col-sm-2 col-form-label">Nama
                                                                Mahasiswa 3:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->nama_mhs_3 }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="nim" class="col-sm-2 col-form-label">NIM
                                                                1:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->nim }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="nim_2" class="col-sm-2 col-form-label">NIM
                                                                2:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->nim_2 }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="nim_3" class="col-sm-2 col-form-label">NIM
                                                                3:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->nim_3 }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="durasi_magang"
                                                                class="col-sm-2 col-form-label">Durasi Magang:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->durasi_magang }} Bulan
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="tgl_awal"
                                                                class="col-sm-2 col-form-label">Tanggal Awal:</label>
                                                            <div class="col-sm-10">
                                                                {{ \Carbon\Carbon::parse($item->tgl_awal)->format('d-m-Y') }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="tgl_akhir"
                                                                class="col-sm-2 col-form-label">Tanggal Akhir:</label>
                                                            <div class="col-sm-10">
                                                                {{ \Carbon\Carbon::parse($item->tgl_akhir)->format('d-m-Y') }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="kategori_magang"
                                                                class="col-sm-2 col-form-label">Kategori
                                                                Magang:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->kategori_magang }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="jenis_magang"
                                                                class="col-sm-2 col-form-label">Jenis Magang:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->jenis_magang }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="nama_industri"
                                                                class="col-sm-2 col-form-label">Nama Industri:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->nama_industri }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="no_pemlap" class="col-sm-2 col-form-label">No
                                                                Pembimbing Lapangan:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->no_pemlap }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="dosen_id" class="col-sm-2 col-form-label">Nama
                                                                Dosen Pembimbing:</label>
                                                            <div class="col-sm-10">
                                                            {{ $item->dosen->nama_dosen ?? '-' }}

                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="no_mahasiswa"
                                                                class="col-sm-2 col-form-label">No Mahasiswa:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->no_mahasiswa }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="alamat_industri"
                                                                class="col-sm-2 col-form-label">Alamat
                                                                Industri:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->alamat_industri }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row">
                                                            <label for="kota"
                                                                class="col-sm-2 col-form-label">Kota:</label>
                                                            <div class="col-sm-10">
                                                                {{ $item->kota }}
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                       

                    </div>
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
