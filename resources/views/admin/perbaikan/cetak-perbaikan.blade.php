<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token() }}">
    <style>
        table.static{
        position: relative;
        border: 1px solid #543535;
        }
    </style>
    <title>CETAK DATA PERBAIKAN</title>
</head>
<body>
    <div class="form-group">
        <h3 align="center"><b>Laporan Data Perbaikan</b></h3>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Paket/ Alat</th>
                    <th>Waktu Perbaikan - Harga</th>
                    <th>Perlakuan - Harga</th>
                    <th>Bahan Perbaikan - Harga</th>
                    <th width="1%">Foto Perbaikan</th>
                    <th>Jumlah Harga</th>
                </tr>
            </thead>
            <tbody align="center">
                @php $i = 1 @endphp
                @foreach($perbaikan as $pe)
                <tr> 
                    <td>{{$i++}}</td>
                    <td>{{$pe->nama}}</td>
                    <td>{{$pe->waktu_perbaikan->waktu}} - Rp.{{number_format($pe->waktu_perbaikan->harga)}}</td>
                    <td>{{$pe->alat->perlakuan}} - Rp.{{number_format($pe->alat->harga)}}</td>
                    <td>{{$pe->bahan_perbaikan->nama_bahan}} - Rp.{{number_format($pe->bahan_perbaikan->harga)}}</td>
                    <td><img width="80px" src="{{ url('/gambar_perbaikan/'.$pe->image) }}"></td>
                    <td>Rp.{{number_format($pe->jumlah_perbaikan)}}</td>
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