<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin.app')
@section('content')

<!-- Begin Page Content -->
<div class="content">
    <div class="container">
        <!-- Page-Title -->
        <!-- <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right m-t-15">
                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                    <ul class="dropdown-menu drop-menu-right" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box fadeInDown animated">
                    <div class="bg-icon bg-icon-info pull-left">
                        <i class="md md-account-child text-info"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">{{$pegawai}}</b></h3>
                        <p class="text-muted">Pegawai</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-purple pull-left">
                        <i class="md md-account-child text-purple"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">{{$pelanggan}}</b></h3>
                        <p class="text-muted">Pelanggan</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-pink pull-left">
                        <i class="md md-add-shopping-cart text-pink"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">{{$pengajuan}}</b></h3>
                        <p class="text-muted">Pengajuan</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-success pull-left">
                        <i class="md md-remove-red-eye text-success"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">{{$user}}</b></h3>
                        <p class="text-muted">User</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container -->
</div> <!-- content -->
<!-- /.container-fluid -->

@endsection