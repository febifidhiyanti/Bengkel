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

<!-- <h5 class="m-0 text-dark" style="padding:10px;">Edit Data</h5> -->

<section class="content">
    <div class="card shadow mb-4 ">
        <div class="container-fluid">
       <div class="row">
                <div class="col-lg-12">
                    <div class="card card-box box">
                       <h4 align="center" class="m-t-0 header-title"><b>Ubah Data Informasi</b></h4>
                        <div class="card-body">
                            <div class="content">
                                <div class="dialog">
                                    <div class="card-body">
                                    @if (session('success'))
                                    <!-- MAKA TAMPILKAN ALERT SUCCESS -->
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    <!-- KETIKA ADA SESSION ERROR  -->
                                    @if (session('error'))
                                    <!-- MAKA TAMPILKAN ALERT DANGER -->
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif

                                    <!-- container -->
                                        <form action="{{url('/admin/informasi/'.$informasi->id_informasi)}}" method="post"  enctype="multipart/form-data">

                                        @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                            {{ $error }} <br/>
                                            @endforeach
                                        </div>
                                        @endif

                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="{{$informasi->id_informasi}}" value="{{ $informasi->id_informasi }}"> <br/>
                                           
                                                <div class="form-group" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">Judul Informasi </label>
                                                    <input type="text" style="font-size: 12px;" class="form-control" required="required" name="judul_informasi" value="{{ $informasi->judul_informasi}}">
                                                </div>
                                                <div class="form-group" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">Informasi</label>
                                                    <input type="text" style="font-size: 12px;" class="form-control" id="isi_informasi" name="isi_informasi" required="required" placeholder="Example: Diskon sebanyak 2%" value="{{ $informasi->isi_informasi}}">
                                                </div>
                                                <div class="form-group" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">Tanggal Informasi</label>
                                                    <input type="date" style="font-size: 12px;" class="form-control" id="tanggal_informasi" name="tanggal_informasi" required="required" value="{{ $informasi->tanggal_informasi}}">
                                                </div>
                                                <label for="field-3" class="control-label">Gambar Informasi</label>
                                                <div class="form-group" style="font-size: 12px;">
                                                    <div>
                                                        <img width="120" height="120" @if($informasi->file) src="{{ asset('data_file/'.$informasi->file) }}" @endif />
                                                        <input type="file" class="uploads form-control" style="margin-top: 20px;" name="file" id="file" value="{{ $informasi->file}}" >
                                                    </div>
                                                </div>
                                                <div class="form-group" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">Keterangan Pegawai</label>
                                                    <input type="text" style="font-size: 12px;" class="form-control" id="ket_informasi" name="ket_informasi" required="required" placeholder="up to 2 day" value="{{ $informasi->ket_informasi}}">
                                                </div>
                                                <div style="text-align:right;">
                                                    <input class="btn-sm btn-success" type="submit" value="Save">
                                                    <a class="btn-sm btn-danger waves-effect waves-light" href="{{url('/admin/informasi/')}}">Back</a>   
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection