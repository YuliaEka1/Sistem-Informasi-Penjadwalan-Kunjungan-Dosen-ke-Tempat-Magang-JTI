@extends('layouts.main')

@section('title', 'SIPKUDOTEMA')

@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        @if(Auth::user()->role == 'admin')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalMhs }}</h3>
                    <p>Mahasiswa Magang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-graduation-cap"></i>
                </div>
                <a href="{{ route('dataMahasiswa') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
        @if(Auth::user()->role == 'mahasiswa' || Auth::user()->role == 'dosen')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalMhs }}</h3>
                    <p>Mahasiswa Magang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('dataMahasiswa2') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
        @if(Auth::user()->role == 'admin')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalDosen }}</h3>
                    <p>Dosen Pembimbing</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('dataDosen') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
        @if(Auth::user()->role == 'dosen')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalDosen }}</h3>
                    <p>Dosen Pembimbing</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('dataDosen2') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dosen' || Auth::user()->role == 'mahasiswa')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalIndustri }}</h3>
                    <p>Industri yang Dikunjungi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('laporanPenjadwalan') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
        @if(Auth::user()->role == 'industri')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3></h3>
                    <p>Konfirmasi Industri</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('konfirmasiIndustri') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
        @if(Auth::user()->role == 'industri' )
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3></h3>
                    <p>Industri yang Dikunjungi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('laporanPenjadwalan') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dosen' || Auth::user()->role == 'mahasiswa')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $direkomendasikan }}</h3>
                    <p>Industri Direkomendasikan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('laporanPenjadwalan') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dosen' || Auth::user()->role == 'mahasiswa')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $tidakDirekomendasikan }}</h3>
                    <p>Industri Tidak Direkomendasikan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('laporanPenjadwalan') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif

        <!-- DONUT CHART -->
        <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Industri yang Direkomendasi dan Tidak Direkomendasi Untuk Kunjungan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        <!-- /.col-lg-6 -->
</div><!-- /.container-fluid -->
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@if (auth()->user()->role == 'dosen' || auth()->user()->role == 'mahasiswa' || auth()->user()->role == 'admin')
<script>
    $(function () {
        var donutChartCanvas = $('#myChart').get(0).getContext('2d');
        
        var donutData = {
            labels: ['Direkomendasikan', 'Tidak Direkomendasikan'],
            datasets: [
                {
                    data: [{{ $direkomendasikan }}, {{ $tidakDirekomendasikan }}],
                    backgroundColor: ['#007bff', '#28a745']
                }
            ]
        };
        
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        };

        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        });
    });
</script>
@endif

@endsection
