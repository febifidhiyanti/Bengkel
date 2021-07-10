@extends('layouts.user.appuser')
@section('content')

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

    @if(empty($pengajuan))
    <div class="section-title">
        <h3 class="mt-2" ><span>Detail Perbaikan</span></h3>
        <h2><a href="/history">Kembali</a></h2>
    </div>
    @endif

    @if(!empty($pengajuan))
    <div class="section-title">
        <h3><span>Detail Perbaikan</span></h3>
        <h2><a href="/history">Kembali</a></h2>

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br/>
            @endforeach
        </div>
        @endif

        @if (session('success'))
        <!-- MAKA TAMPILKAN ALERT SUCCESS -->
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <!-- KETIKA ADA SESSION ERROR  -->
        @if (session('error'))
        <!-- MAKA TAMPILKAN ALERT DANGER -->
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

    </div>
    
        <div class="section-title mt-3">
            <div class="card">
                <div class="card-body">
                    <h5>Sukses Check Out</h5>
                    <p>Perbaikan anda sudah sukses di check out selanjutnya
                    untuk pembayaran silahkan anda transfer di rekening<strong> Bank BRI dengan Nomer Rekening : 32113-821312-123</strong>
                    dengan nominal : <strong>Rp. {{number_format($pengajuan->kode + $pengajuan->jumlah_harga)}}</strong></p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                    <p align="right">Tanggal Perbaikan : {{$pengajuan->tanggal_perbaikan}}</p>
                    <br>
                    <table style="font-size:11px;" class="table table-striped ">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                            @foreach ($detail_pengajuan as $detail)
                            <tr align="center">
                                <td>{{$no++}}</td>
                                <td>{{$detail->jumlah}}</td>
                                <td align="right">Rp. {{number_format($detail->jumlah_harga)}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" align="right"><strong>Total Harga : </strong></td>
                                <td align="right"><strong>Rp. {{number_format($pengajuan->jumlah_harga)}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right"><strong>Kode Unik : </strong></td>
                                <td align="right"><strong>Rp. {{number_format($pengajuan->kode)}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right"><strong>Total Yang di Transfer : </strong></td>
                                <td align="right"><strong>Rp. {{number_format($pengajuan->kode + $pengajuan->jumlah_harga)}}</strong></td>
                            </tr>
                        </tbody>   
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- End Contact Section -->

@endsection

