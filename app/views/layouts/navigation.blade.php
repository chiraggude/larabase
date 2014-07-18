<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('/') }}"><i class="fa fa-cubes"></i> LARABASE</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ active('posts') }}"><a href="{{ URL::to('posts') }}">Blog</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="{{ active('about') }}"><a href="{{ URL::to('about') }}">About</a></li>
                        <li class="{{ active('faqs') }}"><a href="{{ URL::to('faqs') }}">FAQ's</a></li>
                        <li class="{{ active('feedback') }}"><a href="{{ URL::to('feedback') }}">Feedback</a></li>
                    </ul>
                </li>
                @if ( Auth::user())
                <li class="{{ active('users') }}"><a href="{{ URL::to('users') }}"><i class="fa fa-users"></i> Users</a></li>
                @endif
                @if ( Auth::check())
                @if ( Auth::user()->id == 1)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-list"></i> Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="{{ active('admin/users') }}"><a href="{{ URL::to('admin/users') }}">Users</a></li>
                    </ul>
                </li>
                @endif
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if ( Auth::guest())
                <li class="{{ active('login') }}"><a href="{{ URL::to('login') }}"><i class="fa fa-lock"></i> Login</a></li>
                <li class="{{ active('register') }}"><a href="{{ URL::to('register') }}"><i class="fa fa-sign-in"></i> Register</a></li>
                @else
                <li class="{{ active('dashboard') }}"><a href="{{ URL::to('dashboard') }}"><i class="fa fa-bar-chart-o"></i> Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi,  {{ Auth::user()->first_name ?: Auth::user()->username }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">ACCOUNT</li>
                        <li class="{{ active('profile') }}"><a href="{{ URL::to('profile') }}"><i class="fa fa-user"></i> Profile</a></li>
                        <li class="{{ active('settings') }}"><a href="{{ URL::to('settings') }}"> <i class="fa fa-cog"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('logout') }}"> <i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>

        </div>
    </div>
</div>