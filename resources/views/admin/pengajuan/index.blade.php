
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
								<h4 align="center" class="m-t-0 header-title"><b>Pengajuan</b></h4>
								<!-- Page Heading -->
								
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
										<th>Foto Pelanggan</th>
										<th>Nama Pelanggan</th>
										<th>Nama Perbaikan</th>
										<th>Gambar Perbaikan</th>
										<th>Jumlah Perbaikan</th>
										<th>Tanggal Perbaikan</th>
										<th>Total Harga</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 1 @endphp
									@foreach($detail_pengajuan as $detail)
									<tr> 
										<td>{{$i++}}</td>
										<td><img width="50px" src="{{ url('/gambar_user/'.$detail->user->photo) }}"></td>
										<td>{{$detail->user->name}}</td>
										<td>{{$detail->perbaikan->nama}}</td>
										<td><img width="80px" src="{{ url('/gambar_perbaikan/'.$detail->perbaikan->image) }}"></td>
                                    	<td>{{$detail->jumlah}}</td>
										<td>{{$detail->pengajuan->tanggal_perbaikan}}</td>
										<td>Rp. {{number_format($detail->jumlah_harga)}}</td>
										<td align="center">
                                        <!-- <a class="on-default edit-row btn btn-warning " href="#"><i class="fa fa-pencil"></i> </a> -->
                                        <form action="{{ url('/admin/pengajuan/'.$detail->id_detail_pengajuan) }}" method="post" >
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



@endsection

