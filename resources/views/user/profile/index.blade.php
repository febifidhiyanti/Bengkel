@section('js')
<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts.user.appuser')
@section('content')

<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>profile</h2>
          <h3><span>My Profile</span></h3>
        </div>

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

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Address</h3>
              <p>{{$user->alamat}}</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>{{$user->email}}</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Mobile</h3>
              <p>{{$user->no_telp}}</p>
            </div>
          </div>

        </div>

      <form action="{{ url('profile/update') }}" enctype="multipart/form-data" method="post" >
            @csrf

          <div class="row" data-aos="fade-up" data-aos-delay="100">
    
          <div class="col-lg-6">
            <div class="form-group">
              <img width="98%" @if($user->photo) src="{{ asset('gambar_user/'.$user->photo) }}" @endif />
              <div class="col-lg-12">
                  <input type="file" class="uploads form-control" name="photo" id="photo" value="{{$user->photo}}" >                
              </div>
            </div>
          </div>
        
          <div class="col-lg-6">
              <div class="form-row">
                    <div class="col form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <input id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{$user->no_telp}}" required autocomplete="no_telp" autofocus>
                    @error('no_telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                      <textarea id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required autocomplete="alamat" autofocus>{{$user->alamat}}</textarea>
                      @error('alamat')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                  </div>
                  <div class="text-center"><button type="submit" class="btn" style="background-color: #5fbeaa;">Simpan</button></div>
            </form>
          </div>
            
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

@endsection