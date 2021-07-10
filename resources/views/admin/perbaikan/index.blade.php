
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
										<th>No</th>
										<th>Nama Paket/ Alat</th>
										<th>Waktu Perbaikan - Harga</th>
										<th>Perlakuan - Harga</th>
										<th>Bahan Perbaikan - Harga</th>
										<th width="1%">Foto Perbaikan</th>
										<th>Jumlah Harga</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 1 @endphp
									@foreach($perbaikan as $pe)
									<tr> 
										<td>{{$i++}}</td>
										<td>{{$pe->nama}}</td>
										<td>{{$pe->waktu_perbaikan->waktu}} - Rp.{{number_format($pe->waktu_perbaikan->harga)}}</td>
										<td>{{$pe->alat->perlakuan}} - Rp.{{number_format($pe->alat->harga)}}</td>
										<td>{{$pe->bahan_perbaikan->nama_bahan}} - Rp.{{number_format($pe->bahan_perbaikan->harga)}}</td>
										<td><img width="80px" src="{{ url('/gambar_perbaikan/'.$pe->image) }}"></td>
										<td>Rp.{{number_format($pe->jumlah_perbaikan)}}</td>
										<td>
											<a class="btn btn-warning btn-sm" href="{{ url('/admin/perbaikan/'.$pe->id_perbaikan.'/edit') }}"><i class="fa fa-pencil"></i> </a>
											<form action="{{ url('/admin/perbaikan/'.$pe->id_perbaikan) }}" method="post" >
												@method('delete')
												@csrf
												<button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i> </button>
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

<!-- container -->
<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Tambah Data</h6>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
			<div class="modal-body">
				<form action="{{url('/upload')}}" method="post" enctype="multipart/form-data">
				@csrf
					
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Nama Alat atau Paket</label>
						<input type="text" style="font-size: 12px;" class="form-control" id="nama" name="nama" required="required" placeholder="Example: PAKET 1">
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Waktu Perbaikan</label><br>
						<select style="font-size: 12px;" id="id_waktu_perbaikan" class="form-control" name="id_waktu_perbaikan" class="form-control form-select">
							<option>-- Pilih Waktu Perbaikan --</option>
							@foreach ($waktu_perbaikan as $waktu)
							<option value="{{$waktu->id_waktu_perbaikan}}">{{$waktu->waktu}} - Rp.{{number_format($waktu->harga)}}</option>
							@endforeach
                        </select>
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Perlakuan</label>
						<select id="id_alat" style="font-size: 12px;" name="id_alat" class="form-control form-select">
							<option>-- Pilih Perlakuan Perbaikan --</option>
							@foreach ($alat as $al)
							<option value="{{$al->id_alat}}">{{$al->perlakuan}} - Rp.{{number_format($al->harga)}}</option>
							@endforeach
                        </select>
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Bahan Perbaikan</label>
						<select id="id_bahan_perbaikan" name="id_bahan_perbaikan" style="font-size: 12px;" class="form-control form-select">
							<option>-- Pilih Bahan  --</option>
							@foreach ($bahan_perbaikan as $bahan)
							<option value="{{$bahan->id_bahan_perbaikan}}">{{$bahan->nama_bahan}} - Rp.{{number_format($bahan->harga)}}</option>
							@endforeach
                        </select>
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Gambar Paket atau Alat</label><br>
						<img width="100" height="100"/>
						<input type="file" name="image" id="image" class="uploads form-control" style="margin-top: 5px;">
					</div>
					<div class="form-group" style="font-size: 12px;">
						<label for="field-3" class="control-label">Jumlah Harga</label>
						<input type="integer" style="font-size: 12px;" class="form-control" id="jumlah_perbaikan" name="jumlah_perbaikan" required="required">
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

