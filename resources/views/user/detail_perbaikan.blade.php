@extends('layouts.user.appuser')
@section('content')

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
       
        <div class="section-title">
            <h2>Pengajuan</h2>
            <h3><span>Detail Pengajuan Perbaikan</span></h3>

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
            <button><a class="btn btn-warning mt-5" style="padding: 2%;" href="{{ url('history') }}">Riwayat Perbaikan Anda</a></button>
            <button><a class="btn btn-warning mt-5" style="padding: 2%;" href="{{ url('history') }}">Riwayat Perbaikan Anda</a></button>
        </div>
    <br>
        <div class="row">
        @foreach ($perbaikan as $prbaikn)
            <div class="col-md-4 col-12">
                <div class="card">
                    <img  style="height: 250px;" src="{{ url('/gambar_perbaikan/'.$prbaikn->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <form method="post" action="{{url('/perbaikan')}}/{{$prbaikn->id_perbaikan}}" enctype="multipart/form-data">
                        @csrf
                        <table style="font-size:11px; height: 400px;" class="table">
                            <p align="center"><strong>{{$prbaikn->nama}}</strong></p>
                            <tbody>
                                <td>Perbaikan</td>
                                    <td>:</td>
                                    <td>{{ $prbaikn->alat->perlakuan}}</td>
                                    <td>Rp.{{number_format( $prbaikn->alat->harga)}}</td>
                                </tr>
                                <tr>
                                    <td>Bahan Alat</td>
                                    <td>:</td>
                                    <td>{{ $prbaikn->bahan_perbaikan->nama_bahan}}</td>
                                    <td>Rp.{{number_format( $prbaikn->alat->harga)}}</td>
                                </tr>
                                <tr>
                                    <td>Waktu</td>
                                    <td>:</td>
                                    <td>{{ $prbaikn->waktu_perbaikan->waktu}}</td>
                                    <td>Rp.{{number_format($prbaikn->waktu_perbaikan->harga)}}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Harga</td>
                                    <td>:</td>
                                    <td></td>
                                    <td><strong>Rp.{{number_format($prbaikn->jumlah_perbaikan)}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td colspan="2">
                                       
                                            <div class="form-group">
                                                <textarea style="font-size: 10px;" type="text" name="ket_perbaikan" class="form-control" required="required"></textarea>
                                            </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>:</td>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <input style="font-size: 10px;" type="number" name="jumlah_pesan" class="form-control" required="required">
                                        </div>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group text-center">
                            <button type="submit" style="font-size: 10px;" class="btn btn-primary mt-5 ml-4">Perbaiki</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
<!-- End Contact Section -->

@endsection

