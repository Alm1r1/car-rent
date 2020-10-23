<!-- Navbar  start (includes.header) -->
<header id="header-area" class="fixTotop fixed-top">
    <div id="header-bottom">
        <div class="container">
            <div class="row">

                <!-- Logo Start -->
                <div class="col-lg-4">
                    <a class="logo">
                        <img src="{{url('/img/logo.png')}}" alt="JSOFT">
                    </a>
                </div>
                <!-- Logo End -->

                <!-- Main Menu Start -->
                <div class="col-lg-8 d-none d-xl-block">
                    <nav class="mainmenu alignright">
                        <ul>
                            <li><a href="{{ url('/') }}">Kreu</a> </li>
                            @if (Route::has('login'))
                                    @auth
                                        <li> <a href="{{ url('/home') }}">Profili</a> </li>
                                    @if(Auth::user()->is_admin == 1)
                                        <li> <a href="{{ url('/usermanagement') }}">Manaxhimi perdorueseve</a> </li>
                                    @endif
                                    @endauth
                            @endif
                            @guest
                                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                @endif
                                @else
                                <li>
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                            @endguest
                        </ul>
                    </nav>
                </div>
                <!-- Main Menu End -->

            </div>
        </div>
    </div>
</header>
<!-- Navbar Area End (includes.header)-->
