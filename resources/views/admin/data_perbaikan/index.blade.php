@extends('layouts.admin.app')
@section('content')

 
<!-- Begin Page Content -->
<div class="container-fluid">

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
                            <h4 align="center" class="m-t-0 header-title"><b>Data Perbaikan</b></h4>
                            <!-- Page Heading -->
                            <!-- <div class="row">
                                <div class="d-sm-flex align-items-center justify-content-between mb-4" align="right" style="margin-right: 2%;">
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus"></i> </a>
                                </div>
                            </div> -->
                        </div>
                        <br>
                        @if(count($errors) > 0)
                        <div class="alert alert-danger" style="margin-top: 20%;">
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
                        
                        <table id="datatable-buttons" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Perbaikan</th>
                                    <th>Status Perbaikan</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($pengajuan as $pengajuans) 
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$pengajuans->user->name}}</td>
                                    <td>{{$pengajuans->tanggal_perbaikan}}</td>
                                    <form action="{{url('/admin/data_perbaikan/update/'.$pengajuans->id_pengajuan)}}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="{{$pengajuans->id_pengajuan}}" value="{{ $pengajuans->id_pengajuan }}"> <br/>
                                    <td style="text-align: center; font-size: 10px;">
                                        @csrf
                                            <select class="form-control" style="text-align: center; font-size: 12px;" tabindex="-1" id="status_perbaikan" name="status_perbaikan">
                                                <option class="btn-danger"  value selected="selected">{{$pengajuans->status_perbaikan}}</option>
                                                
                                                <hr>
                                                <option value="proses" class="btn-danger">Perbaikan</option>
                                                <option value="selesai">Selesai</option>
                                            </select>
                                    </td>
                                    <td>
                                        <input class="btn btn-success" type="submit" value="✔">
                                    </td> 
                                    </form>         
                                    <td align="center">
                                        <!-- <a class="on-default edit-row btn btn-warning " href="#"><i class="fa fa-pencil"></i> </a> -->
                                        <form action="{{ url('/admin/data_perbaikan/'.$pengajuans->id_pengajuan) }}" method="post" >
                                            @method('delete')
                                            @csrf
                                            <button class="on-default edit-row btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i> </button>
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

    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<form action="/admin/data_perbaikan/upload/proses" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Pengguna</label><br>
                            <select style="font-size: 12px;" id="id" class="form-control" name="id" class="form-control form-select">
                                <option>-- Pilih Pengguna --</option>
                                @foreach ($user as $users)
                                <option value="{{$users->id}}">{{$users->name}}</option>
                                @endforeach
                            </select>
					    </div>
						<div class="form-group" style="font-size: 12px;">
                            <label for="field-3" class="control-label">Perbaikan</label><br>
                            <select style="font-size: 12px;" id="id_perbaikan" class="form-control" name="id_perbaikan" class="form-control form-select">
                                <option>-- Pilih Perbaikan --</option>
                                @foreach ($perbaikan as $perbaikans)
                                <option value="{{$perbaikans->id_perbaikan}}">{{$perbaikans->nama}}</option>
                                @endforeach
                            </select>
					    </div>
                        <div class="form-group" style="font-size: 12px;">
							<label for="field-3" class="control-label">Jumlah pesan</label>
							<input type="number" class="form-control" name="jumlah_pesan" style="font-size: 12px;"></textarea>
						</div>
						<div class="form-group" style="font-size: 12px;">
							<label for="field-3" class="control-label">Keterangan</label>
							<textarea class="form-control" name="ket_perbaikan" style="font-size: 12px;"></textarea>
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