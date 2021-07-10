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
                       <h4 align="center" class="m-t-0 header-title"><b>Ubah Data perbaikan</b></h4>
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
                                        <form action="{{url('/admin/perbaikan/'.$perbaikan->id_perbaikan)}}" method="post"  enctype="multipart/form-data">

                                        @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                            {{ $error }} <br/>
                                            @endforeach
                                        </div>
                                        @endif

                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="{{$perbaikan->id_perbaikan}}" value="{{ $perbaikan->id_perbaikan }}"> <br/>
                                           
                                                <div class="form-group" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">Nama Alat atau Paket</label>
                                                    <input type="text" style="font-size: 12px;" class="form-control" required="required" name="nama" value="{{ $perbaikan->nama}}">
                                                </div>

                                                <div class="form-group" style="font-size: 12px;">
                                                <label for="field-3" class="control-label">Waktu Perbaikan</label><br>
                                                    <select style="font-size: 12px;" data-placeholder="Pilih Waktu ..." class="chosen-select form-control" tabindex="-1"
                                                    id="id_waktu_perbaikan" name="id_waktu_perbaikan" require>
                                                        <option style="font-size: 12px;" value selected="selected" >-- Select Waktu --</option>
                                                        @foreach ( $waktu_perbaikan as $wp)
                                                            <option style="font-size: 12px;" value="{{$wp->id_waktu_perbaikan}}"
                                                            <?php if ($wp->id_waktu_perbaikan === $perbaikan->waktu_perbaikan_id): ?>
                                                                    selected
                                                            <?php endif ?>
                                                            >{{$wp->waktu}} - Rp.{{number_format($wp->harga)}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group" style="font-size: 12px;">
                                                <label for="field-3" class="control-label">Perlakuan Perbaikan</label><br>
                                                    <select style="font-size: 12px;" data-placeholder="Pilih Perlakuan ..." class="chosen-select form-control" tabindex="-1"
                                                    id="id_alat" name="id_alat" require>
                                                        <option style="font-size: 12px;" value selected="selected">-- Select Perlakuan --</option>
                                                        @foreach ( $alat as $al)
                                                            <option style="font-size: 12px;" value="{{$al->id_alat}}"
                                                            <?php if ($al->id_alat === $perbaikan->alat_id): ?>
                                                                    selected
                                                            <?php endif ?>
                                                            >{{$al->perlakuan}} - Rp.{{number_format($al->harga)}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group" style="font-size: 12px;">
                                                <label for="field-3" class="control-label">Bahan Perbaikan</label><br>
                                                    <select style="font-size: 12px;" data-placeholder="Pilih Bahan ..." class="chosen-select form-control" tabindex="-1"
                                                    id="id_bahan_perbaikan" name="id_bahan_perbaikan" require>
                                                        <option style="font-size: 12px;" value selected="selected">-- Select Bahan --</option>
                                                        @foreach ( $bahan_perbaikan as $bhn)
                                                            <option style="font-size: 12px;" value="{{$bhn->id_bahan_perbaikan}}"
                                                            <?php if ($bhn->id_bahan_perbaikan === $perbaikan->bahan_perbaikan_id): ?>
                                                                    selected
                                                            <?php endif ?>
                                                            >{{$bhn->nama_bahan}} - Rp.{{number_format($bhn->harga)}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <label for="field-3" style="font-size: 12px;" class="control-label">Gambar Alat</label>
                                                <div class="form-group" style="font-size: 12px;">
                                                    <div>
                                                        <img width="120" height="120" @if($perbaikan->image) src="{{ asset('gambar_perbaikan/'.$perbaikan->image) }}" @endif />
                                                        <input type="file" class="uploads form-control" style="margin-top: 20px;" name="image" id="image" value="{{$perbaikan->image}}" >
                                                    </div>
                                                </div>

                                                <div class="form-group" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">Jumlah Harga</label>
                                                    <input type="number" style="font-size: 12px;" class="form-control" required="required" name="jumlah_perbaikan" value="{{$perbaikan->jumlah_perbaikan}}">
                                                </div>

                                                <div style="text-align:right;">
                                                    <input class="btn-sm btn-success" type="submit" value="Save">
                                                    <a class="btn-sm btn-danger waves-effect waves-light" href="{{url('/admin/perbaikan/')}}">Back</a>   
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