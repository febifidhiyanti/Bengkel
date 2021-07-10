<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="">
            <div class="pull-left">
                <button class="button-menu-mobile open-left waves-effect waves-light">
                    <i class="md md-menu"></i>
                </button>
                <span class="clearfix"></span>
            </div>

            <ul class="nav navbar-nav navbar-right pull-right">
               <li class="hidden-xs">
                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                </li>
                <li class="hidden-xs">
                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="icon-settings"></i></a>
                </li>
                <li class="dropdown top-menu-item-xs">
                @guest
                        <ul>
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </ul>
                        @if (Route::has('register'))
                            <ul>
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </ul>
                        @endif
                        @else
                        <ul style="margin-top: 15%; margin-left: -40%;">
                        
                            <a id="navbarDropdown" class="dropdown-toggle profile waves-effect waves-light" href="#" role="button" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{ url('/gambar_user/'.Auth::user()->photo) }}" alt="user-img" class="img-circle"></a>

                            <div class="dropdown-menu">
                                <li><a href="/admin/profile"><i class="ti-user m-r-10 text-primary"></i> 
                                    Profile</a></li>
                                <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-10 text-danger"></i> 
                                    {{ __('Logout') }}
                                </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </ul>
                    @endguest
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    </div>