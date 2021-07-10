@extends('layouts.user.appuser')
@section('content')

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

    <div class="section-title">
        <h2>History</h2>
        <h3><span>Riwayat Perbaikan</span></h3>

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br/>
            @endforeach
        </div>
        @endif

        @if (session('success'))
        <!-- MAKA TAMPILKAN ALERT SUCCESS -->
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- KETIKA ADA SESSION ERROR  -->
        @if (session('error'))
        <!-- MAKA TAMPILKAN ALERT DANGER -->
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

    </div>
    <br>
        <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
            <br>
            <table style="font-size:11px;" class="table table-striped ">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status Pembayaran</th> 
                        <th>Status Perbaikan</th>
                        <th>Status Antar Alat</th>
                        <th>Jumlah Harga</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                    @foreach ($pengajuan as $pengajuans)
                    <tr align="center">
                        <td>{{$no++}}</td>
                        <td>{{$pengajuans->tanggal_perbaikan}}</td>
                        <td>
                            @if( $pengajuans->status == "sudah")
                            Sudah Pesan dan Belum Dibayar
                            @else( $pengajuans->status == "lunas")
                            Sudah Dibayar
                            @endif
                        </td>
                        <td>@if( $pengajuans->status_perbaikan == "belum")
                            
                            @elseif( $pengajuans->status_perbaikan == "proses")
                            Sedang Diperbaiki
                            @else($pengajuans->status_perbaikan == "selesai")
                            Sudah Diperbaiki
                            @endif
                        </td>
                        <td>
                        @if($pengajuans->status_antar == "belum")
                            
                        @elseif( $pengajuans->status_antar == "jalan")
                        Sedang Dijalan
                        @else($pengajuans->status_antar == "sudah")
                        Sudah Diantar
                        @endif
                        </td>
                        <td>Rp. {{number_format($pengajuans->jumlah_harga + $pengajuans->kode)}}</td>
                        <td>
                            <a  style="font-size:11px;" href="{{url('history')}}/{{$pengajuans->id_pengajuan}}" class="btn btn-primary">detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>   
            </table>
        </div>
    </div>
</section>
<!-- End Contact Section -->

@endsection

