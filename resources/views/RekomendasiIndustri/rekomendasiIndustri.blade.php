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
            <h1 class="m-0">Rekomendasi Kunjungan Industri</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rekomendasi Kunjungan Industri </li>
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
      <tr><th class="w-15 text-right">Rekomendasi</th><th class="w-1">
      <td class="w-84"><span class="badge bg-warning">Kunjungan</span></td>
      <div class="card-tools">    
    </div>
</div>

<div class="card-body">
    <!-- Small boxes (Stat box) -->
    <table class="table table-bordered">
    <thead>
        <tr>
            <th style="text-align: center; vertical-align: middle;">No</th>
            <th style="text-align: center; vertical-align: middle;">Nama Industri</th>
            <th style="text-align: center; vertical-align: middle;">Nama Dosen</th>
            <th style="text-align: center; vertical-align: middle;">Kota</th>
            <th style="text-align: center; vertical-align: middle;">Skor</th>
            <th style="text-align: center; vertical-align: middle;">Status</th>
            <th style="text-align: center; vertical-align: middle;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Tampilkan data mahasiswa -->
        @foreach ($mahasiswa as $mhs)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ $mhs->nama_industri }}</td>
                <td>{{ $mhs->dosen->nama_dosen ?? '-' }}</td>
                <td>{{ $mhs->kota }}</td>
                <td style="text-align: center;">
                    @if ($mhs->rekomendasi)
                        {{ $mhs->rekomendasi->total_score }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($mhs->rekomendasi)
                        @php
                            $nilai_rekomendasi = $mhs->rekomendasi->total_score;
                            $status = ($nilai_rekomendasi >= 10) ? 'Direkomendasikan' : 'Tdk Direkomendasikan';
                        @endphp
                        <!-- Tampilkan status dengan warna sesuai kondisi -->
                        <span style="display: inline-block; width: 100%; text-align: center;" class="badge {{ $status === 'Direkomendasikan' ? 'bg-warning' : 'bg-secondary' }}">{{ $status }}</span>
                        @else
                            <span style="display: inline-block; width: 100%; text-align: center;">-</span>
                        @endif
                     </td>
                        <td style="text-align: center;">
                            <!-- Tombol untuk menampilkan modal -->
                            <button type="button" class="btn btn-primary{{ $mhs->rekomendasi ? ' disabled' : '' }}" {{ $mhs->rekomendasi ? 'disabled' : '' }} data-toggle="modal" data-target="#rekomendasiModal{{ $mhs->id }}">
                                Beri Rekomendasi
                            </button>
                        </td>
                     </tr>
        @endforeach
    </tbody>
</table>
        <!-- Pagination Links -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item{{ $mahasiswa->onFirstPage() ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $mahasiswa->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                </li>
                @for ($i = 1; $i <= $mahasiswa->lastPage(); $i++)
                    <li class="page-item{{ $mahasiswa->currentPage() === $i ? ' active' : '' }}">
                        <a class="page-link" href="{{ $mahasiswa->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item{{ $mahasiswa->hasMorePages() ? '' : ' disabled' }}">
                    <a class="page-link" href="{{ $mahasiswa->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                </li>
            </ul>
        </div>
       
    </div>
</div>

<!-- /.row -->


<!-- Modal untuk rekomendasi -->
@foreach ($mahasiswa as $mhs)
<div class="modal fade" id="rekomendasiModal{{ $mhs->id }}" tabindex="-1" role="dialog" aria-labelledby="rekomendasiModalLabel{{ $mhs->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rekomendasiModalLabel{{ $mhs->id }}">Rekomendasi untuk {{ $mhs->nama_industri }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk memilih opsi rekomendasi -->
                <form action="{{ route('rekomendasiIndustri.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="mahasiswa_id" value="{{ $mhs->id }}">
                    <div class="form-group">
                        <label for="kota">Jarak dari Kampus Polinema Pusat :</label>
                        <select class="form-control" name="kota">
                        <option value=""> - </option>
                            <option value="3">Dekat</option>
                            <option value="2">Sedang</option>
                            <option value="0">Jauh</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dana">Dana Kunjungan:</label>
                        <select class="form-control" name="dana">
                        <option value=""> - </option>
                            <option value="3">Termasuk ke dalam Dana Kunjungan</option>
                            <option value="0">Tidak Termasuk ke dalam Dana Kunjungan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dosen">Dosen Pembimbing:</label>
                        <select class="form-control" name="dosen">
                        <option value=""> - </option>
                            <option value="3">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="kunjungan">Kunjungan:</label>
                        <select class="form-control" name="kunjungan">
                            <option value=""> - </option>
                            <option value="3">Belum Pernah dikunjungi</option>
                            <option value="0">Sudah Pernah dikunjungi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mou">MoU dengan Polinema:</label>
                        <select class="form-control" name="mou">
                            <option value=""> - </option>
                            <option value="3">BerMou</option>
                            <option value="0">Tidak BerMou</option>
                        </select>
                    </div>
                    <!-- Tombol Submit -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

       
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
