@extends('layouts.admin.app')
@section('content')

<!-- <h5 class="m-0 text-dark" style="padding:10px;">Edit Data</h5> -->

<section class="content">
    <div class="card shadow mb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-box box">
                    <h4 align="center" class="m-t-0 header-title"><b>Ubah Data Pegawai</b></h4>
                        <div class="card-body">
                            <div class="content">
                                <div class="dialog">
                                    <div class="card-body">
                    
                                    <!-- container -->
                                        <form action="{{url('/admin/pegawai/'.$pegawai->id_pegawai)}}" method="post">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="{{$pegawai->id_pegawai}}" value="{{ $pegawai->id_pegawai }}"> <br/>

                                                <div class="form-group" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">Nama Pegawai </label>
                                                    <input type="text" style="font-size: 12px;" class="form-control" required="required" name="nama_pegawai" value="{{ $pegawai->nama_pegawai}}">
                                                </div>
                                                <div class="form-group select_keahlian" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">Keahlian</label>
                                                    <br>
                                                    <select id="bidang" name="bidang" class="form-select" aria-label="Default select example" value="{{ $pegawai->bidang}}">
                                                        <option value selected="selected" style="background-color:#DCDCDC">{{ $pegawai->bidang}}</option>
                                                        <option value >-- Pilih Keahlian --</option>
                                                        <option value="Perbaikan Mesin Kecil Mudah" >Perbaikan Mesin Kecil Mudah</option>
                                                        <option value="Perbaikan Mesin Kecil Susah" >Perbaikan Mesin Kecil Susah</option>
                                                        <option value="Perbaikan Mesin Sedang Mudah">Perbaikan Mesin Sedang Mudah</option>
                                                        <option value="Perbaikan Mesin Sedang Susah">Perbaikan Mesin Sedang Susah</option>
                                                        <option value="Perbaikan Mesin Besar Mudah">Perbaikan Mesin Besar Mudah</option>
                                                        <option value="Perbaikan Mesin Besar Susah">Perbaikan Mesin Besar Susah</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">Alamat Pegawai</label>
                                                    <input type="text" style="font-size: 12px;" class="form-control" id="alamat_pegawai" name="alamat_pegawai" required="required" placeholder="Example: Jln. Baudanyang No.4 Rt/Rw:12/04" value="{{ $pegawai->bidang}}">
                                                </div>
                                                <div class="form-group" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">Jenis Kelamin</label>
                                                    <input type="text" style="font-size: 12px;" class="form-control" id="jk_pegawai" name="jk_pegawai" required="required" placeholder="Example: Laki-laki" value="{{ $pegawai->jk_pegawai}}">
                                                </div>
                                                <div class="form-group" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">No Telpon Pegawai</label>
                                                    <input type="number" style="font-size: 12px;" class="form-control" id="no_telpon_pegawai" name="no_telpon_pegawai" required="required" placeholder="Example: 089619762253" value="{{ $pegawai->no_telpon_pegawai}}">
                                                </div>
                                                <div class="form-group" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">Email Pegawai</label>
                                                    <input type="email" style="font-size: 12px;" class="form-control" id="email_pegawai" name="email_pegawai" required="required" placeholder="Example: fidhiyantifebi@gmail.com" value="{{ $pegawai->email_pegawai}}">
                                                </div>
                                                <div class="form-group" style="font-size: 12px;">
                                                    <label for="field-3" class="control-label">Keterangan Pegawai</label>
                                                    <input type="text" style="font-size: 12px;" class="form-control" id="ket_pegawai" name="ket_pegawai" required="required" placeholder="Example: Part-time" value="{{ $pegawai->ket_pegawai}}">
                                                </div>
                                                <div style="text-align:right;">
                                                    <input class="btn-sm btn-success" type="submit" value="Save"> 
                                                    <a class="btn-sm btn-danger waves-effect waves-light" href="{{url('/admin/pegawai/')}}">Back</a>   
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