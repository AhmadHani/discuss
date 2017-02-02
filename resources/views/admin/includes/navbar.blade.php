<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Admin Panel</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">


        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->name}} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{route("show.profile",['slug'=>Auth::user()->slug])}}"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>

                <li class="divider"></li>
                <li>
                    <a href="{{route("logout")}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{route("show.admin")}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{route("get.posts")}}"><i class="fa fa-pencil"></i> Posts</a>
            </li>
            <li>
                <a href="{{route("get.categories")}}"><i class="fa fa-tags"></i> Categories</a>
            </li>
            <li>
                <a href="{{route("get.users")}}"><i class="fa fa-user"></i> Users</a>
            </li>

            <li>
                <a href="{{route("get.setting")}}"><i class="fa fa-cog"></i> Setting</a>
            </li>



        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
