@extends('layouts.admin.app')
@section('content')

<div class="container-fluid">

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
						<div class="card-box">
							<div class="row">
								<h4 align="center" class="m-t-0 header-title"><b>Laporan Pelanggan</b></h4>
								<!-- Page Heading -->
							</div>
                            <br>
                            <br>
							<div>
								
								<div class="col-md-2 pull-left">
									<a href="/admin/pelanggan/laporan/cetak" target="_blank" class="btn btn-primary btn-rounded btn-fw"><b><i class="fa fa-print"></i> Cetak Full PDF</a></b>
								</div>
							</div>
                        <br> 
                        <br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /.container-fluid -->
</div>

@endsection