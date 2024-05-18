

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    table.static {
      position: relative;
      border: 1px solid #543535;
    }
    </style>
    <title>CETAK LAPORAN PENJADWALAN </title>
  </head>
  <body>
    <div class="form-group">
      <p align="center"><b>Penjadwalan Kunjungan Dosen ke Tempat Magang</b></p>
      <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
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
                            @foreach ($penjadwalan as $item)
                              <tr>
                                  <td style="text-align: center;">{{ $loop->iteration }}</td>
                                  <td>{{ optional($item->mahasiswa->dosen)->nama_dosen }}</td>
                                  <td>{{ $item->mahasiswa->nama_industri }}</td>
                                  <td>{{ $item->mahasiswa->alamat_industri }}</td>
                                  <td style="text-align: center;">{{ $item->mahasiswa->kota }}</td>
                                  <td style="text-align: center;">{{ $item->tanggal_kunjungan }}</td>
                              </tr>
                              @endforeach

                            </tbody>
  </table>
  </div>
  <script type="text/javascript">
    window.print();

  </script>
      
</body>
</html>
