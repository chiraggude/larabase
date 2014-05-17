<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ HTML::link('/', 'LARABASE', array('class' => 'navbar-brand')) }}
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li {{ Request::is('reports') ? 'class="active"':null }}><a href="{{ URL::to('reports') }}">Reports</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::to('about') }}">About</a></li>
                        <li><a href="{{ URL::to('contact') }}">Contact</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                @if ( Auth::user())
                <li><a href="{{ URL::to('users') }}">Users</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if ( Auth::guest())
                <li><a href="{{ URL::to('login') }}">Login</a></li>
                <li><a href="{{ URL::to('register') }}">Register</a></li>
                @else
                <li><a href="{{ URL::to('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ URL::to('profile') }}">Profile</a></li>
                <li><a href="{{ URL::to('settings') }}">Settings</a></li>
                <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                @endif
            </ul>

        </div>
    </div>
</div>