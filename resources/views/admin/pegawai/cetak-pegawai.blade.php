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
    <title>CETAK DATA PEGAWAI</title>
</head>
<body>
    <div class="form-group">
        <h3 align="center"><b>Laporan Data Pegawai</b></h3>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Bidang</th>
                    <th>Alamat Pegawai</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telpon</th>
                    <th>Email</th>
                    <!-- <th width="1%">Gambar Pegawai</th> -->
                    <th>Keterangan Pegawai</th>
                </tr>
            </thead>
            <tbody align="center">
                @php $i = 1 @endphp
                @foreach($pegawai as $p)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$p->nama_pegawai}}</td>
                    <td>{{$p->bidang}}</td>
                    <td>{{$p->alamat_pegawai}}</td>
                    <td>{{$p->jk_pegawai}}</td>
                    <td>{{$p->no_telpon_pegawai}}</td>
                    <td>{{$p->email_pegawai}}</td>
                    <!-- <td><img width="80px" src="{{ url('/data_file/'.$p->file) }}"></td> -->
                    <td>{{$p->ket_pegawai}}</td>                                
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