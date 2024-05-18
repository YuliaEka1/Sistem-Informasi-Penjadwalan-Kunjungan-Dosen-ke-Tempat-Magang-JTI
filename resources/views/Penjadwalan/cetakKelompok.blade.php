<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CETAK LAPORAN KELOMPOK DOSEN </title>
    <style>
        table.static {
            position: relative;
            border-collapse: collapse;
            width: 95%;
            margin: 0 auto;
            border: 1px solid #543535;
        }
        table.static th, table.static td {
            border: 1px solid #543535;
            padding: 8px;
            text-align: center;
        }
        .group-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Penjadwalan Kunjungan Dosen ke Tempat Magang</b></p>
        @php
            $colors = ['#57A6A1', '#7ABA78', '#BACD92', '#75A47F', '#8DECB4', 
                        '#57A6A1', '#6DC5D1', '#A0DEFF', '#C0D6E8', '#C4E4FF',
                        '#FED8B1', '#F6EEC9', '#C7B7A3', '#EADBC8', '#D8AE7E',
                        '#FFFF80', '#FFDB5C', '#FDDE55'];
            $alphabet = range('A', 'Z');
        @endphp
        @foreach ($groupedPenjadwalan as $index => $group)
        <div class="group-title">Kelompok {{ $alphabet[(int)$index % count($alphabet)] }}</div>

            <table class="static" style="background-color: {{ $colors[(int)$index % count($colors)] }}">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dosen Pembimbing</th>
                        <th>Nama Industri</th>
                        <th>Alamat Industri</th>
                        <th>Kota</th>
                        <th>Tanggal Kunjungan</th>
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
                            <td>{{ \Carbon\Carbon::parse($penjadwalan->tanggal_kunjungan)->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        @endforeach
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
