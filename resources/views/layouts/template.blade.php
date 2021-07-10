<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BizLand Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('BizLand/assets/img/favicon.png')}}" rel="icon">
  <link href="{{url('BizLand/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{url('BizLand/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i')}}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('BizLand/assets/vendorbootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('BizLand/assets/vendoricofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{url('BizLand/assets/vendorboxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('BizLand/assets/vendorowl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{url('BizLand/assets/vendorvenobox/venobox.css')}}" rel="stylesheet">
  <link href="{{url('BizLand/assets/vendoraos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('BizLand/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v1.2.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
      @include('layouts.header')
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <!-- <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>BizLand</spa>
      </h1>
      <h2>We are team of talanted designers making websites with Bootstrap</h2>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="{{url('BizLand/https://www.youtube.com/watch?v=jDDaplaOz7Q')}}" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a>
      </div>
    </div>
  </section> -->
  <!-- End Hero -->

  <main id="main">
      @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
      @include('layouts.footer')
  </footer><!-- End Footer -->

  <!-- <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="{{url('BizLand/assets/vendorjquery/jquery.min.js')}}"></script>
  <script src="{{url('BizLand/assets/vendorbootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('BizLand/assets/vendorjquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{url('BizLand/assets/vendorphp-email-form/validate.js')}}"></script>
  <script src="{{url('BizLand/assets/vendorwaypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{url('BizLand/assets/vendorcounterup/counterup.min.js')}}"></script>
  <script src="{{url('BizLand/assets/vendorowl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{url('BizLand/assets/vendorisotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{url('BizLand/assets/vendorvenobox/venobox.min.js')}}"></script>
  <script src="{{url('BizLand/assets/vendoraos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('BizLand/assets/js/main.js')}}"></script>

</body>

</html>