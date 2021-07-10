<!-- Stored in resources/views/child.blade.php -->
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

@extends('layouts.admin.app')
@section('content')

<div class="container-fluid">
    <div class="container" data-aos="fade-up">
        <div class="col-lg-12" style="margin-top: 5%;">
            <div class="profile-detail card-box">
                <div>
                    <img src="{{ url('/gambar_user/'.$user->photo) }}" class="img-circle" alt="profile-image">

                    <!-- <button type="button" class="btn btn-pink btn-custom btn-rounded waves-effect waves-light">Follow</button> -->

                    <!-- <hr> -->
                    <h4 class="text-uppercase font-600">Profile Me</h4>
                    <!-- <p class="text-muted font-13 m-b-30">
                        Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.
                    </p> -->

                    <div class="text-left">
                    <table style="font-size:12px; margin-top: 3%;" class="table">
                        <tbody>
                            <tr>
                                <td><b>Nama</b></td>
                                <td width="20"></td>
                                <td align="right">{{$user->name}}</td> 
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td></td>
                                <td align="right">{{$user->email}}</td> 
                            </tr>
                            <tr>
                                <td><b>No Hp</b></td>
                                <td></td>
                                <td align="right">{{$user->no_telp}}</td> 
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td></td>
                                <td align="right">{{$user->alamat}}</td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>

            </div>
            <div class="card-box">
                <h4 class="m-t-20 m-b-20 header-title"><b>Edit <span class="text-muted">Profile</span></b></h4>

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

                    <div class="section-title">
                        
                        <div class="card mt-3">
                            <div class="card-body"  style="font-size:11px;  margin-top: 3%;">
                            <form method="POST" action="{{ url('admin/profile/update') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-2 text-md-right">{{ __('Nama') }}</label>

                                <div class="col-md-10">
                                    <input style="font-size:12px;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Foto</label>

                                <div class="col-md-3">
                                    <img width="90" height="90" @if($user->photo) src="{{ asset('gambar_user/'.$user->photo) }}" @endif />
                                    <input type="file" class="uploads form-control" style="margin-top: 10px; font-size: 10px;" name="photo" id="photo" value="{{$user->photo}}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-2 text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-10">
                                    <input style="font-size:12px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_telp" class="col-md-2 text-md-right">No HP</label>

                                <div class="col-md-10">
                                    <input style="font-size:12px;" id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{$user->no_telp}}" required autocomplete="no_telp" autofocus>

                                    @error('no_telp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat" class="col-md-2 text-md-right">{{ __('Alamat') }}</label>

                                <div class="col-md-10">
                                    <textarea style="font-size:12px;" id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required autocomplete="alamat" autofocus>{{$user->alamat}}</textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-2 text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-10">
                                    <input id="password" style="font-size:10px;"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" >

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-2 ext-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-10">
                                    <input id="password-confirm" style="font-size:10px;"  type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div> 

                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-2">
                                    <button  style="font-size:12px; background-color: #5fbeaa; margin-top: 2%; margin-bottom: 2%; color: white;" type="submit" class="btn form-control">
                                        {{ __('Simpan') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>        
    </div>
</div>

@endsection