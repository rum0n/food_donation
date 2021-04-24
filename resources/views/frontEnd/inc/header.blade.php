<header class="site-header">
    <div class="top-header-bar">
        <div class="container">
            <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
                <div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                    <div class="header-bar-email">
                        {{--MAIL: <a href="#">contact@ourcharity.com</a>--}}
                    </div><!-- .header-bar-email -->

                    <div class="header-bar-text">
                        {{--<p>PHONE: <span>+24 3772 120 091 / +56452 4567</span></p>--}}
                    </div><!-- .header-bar-text -->
                </div><!-- .col -->

                <div class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                    <div class="donate-btn">
                        <a href="{{ route('user.donate.create') }}">Donate Now</a>
                    </div><!-- .donate-btn -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .top-header-bar -->

    <div class="nav-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="site-branding d-flex align-items-center">
                        {{--<h1 style="color:#fd7e14;">rgfgtjuio</h1>--}}
                        {{--<h1><a class="d-block" href="{{ route('home_page') }}" rel="home"><span style="color:#fd7e14;">Waste </span><span style="color:#262626;">No</span><span style="color:#fd7e14;"> Food</span></a></h1>--}}
                        <a class="d-block" href="{{ route('home_page') }}" rel="home"><img class="d-block" src="{{asset('frontEnd/images')}}/logo3.png" alt="logo"></a>
                    </div><!-- .site-branding -->

                    <nav class="site-navigation d-flex justify-content-end align-items-center">
                        <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            {{--class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}"--}}

                            <li class="{{ Request::is('/') ? 'current-menu-item' : '' }}"><a href="{{ route('home_page') }}">Home</a></li>
                            <li class="{{ Request::is('campaigns*') ? 'current-menu-item' : '' }}"><a href="{{ route('campaigns') }}">Our Campaigns</a></li>

                            @guest
                            {{--<li class="{{ Request::is('register') ? 'current-menu-item' : '' }}"><a href="{{ route('register') }}">Sign Up</a></li>--}}

                            <li class="{{ Request::is('register') ? 'current-menu-item' : '' }}">
                                <a href="" data-toggle="modal" data-target="#modalSignUpForm">
                                    Sign Up</a>
                            </li>

                            {{--<li class="{{ Request::is('login') ? 'current-menu-item' : '' }}"><a href="{{ route('login') }}">Login</a></li>--}}

                            <li class="{{ Request::is('login') ? 'current-menu-item' : '' }}">
                                <a href="" data-toggle="modal" data-target="#modalLoginForm">
                                    Login</a>
                            </li>

                            @endguest
                            @auth

                                @if(Auth::user()->role_id==1)
                                    <li class="{{ Request::is('admin*') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('admin.dashboard') }}">{{Auth::user()->name}}</a>
                                    </li>
                                @elseif(Auth::user()->role_id==2)
                                    <li class="{{ Request::is('volunteer*') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('volunteer.dashboard') }}">{{Auth::user()->name}}</a>
                                    </li>
                                @elseif(Auth::user()->role_id==3)
                                    <li class="{{ Request::is('user*') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('user.dashboard') }}">{{Auth::user()->name}}</a>
                                    </li>
                                @endif



                            <li>
                                <a class="" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @endauth
                        </ul>
                    </nav><!-- .site-navigation -->

                    <div class="hamburger-menu d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- .hamburger-menu -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .nav-bar -->
</header><!-- .site-header -->