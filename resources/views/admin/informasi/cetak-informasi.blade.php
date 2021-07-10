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
    <title>CETAK DATA INFORMASI</title>
</head>
<body>
    <div class="form-group">
        <h3 align="center"><b>Laporan Data Informasi</b></h3>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Informasi</th>
                    <th>Isi Informasi</th>
                    <th>Tanggal Informasi</th>
                    <th width="5%">Gambar Informasi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody align="center">
                @php $i = 1 @endphp
                @foreach($informasi as $g)
                <tr> 
                    <td>{{$i++}}</td>
                    <td>{{$g->judul_informasi}}</td>
                    <td>{{$g->isi_informasi}}</td>
                    <td>{{$g->tanggal_informasi}}</td>
                    <td><img width="80px" src="{{ url('/data_file/'.$g->file) }}"></td>
                    <td>{{$g->ket_informasi}}</td>
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