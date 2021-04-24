
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{--<a href="index3.html" class="brand-link">--}}
        {{--<img src="{{asset('admin/dist')}}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
             {{--style="opacity: .8">--}}
        {{--<span class="brand-text font-weight-light">Dsahboard</span>--}}
    {{--</a>--}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('user/proPic/'.Auth::user()->pro_pic) }}" alt="Profile Picture"/>

            </div>
            <div class="info">
                <a class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.messages.index') }}" class="nav-link {{ Request::is('admin/messages*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Messages</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users / Volunteers
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.donations.index') }}" class="nav-link {{ Request::is('admin/donations*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-donate"></i>
                        <p>
                            Donations
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.our_campaign.index') }}" class="nav-link {{ Request::is('admin/our_campaign*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-donate"></i>
                        <p>
                            Our Campaigns
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.type.create') }}" class="nav-link {{ Request::is('admin/type/create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>
                            Food Type
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.subscriber') }}" class="nav-link {{ Request::is('admin/subscriber') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Subscribers
                        </p>
                    </a>
                </li>

                {{--<li class="nav-item has-treeview menu-open">--}}
                    {{--<a href="{{ route('logout') }}" class="nav-link bg-white" onclick="event.preventDefault();--}}
               {{--document.getElementById('logout-form').submit();">--}}
                        {{--<i class="nav-icon fas fa-utensils"></i>--}}
                        {{--<p>--}}
                            {{--{{ __('Logout') }}--}}
                        {{--</p>--}}
                    {{--</a>--}}
                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--@csrf--}}
                    {{--</form>--}}
                {{--</li>--}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>