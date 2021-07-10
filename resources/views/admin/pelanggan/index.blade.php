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
                <div class="col-sm-12 text-center">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <h4 align="center" class="m-t-0 header-title"><b>Pelanggan</b></h4>
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
                        <table id="datatable-buttons" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama pelanggan</th>
                                    <th>Alamat pelanggan</th>
                                    <th>Email Pelanggan</th>
                                    <th>No Telpon</th>
                                    <th>Jenis kelamin</th>
                                    <th>Keterangan pelanggan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($pelanggan as $pl)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$pl->nama_pelanggan}}</td>
                                    <td>{{$pl->alamat_pelanggan}}</td>
                                    <td>{{$pl->email_pelanggan}}</td>
                                    <td>{{$pl->no_telp_pelanggan}}</td>
                                    <td>{{$pl->jk_pelanggan}}</td>
                                    <td>{{$pl->ket_pelanggan}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="#"><i class="fa fa-pencil"></i> </a>
                                        <form action="#" method="post" class="d-inline">
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
                        <h6 class="modal-title">Tambah Data</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                <div class="modal-body">
                    <form action="{{url('/admin/pelanggan')}}" method="post">
                    @csrf
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Nama Pelanggan</label>
                            <input type="text" style="font-size: 12px;" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required="required" placeholder="Example: Febi Fidhiyanti">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Alamat Pelanggan</label>
                            <input type="text" style="font-size: 12px;" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" required="required" placeholder="Example: Perbaikan Mesin Kecil">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Email Pelanggan</label>
                            <input type="email" style="font-size: 12px;" class="form-control" id="email_pelanggan" name="email_pelanggan" required="required" placeholder="Example: Jln. Baudanyang No.4 Rt/Rw:12/04">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Password Pelanggan</label>
                            <input type="password" style="font-size: 12px;" class="form-control" id="pass_pelanggan" name="pass_pelanggan" required="required" placeholder="Example: R1z4L@_.">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Jenis Kelamin</label>
                            <div class="row">
                                <p style="margin-left: 3%;"><input type="radio" name="jk_pelanggan" id="jk_pelanggan" value="laki"> Laki-Laki </p>
                                <p style="margin-left: 3%;"><input type="radio" name="jk_pelanggan" id="jk_pelanggan" value="perempuan"> Perempuan </p>
                            </div>
                        </div>                       
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">No Telepon Pelanggan</label>
                            <input type="number" style="font-size: 12px;" class="form-control" id="no_telp_pelanggan" name="no_telp_pelanggan" required="required" placeholder="Example: 089619762253">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Keterangan Pelanggan</label>
                            <input type="text" style="font-size: 12px;" class="form-control" id="ket_pelanggan" name="ket_pelanggan" required="required" placeholder="Example: Segera">
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