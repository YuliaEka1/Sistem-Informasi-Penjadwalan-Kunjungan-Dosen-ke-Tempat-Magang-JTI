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
                        <tr>
                            <th class="w-15 text-right">Daftar Dosen</th>
                            <th class="w-1">
                            <td class="w-84"><span class="badge bg-warning">Pembimbing</span></td>
                            <div class="card-tools">

                                <a href="{{ route('createDosen') }}" class="btn btn-success">Tambah Data <i
                                        class="fas fa-plus-square"></i></a>
                            </div>
                    </div>

                    <div class="card-body">
                        <!-- Small boxes (Stat box) -->
                        <table class="table table-bordered">
                            <tr>
                                <th style="text-align: center; vertical-align: middle;">No</th>
                                <th style="text-align: center; vertical-align: middle;">Email</th>
                                <th style="text-align: center; vertical-align: middle;">Nama Dosen</th>
                                <th style="text-align: center; vertical-align: middle;">NIP</th>
                                <th style="text-align: center; vertical-align: middle;">Jumlah Bimbingan</th>
                                <th style="text-align: center; vertical-align: middle;">No Handphone</th>
                                <th style="text-align: center; vertical-align: middle;">Aksi</th>
                            </tr>
                            @foreach ($dtDosen as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td>{{ $item->user ? $item->user->email : '-' }}</td>
                                    <td>{{ $item->nama_dosen }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td style="text-align: center;">{{ $item->jumlah_bimbingan }}</td>
                                    <td style="text-align: center;">{{ $item->no_hp }}</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{ route('editDosen', ['id' => $item->id]) }}"
                                                class="ajax_modal btn btn-xs btn-warning tooltips text-secondary"
                                                data-placement="left" data-original-title="Edit Data">
                                                <i class="fa fa-edit"></i>
                                            </a>
                   
                                            <a href="{{ route('deleteDosen', ['id' => $item->id]) }}"
                                                class="ajax_modal btn btn-xs btn-danger tooltips text-light"
                                                data-placement="left" data-original-title="Hapus Data">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        <!-- Pagination Links -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="{{ $dtDosen->previousPageUrl() }}"><i
                                            class="fas fa-chevron-left"></i></a></li>
                                @for ($i = 1; $i <= $dtDosen->lastPage(); $i++)
                                    <li class="page-item{{ $dtDosen->currentPage() === $i ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $dtDosen->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item"><a class="page-link" href="{{ $dtDosen->nextPageUrl() }}"><i
                                            class="fas fa-chevron-right"></i></a></li>
                            </ul>
                        </div>

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
