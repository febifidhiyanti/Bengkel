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
                            <h4 align="center" class="m-t-0 header-title"><b>admin</b></h4>
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
                                    <th>Nama admin</th>
                                    <th>Role Admin</th>
                                    <th>Alamat admin</th>
                                    <th>Email admin</th>
                                    <th>No Telpon</th>
                                    <th>Jenis kelamin</th>
                                    <th>Keterangan admin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($admin as $admn)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$admn->nama_admin}}</td>
                                    <td>{{$admn->role_admin}}</td>
                                    <td>{{$admn->alamat_admin}}</td>
                                    <td>{{$admn->email_admin}}</td>
                                    <td>{{$admn->no_telp_admin}}</td>
                                    <td>{{$admn->jk_admin}}</td>
                                    <td>{{$admn->ket_admin}}</td>
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
                    <form action="{{url('/admin/admin')}}" method="post">
                    @csrf
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Nama admin</label>
                            <input type="text" style="font-size: 12px;" class="form-control" id="nama_admin" name="nama_admin" required="required" placeholder="Example: Febi Fidhiyanti">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Role admin</label>
                            <input type="text" style="font-size: 12px;" class="form-control" id="role_admin" name="role_admin" required="required" placeholder="Example: Admin/ Admin Kas">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Alamat admin</label>
                            <input type="text" style="font-size: 12px;" class="form-control" id="alamat_admin" name="alamat_admin" required="required" placeholder="Example: Perbaikan Mesin Kecil">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Email admin</label>
                            <input type="email" style="font-size: 12px;" class="form-control" id="email_admin" name="email_admin" required="required" placeholder="Example: Jln. Baudanyang No.4 Rt/Rw:12/04">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Password admin</label>
                            <input type="password" style="font-size: 12px;" class="form-control" id="pass_admin" name="pass_admin" required="required" placeholder="Example: R1z4L@_.">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Jenis Kelamin</label>
                            <div class="row">
                                <p style="margin-left: 3%;"><input type="radio" name="jk_admin" id="jk_admin" value="laki"> Laki-Laki </p>
                                <p style="margin-left: 3%;"><input type="radio" name="jk_admin" id="jk_admin" value="perempuan"> Perempuan </p>
                            </div>
                        </div>                       
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">No Telepon admin</label>
                            <input type="number" style="font-size: 12px;" class="form-control" id="no_telp_admin" name="no_telp_admin" required="required" placeholder="Example: 089619762253">
                        </div>
                        <div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Keterangan admin</label>
                            <input type="text" style="font-size: 12px;" class="form-control" id="ket_admin" name="ket_admin" required="required" placeholder="Example: Segera">
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