@extends('layouts.admin.app')
@section('content')

 
<!-- Begin Page Content -->
<div class="container-fluid">

    @if (session('success'))
    <!-- MAKA TAMPILKAN ALERT SUCCESS -->
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- KETIKA ADA SESSION ERROR  -->
    @if (session('error'))
    <!-- MAKA TAMPILKAN ALERT DANGER -->
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4" style="font-size:12px;"> 
        <div class="card-body">
            <div align="center">
                <h5></h5>
            </div>
            <br>
            <!-- /.container-fluid -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <h4 align="center" class="m-t-0 header-title"><b>Pegawai</b></h4>
                            <!-- Page Heading -->
                            <div class="row">
                                <div class="d-sm-flex align-items-center justify-content-between mb-4" align="right" style="margin-right: 2%;">
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus"></i> </a>
                                </div>
                            </div>
                        </div>
                        <br>
                        @if(count($errors) > 0)
							<div class="alert alert-danger">
								@foreach ($errors->all() as $error)
								{{ $error }} <br/>
								@endforeach
							</div>
							@endif
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Bidang</th>
                                    <th>Alamat Pegawai</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Telpon</th>
                                    <th>Email</th>
                                    <!-- <th width="1%">Gambar Pegawai</th> -->
                                    <th>Keterangan Pegawai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($pegawai as $p)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$p->nama_pegawai}}</td>
                                    <td>{{$p->bidang}}</td>
                                    <td>{{$p->alamat_pegawai}}</td>
                                    <td>{{$p->jk_pegawai}}</td>
                                    <td>{{$p->no_telpon_pegawai}}</td>
                                    <td>{{$p->email_pegawai}}</td>
                                    <!-- <td><img width="80px" src="{{ url('/data_file/'.$p->file) }}"></td> -->
                                    <td>{{$p->ket_pegawai}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ url('/admin/pegawai/'.$p->id_pegawai.'/edit') }}"><i class="fa fa-pencil"></i> </a>
                                        <form action="{{ url('/admin/pegawai/'.$p->id_pegawai) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i> </button>
                                        </form>
                                    </td>                                 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
    </div>


    <!-- container -->
    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                <div class="modal-body">
                    <form action="/upload/proses/pegawai" method="post">
                    @csrf
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Nama Pegawai</label>
                            <input type="text" style="font-size: 12px;" class="form-control" id="nama_pegawai" name="nama_pegawai" required="required" placeholder="Example: Febi Fidhiyanti">
                        </div>
                        <div class="form-group select_keahlian1" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Keahlian</label>
                            <br>
                                <select id="bidang" name="bidang" class="form-select" aria-label="Default select example">
                                    <option value selected="selected" style="color: grey;">-- Pilih Keahlian --</option>
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
                            <input type="text" style="font-size: 12px;" class="form-control" id="alamat_pegawai" name="alamat_pegawai" required="required" placeholder="Example: Jln. Baudanyang No.4 Rt/Rw:12/04">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Jenis Kelamin</label>
                            <div class="row">
                                <p style="margin-left: 3%;"><input type="radio" name="jk_pegawai" id="jk_pegawai" value="laki"> Laki-Laki </p>
                                <p style="margin-left: 3%;"><input type="radio" name="jk_pegawai" id="jk_pegawai" value="perempuan"> Perempuan </p>
                            </div>
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">No Telpon Pegawai</label>
                            <input type="number" style="font-size: 12px;" class="form-control" id="no_telpon_pegawai" name="no_telpon_pegawai" required="required" placeholder="Example: 089619762253">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Email Pegawai</label>
                            <input type="email" style="font-size: 12px;" class="form-control" id="email_pegawai" name="email_pegawai" required="required" placeholder="Example: fidhiyantifebi@gmail.com">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Keterangan Pegawai<span style="font-size: 10px;">*Dapat diisi dengan Part-Time, Full-Time, dll*</span></label>
                            <input type="text" style="font-size: 12px;" class="form-control" id="ket_pegawai" name="ket_pegawai" required="required" placeholder="Example: Part-time">
                        </div>
                        <div class="model-footer" style="text-align:right;">
                            <button type="submit" class="btn-sm btn-success waves-effect waves-light">Save</button>
                            <button type="submit" class="btn-sm btn-danger waves-effect waves-light" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection