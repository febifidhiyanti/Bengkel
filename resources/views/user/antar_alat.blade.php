@extends('layouts.user.appuser')
@section('content')

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

    <div class="section-title">
        <h2>Perbaikan</h2>
        <h3><span>Data Perbaikan</span></h3>
        <p>Isilah data perbaikan dibawah ini, sesuai dengan alat yang akan anda perbaiki.</p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
        
        <div class="coba col-lg-6 ">
            <img src="{{url('template user/assets/img/team/team-6.jpg')}}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6">
        <form action="#" method="post" role="form" class="php-email-form">
            <div class="form-row">
            <div class="col form-group">
                <input type="text" name="nama_perbaikan" class="form-control" id="nama_perbaikan" placeholder="Nama Perbaikan" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
            </div>
            <div class="col form-group">
                <input type="text" class="form-control" name="nama_alat" id="nama_alat" placeholder="Nama Alat" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
            </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="kerusakan" id="kerusakan" placeholder="Kerusakan" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="tanggal_perbaikan" id="tanggal_perbaikan" placeholder="Tanggal Perbaikan" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="waktu_perbaikan" id="waktu_perbaikan" placeholder="Waktu Perbaikan (hari)" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="alamat_antar_perbaikan" rows="5" data-rule="required" data-msg="Alamat Lengkap" placeholder="Alamat Antar Perbaikan Anda"></textarea>
                <div class="validate"></div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="ket_perbaikan" rows="5" data-rule="required" data-msg="Keterangan Perbaikan" placeholder="Keterangan Perbaikan Anda"></textarea>
                <div class="validate"></div>
            </div>
            <div class="mb-2">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Kirim</button></div>
        </form>
        </div>

    </div>

    </div>
</section>
<!-- End Contact Section -->

@endsection

