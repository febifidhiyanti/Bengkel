
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
								<h4 align="center" class="m-t-0 header-title"><b>Informasi</b></h4>
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
										<th>Judul Informasi</th>
										<th>Isi Informasi</th>
										<th>Tanggal Informasi</th>
										<th width="1%">Gambar Informasi</th> 
										<th>Keterangan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 1 @endphp
									@foreach($informasi as $g)
									<tr> 
										<td>{{$i++}}</td>
										<td>{{$g->judul_informasi}}</td>
										<td>{{$g->isi_informasi}}</td>
										<td>{{$g->tanggal_informasi}}</td>
										<td><img width="80px" src="{{ url('/data_file/'.$g->file) }}"></td>
										<td>{{$g->ket_informasi}}</td>
										<td align="center">
											<a class="on-default edit-row btn btn-warning " href="{{ url('/admin/informasi/'.$g->id_informasi.'/edit') }}"><i class="fa fa-pencil"></i> </a>
											<form action="{{ url('/admin/informasi/'.$g->id_informasi) }}" method="post" >
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
		</div>
	</div>
<!-- /.container-fluid -->
</div>

<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<form action="/upload/proses" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group" style="font-size: 12px;">
							<b>Judul Informasi</b>
							<input type="text" style="font-size: 12px;" class="form-control" name="judul_informasi">
						</div>
						<div class="form-group" style="font-size: 12px;">
							<b>Isi Informasi</b>
							<textarea style="font-size: 12px;" class="form-control" name="isi_informasi"></textarea>
						</div>
						<div class="form-group" style="font-size: 12px;">
							<b>Tanggal Informasi</b>
							<input type="date" style="font-size: 12px;" class="form-control" name="tanggal_informasi">
						</div>
						<div class="form-group" style="font-size: 12px;">
							<b>Gambar Informasi</b><br/>
							<img width="100" height="100"/>
							<input type="file" name="file" class="uploads form-control" style="margin-top: 5px;">
						</div>
						<div class="form-group" style="font-size: 12px;">
							<label for="field-3" class="control-label">Keterangan</label>
							<textarea class="form-control" name="ket_informasi" style="font-size: 12px;"></textarea>
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

