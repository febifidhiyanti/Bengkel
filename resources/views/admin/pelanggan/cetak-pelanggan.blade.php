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
        <h3 align="center"><b>Laporan Data Pelanggan</b></h3>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama pelanggan</th>
                    <th>Alamat pelanggan</th>
                    <th>Email Pelanggan</th>
                    <th>No Telpon</th>
                    <th>Jenis kelamin</th>
                    <th>Keterangan pelanggan</th>
                </tr>
            </thead>
            <tbody align="center">
                @php $i = 1 @endphp
                @foreach($pelanggan as $pl)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$pl->nama_pelanggan}}</td>
                    <td>{{$pl->alamat_pelanggan}}</td>
                    <td>{{$pl->email_pelanggan}}</td>
                    <td>{{$pl->no_telp_pelanggan}}</td>
                    <td>{{$pl->jk_pelanggan}}</td>
                    <td>{{$pl->ket_pelanggan}}</td>                         
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