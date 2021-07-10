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
    <title>CETAK DATA PENGAJUAN-DATA PERBAIKAN</title>
</head>
<body>
    <div class="form-group">
        <h3 align="center"><b>Laporan Data Pengajuan-Data Perbaikan</b></h3>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Perbaikan</th>
                    <th>Status Perbaikan</th>
                    <th>Status Antar</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody align="center">
                @php $i = 1 @endphp
                @foreach($pengajuan as $pengajuans) 
                <tr>
                    <td>{{$i++}}</td>
                    <td><img width="50px" src="{{ url('/gambar_user/'.$pengajuans->user->photo) }}"></td>
					<td>{{$pengajuans->user->name}}</td>
                    <td>{{$pengajuans->tanggal_perbaikan}}</td>
                    <td>{{$pengajuans->status_perbaikan}}</td>
                    <td>{{$pengajuans->status_antar}}</td>   
                    <td>{{$pengajuans->status}}</td>               
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