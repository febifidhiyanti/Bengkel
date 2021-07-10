@extends('layouts.user.appuser')
@section('content')


 <!-- ======= Portfolio Section ======= -->
 <section id="portfolio" class="portfolio " style="margin-top:8%;">
    <div class="container" data-aos="fade-up">
    
      <div class="section-title">
          @if(!empty($informasi))
            <h2>Informasi</h2>
          @endif
          @if(empty($informasi))
            <h2>maaf masih kosong</h2>
          @endif
      </div>
      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200" style="background-color: #black;">
      @foreach($informasi as $g)
        <div class="col-lg-4 col-md-6 portfolio-item">
          <img src="{{ url('/data_file/'.$g->file) }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>{{$g->judul_informasi}}</h4>
            <p>{{$g->ket_informasi}}</p>
            <a href="{{ url('/data_file/'.$g->file) }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{$g->judul_informasi}}"><i class="bx bx-plus"></i></a>
            <a href="/perbaikan" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </section>
  <!-- End Portfolio Section -->
@endsection