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
                <li class="{{ active('reports') }}"><a href="{{ URL::to('reports') }}">Reports</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="{{ active('about') }}"><a href="{{ URL::to('about') }}">About</a></li>
                        <li class="{{ active('faqs') }}"><a href="{{ URL::to('faqs') }}">FAQ's</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Need Help?</li>
                        <li class="{{ active('feedback') }}"><a href="{{ URL::to('feedback') }}">Feedback</a></li>
                    </ul>
                </li>
                @if ( Auth::user())
                <li class="{{ active('users') }}"><a href="{{ URL::to('users') }}">Users</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if ( Auth::guest())
                <li class="{{ active('login') }}"><a href="{{ URL::to('login') }}">Login</a></li>
                <li class="{{ active('register') }}"><a href="{{ URL::to('register') }}">Register</a></li>
                @else
                <li class="{{ active('dashboard') }}"><a href="{{ URL::to('dashboard') }}">Dashboard</a></li>
                <li class="{{ active('profile') }}"><a href="{{ URL::to('profile') }}">Profile</a></li>
                <li class="{{ active('settings') }}"><a href="{{ URL::to('settings') }}">Settings</a></li>
                <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                @endif
            </ul>

        </div>
    </div>
</div>