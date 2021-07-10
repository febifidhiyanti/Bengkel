@extends('layouts.user.appuser')
@section('content')

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
       
    <div class="section-title">
        <h2>Pengajuan</h2>
        <h3><span>Data Pengajuan Perbaikan</span></h3>
        <p>Isilah data dibawah ini, sesuai dengan alat yang ingin anda perbaiki</p>

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
    <div class="row" data-aos="fade-up" data-aos-delay="100">
      
        <div class="coba col-lg-6 ">
            <img src="{{url('template user/assets/img/team/team-6.jpg')}}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6">
            <form action="/layanan/perbaikan" method="POST" enctype="multipart/form-data" class="php-form">
            {{ csrf_field() }}
                <div class="form-group select_keahlian">
                        <select id="id_alat" name="id_alat" required="required" class="form-select">
                        <option>-- Pilih Alat --</option>
                          @foreach ($alat as $al)
                          <option value="{{$al->id_alat}}">{{$al->perlakuan}}</option>
                          @endforeach
                        </select>
                </div>
                <div class="form-group select_keahlian1">
                        <select id="id_bahan_perbaikan" name="id_bahan_perbaikan" required="required" class="form-select">
                        <option>-- Pilih Bahan --</option>
                          @foreach ($bahan_perbaikan as $bahan)
                          <option value="{{$bahan->id_bahan_perbaikan}}">{{$bahan->nama_bahan}}</option>
                          @endforeach
                        </select>
                </div>
                <div class="form-group select_keahlian2">
                        <select id="id_waktu_perbaikan" name="id_waktu_perbaikan" required="required" class="form-select">
                        <option>-- Pilih Waktu --</option>
                          @foreach ($waktu_perbaikan as $waktu)
                          <option value="{{$waktu->id_waktu_perbaikan}}">{{$waktu->waktu}}</option>
                          @endforeach
                        </select>
                </div>
                <!-- <div class="form-group">
                    <img width="100" height="100"/>
                    <input type="file" name="file" class="uploads" style="margin-top: 5px;">
                </div> -->
                <div class="form-group">
                    <textarea class="form-control" name="ket_perbaikan" rows="5" data-rule="required" data-msg="Keterangan Perbaikan" placeholder="Keterangan Perbaikan Anda"></textarea>
                    <div class="validate"></div>
                </div>
                <div class="mb-2">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Pengajuan Anda Telah Terkirim. Terima Kasih!</div>
                </div>
                <div class="text-center"><button type="submit">Kirim</button></div>
            </form>
        </div>

    </div>

    </div>
</section>
<!-- End Contact Section -->

@endsection

