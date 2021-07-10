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
                            <h4 align="center" class="m-t-0 header-title"><b>Pembayaran</b></h4>
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
                                    <th>Nama Pelanggan</th>
                                    <th>Total Pembayaran</th>
                                    <th>Tanggal Perbaikan</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($pengajuan as $pengajuans) 
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$pengajuans->user->name}}</td>
                                    <td>Rp. {{number_format($pengajuans->jumlah_harga + $pengajuans->kode)}}</td>
                                    <td>{{$pengajuans->tanggal_perbaikan}}</td>
                                    <form action="{{url('/admin/pembayaran/update/'.$pengajuans->id_pengajuan)}}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="{{$pengajuans->id_pengajuan}}" value="{{ $pengajuans->id_pengajuan }}"> <br/>
                                    <td style="text-align: center; font-size: 10px;">
                                        @csrf
                                            <select class="form-control" style="text-align: center; font-size: 12px;" tabindex="-1" id="status" name="status">
                                                @if( $pengajuans->status == "sudah")
                                                <option class="btn-danger" value="sudah">Belum Bayar</option>
                                                @else( $pengajuans->status == "lunas")
                                                <option class="btn-primary" value="selected">Sudah Bayar</option>
                                                @endif
                                                <hr>
                                                <option value="sudah" class="btn-danger">Belum Bayar</option>
                                                <option value="lunas">Sudah Bayar</option>
                                            </select>
                                    </td>
                                    <td>
                                    <input class="btn-sm btn-success" type="submit" value="✔">
                                    </td> 
                                    </form>                               
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
    </div>

@endsection