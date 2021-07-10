<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:bengkelputra@gmail.com">bengkelputramadiun@gmail.com</a>
        <i class="icofont-phone"></i> 082141867644
      </div>
    </div>
  </div>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="/home">Bengkel<span>Putra</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/home">Home</a></li>
          <li class="{{ request()->is('informasi') ? 'active' : '' }}">
            <a href="/informasi">Informasi</a>
          </li>
          <!-- <li class="drop-down"><a href="#">Layanan</a>
            <ul>
              <li><a href="/layanan/detail/pengajuan">Pilih Perbaikan</a></li>
              <li>
                <?php
                  // $perbaikan_utama = \App\Pengajuan::where('user_id', Auth::user()->id)->where
                  // ('status', 0)->first();
                  // $notif = \App\DetailPengajuan::where('pengajuan_id', $pengajuan_baru->id_pengajuan)->count();
                ?>
                <a href="/layanan/detail/perbaikan">Perbaikan</a>
                <a href="{{ url('history') }}">Riwayat perbaikan</a>
                <a href="{{ url('chat') }}">Diskusi</a>
              </li>
            </ul>
          </li> -->
          <li class="{{ request()->is('perbaikan') ? 'active' : '' }}"><a href="/perbaikan">Pengajuan</a>
          </li>
          <li class="{{ request()->is('chat') ? 'active' : '' }}"><a href="/chat">Contact Us</a>
          </li>
          
          @guest
          <div class="{{ request()->is('masuk') ? 'active' : '' }} loginbtn"><a href="{{ route('login') }}"><button class="login_button">Login</button></a></div>
          <li>
            <ul>
              @if (Route::has('register'))
                <li><a href="{{ route('register') }}">{{ __('Registrasi') }}</a></li>            
              @endif
              @else
              <li class="drop-down"><a role="button">{{ Auth::user()->name }}</a>
                    <ul>
                        <a href="{{ url('profile') }}">
                          Profile
                        </a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Keluar') }}
                        </a>
                        <form id="logout-form" style="text-align:center;" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
              </li>
              @endguest
            </ul>
          </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  