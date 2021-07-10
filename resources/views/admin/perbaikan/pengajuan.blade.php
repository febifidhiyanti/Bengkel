
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
    <!-- DataTales Example -->
			<div class="row">
				<div class="container">
					<div class="col-sm-12">
						<div class="card-box table-responsive">
							<div class="row">
								<h4 align="center" class="m-t-0 header-title"><b>Perbaikan</b></h4>
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
										<th></th>
										<th>Aksi</th>
										<th>No</th>
										<th>Nama perbaikan</th>
										<th>Nama Alat</th>
										<th>Kerusakan</th>
										<th>Jenis Perbaikan</th>
										<th>Tanggal Perbaikan</th>
										<th>Biaya Perbaikan</th>
										<th width="1%">Foto Perbaikan</th>
										<th>Waktu Perbaikan</th>
										<th>Alamat Antar Perbaikan</th>
										<!-- <th>Nama Pegawai Perbaikan</th> -->
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 1 @endphp
									@foreach($perbaikan as $pe)
									<tr> 
										<td></td>
										<td>
											<a class="btn btn-warning" href="#"><i class="fa fa-pencil"></i> </a>
											<form action="#" method="post" class="d-inline">
												@method('delete')
												@csrf
												<button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i> </button>
											</form>
										</td>
										<td>{{$i++}}</td>
										<td>{{$pe->nama_perbaikan}}</td>
										<td>{{$pe->nama_alat}}</td>
										<td>{{$pe->kerusakan}}</td>
										<td>{{$pe->jenis_perbaikan}}</td>
										<td>{{$pe->tanggal_perbaikan}}</td>
										<td>{{$pe->biaya_perbaikan}}</td>
										<td><img width="60px" ></td>
										<td>{{$pe->waktu_perbaikan}}</td>
										<td>{{$pe->alamat_antar_perbaikan}}</td>
										<!-- <td>{{$pe->pegawai->nama_pegawai}}</td> -->
										<td>{{$pe->ket_perbaikan}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /.container-fluid -->
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
				<form action="{{url('/admin/perbaikan')}}" method="post">
				@csrf
					
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Nama Perbaikan</label>
						<input type="text" style="font-size: 12px;" class="form-control" id="nama_perbaikan" name="nama_perbaikan" required="required" placeholder="Example: Perbaikan Mesin Motor">
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Nama Alat</label>
						<input type="text" style="font-size: 12px;" class="form-control" id="nama_alat" name="nama_alat" required="required" placeholder="Example: Mesin Bubut">
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Kerusakan</label>
						<input type="text" style="font-size: 12px;" class="form-control" id="kerusakan" name="kerusakan" required="required" placeholder="Example: terdapat lubang">
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">jenis Perbaikan</label>
						<input type="text" style="font-size: 12px;" class="form-control" id="jenis_perbaikan" name="jenis_perbaikan" required="required" placeholder="Example: perbaikan kecil">
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Tanggal Perbaikan</label>
						<input type="date" style="font-size: 12px;" class="form-control" id="tanggal_perbaikan" name="tanggal_perbaikan" required="required" placeholder="Example: tanggal perbaikan">
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Biaya Perbaikan</label>
						<input type="text" style="font-size: 12px;" class="form-control" id="biaya_perbaikan" name="biaya_perbaikan" required="required" placeholder="Example: 34859077">
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Waktu Perbaikan</label>
						<input type="number" style="font-size: 12px;" class="form-control" id="waktu_perbaikan" name="waktu_perbaikan" required="required" placeholder="Example: 3 jam">
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Alamat Antar Perbaikan</label>
						<input type="text" style="font-size: 12px;" class="form-control" id="alamat_antar_perbaikan" name="alamat_antar_perbaikan" required="required" placeholder="Example: fidhiyantifebi@gmail.com">
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Keterangan Perbaikan</label>
						<input type="text" style="font-size: 12px;" class="form-control" id="ket_perbaikan" name="ket_perbaikan" required="required" placeholder="Example: Hari ini">
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

