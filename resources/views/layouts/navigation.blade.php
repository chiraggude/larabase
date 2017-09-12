<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! URL::to('/') !!}"><i class="fa fa-cubes"></i> LARABASE</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{!! active('posts') !!}"><a href="{!! URL::to('posts') !!}">Blog</a></li>
                <li class="{!! active('feedback') !!}"><a href="{!! URL::to('feedback') !!}">Feedback</a></li>
                @if(Auth::check())
                <li class="{!! active('users') !!}"><a href="{!! URL::to('users') !!}"> Users</a></li>
                @if(Auth::user()->isAdmin())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="{!! active('admin/dashboard') !!}"><a href="{!! URL::to('admin/dashboard') !!}">Dashboard</a></li>
                        <li class="{!! active('admin/users') !!}"><a href="{!! URL::to('admin/users') !!}">Users</a></li>
                        <li class="{!! active('admin/roles') !!}"><a href="{!! URL::to('admin/roles') !!}">Roles</a></li>
                        <li class="{!! active('admin/permissions') !!}"><a href="{!! URL::to('admin/permissions') !!}">Permissions</a></li>
                        <li class="{!! active('admin/posts') !!}"><a href="{!! URL::to('admin/posts') !!}">Posts</a></li>
                        <li class="{!! active('admin/tags') !!}"><a href="{!! URL::to('admin/tags') !!}">Tags</a></li>
                        <li class="{!! active('admin/categories') !!}"><a href="{!! URL::to('admin/categories') !!}">Categories</a></li>
                    </ul>
                </li>
                @endif
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                <li class="{!! active('login') !!}"><a href="{!! URL::to('login') !!}"> Login</a></li>
                <li class="{!! active('sign-up') !!}"><a href="{!! URL::to('sign-up') !!}"> Sign Up</a></li>
                @else
                <li class="{!! active('dashboard') !!}"><a href="{!! URL::to('dashboard') !!}"> Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{!! Auth::user()->full_name !!} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="{!! active('profile') !!}"><a href="{!! URL::to('profile') !!}"><i class="fa fa-user fa-fw"></i> Profile</a></li>
                        <li class="{!! active('settings') !!}"><a href="{!! URL::to('settings') !!}"> <i class="fa fa-cog fa-fw"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="{!! URL::to('logout') !!}"> <i class="fa fa-power-off fa-fw"></i> Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>

        </div>
    </div>
</div>