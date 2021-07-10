
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bengkel Putra</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicons -->
    <link href="{{url('template user/assets/img/favicon.png')}}" rel="icon">
    <link href="{{url('template user/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('template user/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('template user/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{url('template user/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{url('template user/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{url('template user/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{url('template user/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('template user/assets/css/floating-wpp.css')}}">
	
    <!-- Template Main CSS File -->
    <link href="{{url('template user/assets/css/style.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var auto_refresh = setInterval(
        function () {
          $('#load_content').load('video_chat/chat.blade.php').fadeIn("slow");
        }, 5000); // refresh setiap 10000 milliseconds
        
    </script>
    @section('css')
    @show
    <!-- =======================================================
    * Template Name: BizLand - v1.2.0
    * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

  <body>
    <div id="app">

    <div id="load_content">
      <!-- ======= Header ======= -->
        @include('layouts.user.navbar2')
        
      <!-- End Header -->

      <!-- Main -->
        <main id="main">
            @yield('content')

        </main>
      <!-- End #main -->

      <!-- ======= Footer ======= -->
        @include('layouts.user.footer2')
      <!-- End Footer -->
      </div>
    </div>
    
    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{url('template user/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('template user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('template user/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{url('template user/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{url('template user/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{url('template user/assets/vendor/counterup/counterup.min.js')}}"></script>
    <script src="{{url('template user/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{url('template user/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('template user/assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{url('template user/assets/vendor/aos/aos.js')}}"></script>    
	  <script src="{{url('template user/assets/js/floating-wpp.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{url('template user/assets/js/main.js')}}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      
    <script>
        function kelapKelip(){
        $('.coba').fadeOut();
        $('.coba').fadeIn(); 
        }
        setInterval(kelapKelip, 2000); 
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
  
        @section('js')
        @show

  </body>

</html>
