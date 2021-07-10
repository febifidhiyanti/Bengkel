@extends('layouts.user.appuser')
@section('content')

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

    @if(empty($pengajuan))
    <div class="section-title">
        <h2>Perbaikan</h2>
        <h3><span>Data Perbaikan</span></h3>
        <p>kosong</p>
    </div>
    @endif
    @if(!empty($pengajuan))
    <div class="section-title">
        <h2>Perbaikan</h2>
        <h3><span>Data Perbaikan</span></h3>

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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                            @foreach ($detail_pengajuan as $detail)
                            <tr align="center">
                                <td>{{$no++}}</td>
                                <td>{{$detail->jumlah}}</td>
                                <td align="right">Rp. {{number_format($detail->jumlah_harga)}}</td>
                                <td>
                                <form action="{{url('/layanan/detail/perbaikan')}}/{{$detail->id_detail_pengajuan}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" style="font-size: 11px;" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus nya?');" >hapus</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" align="right"><strong>Total Harga : </strong></td>
                                <td align="right"><strong>Rp. {{number_format($pengajuan->jumlah_harga)}}</strong></td>
                                <td colspan="4" align="center">
                                    <a style="font-size: 11px;" href="{{url('konfirmasi-check-out')}}" class="btn btn-success" onclick="return confirm('Apakah anda yakin akan check out?');">check-out</a>
                                </td>
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

