<!DOCTYPE html>
<html>
     
<!-- Mirrored from coderthemes.com/ubold_2.1/dark_leftbar/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Oct 2016 02:47:32 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta http-equiv="refresh" content="1800" />

        <link rel="shortcut icon" href="{{url('template admin/assets/images/favicon_1.ico')}}">

        <title>Bengkel Putra</title>

        <!--Morris Chart CSS -->
		<!-- <link rel="stylesheet" href="{{url('template admin/assets/plugins/morris/morris.css')}}"> -->
        
        <link href="{{url('template admin/assets/plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">

        <link href="{{url('template admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('template admin/assets/css/core.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('template admin/assets/css/components.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('template admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('template admin/assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('template admin/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />

        <!-- DataTable -->
        <link href="{{url('template admin/assets/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('template admin/assets/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('template admin/assets/plugins/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('template admin/assets/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('template admin/assets/plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('template admin/assets/plugins/datatables/dataTables.colVis.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('template admin/assets/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('template admin/assets/plugins/datatables/fixedColumns.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

        <!-- Select -->
        <link href="{{url('template admin/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
        <link href="{{url('template admin/assets/plugins/switchery/css/switchery.min.css')}}" rel="stylesheet" />
        <link href="{{url('template admin/assets/plugins/multiselect/css/multi-select.css')}}"  rel="stylesheet" type="text/css" />
        <link href="{{url('template admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('template admin/assets/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />
        <link href="{{url('template admin/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />

        <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

        @section('css')
        @show
        


    </head>


    <body class="fixed-left">
        <div id="wrapper">
             <!-- Begin page -->
            <div id="app">
                <!-- Top Bar Start -->
                <div class="topbar">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <div class="text-center">
                            <a href="/admin" class="logo"><i class="icon-magnet icon-c-logo"></i><span>{{Auth::user()->name}}</span></a>
                        </div>
                    </div>

                    <!-- Button mobile view to collapse sidebar menu -->
                    @include('layouts.admin.header')
                </div>
                <!-- Top Bar End -->


                <!-- ========== Left Sidebar Start ========== -->

                <div class="left side-menu">
                    @include('layouts.admin.sidebar')
                </div>
                <!-- Left Sidebar End -->



                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <div class="content-page">
                    <!-- Start content -->
                    @yield('content')
                </div>
            </div>
                

                <!-- ============================================================== -->
                <!-- End Right content here -->
                <!-- ============================================================== -->

            
            <!-- END wrapper -->

            <!-- Footer -->
                @include('layouts.admin.footer')
            <!-- End of Footer -->
        </div>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{url('template admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{url('template admin/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{url('template admin/assets/js/detect.js')}}"></script>
        <script src="{{url('template admin/assets/js/fastclick.js')}}"></script>

        <script src="{{url('template admin/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{url('template admin/assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{url('template admin/assets/js/waves.js')}}"></script>
        <script src="{{url('template admin/assets/js/wow.min.js')}}"></script>
        <script src="{{url('template admin/assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{url('template admin/assets/js/jquery.scrollTo.min.js')}}"></script>

         <!-- jQuery  -->
        <script src="{{url('template admin/assets/plugins/moment/moment.js')}}"></script>

        <script src="{{url('template admin/assets/plugins/peity/jquery.peity.min.js')}}"></script>

        <!-- jQuery  -->
        <script src="{{url('template admin/assets/plugins/waypoints/lib/jquery.waypoints.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>
        <!--<script src="{{url('template admin/assets/plugins/morris/morris.min.js')}}"></script> -->
        <script src="{{url('template admin/assets/plugins/raphael/raphael-min.js')}}"></script>

        <!-- jQuery chat-->
        <script src="{{url('template admin/assets/plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/skyicons/skycons.min.js')}}" type="text/javascript"></script>
         <!-- Todojs  -->
        <script src="{{url('template admin/assets/pages/jquery.todo.js')}}"></script>
        <!-- chatjs  -->
        <script src="{{url('template admin/assets/pages/jquery.chat.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        <script src="{{url('template admin/assets/pages/jquery.widgets.js')}}"></script>

        <script src="{{url('template admin/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
        <script src="{{url('template admin/assets/js/jquery.app.js')}}"></script>

        <!-- Datatable -->      
        <script src="{{url('template admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/dataTables.bootstrap.js')}}"></script>

        <script src="{{url('template admin/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/dataTables.scroller.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/dataTables.colVis.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/datatables/dataTables.fixedColumns.min.js')}}"></script>

        <script src="{{url('template admin/assets/pages/datatables.init.js')}}"></script>

        <script src="{{url('template admin/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
        <script src="{{url('template admin/assets/plugins/switchery/js/switchery.min.js')}}"></script>
        <script type="text/javascript" src="{{url('template admin/assets/plugins/multiselect/js/jquery.multi-select.js')}}"></script>
        <script type="text/javascript" src="{{url('template admin/assets/plugins/jquery-quicksearch/jquery.quicksearch.js')}}"></script>
        <!-- <script src="{{url('template admin/assets/plugins/select2/js/select2.min.js')}}" type="text/javascript"></script> -->
        <script src="{{url('template admin/assets/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "{{url('template admin/assets/plugins/datatables/json/scroller-demo.json')}}",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();
        </script>
        <!-- End DataTable -->

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>

         <!-- Scripts -->
        <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    @section('js')
    @show

    </body>
</html>
