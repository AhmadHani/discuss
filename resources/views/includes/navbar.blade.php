
<nav class="navbar navbar-default">
    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Discuss</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route("home")}}">Home <span class="sr-only">(current)</span></a></li>
                @if(Auth::check())
                    <li><a href="{{route("get.newpost")}}">Add Post</a></li>
                @if(Auth::user()->rank == 2)
                    <li><a href="{{route("show.admin")}}">Admin Panel</a></li>
                @endif
                @endif

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                   @foreach(\App\Category::all() as $category)
                       <li><a href="{{route("show.category",['slug'=>$category->slug])}}"> {{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <div class="col-sm-3 col-md-3">
                <form action="{{route("search")}}" class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="q">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ Auth::user()->name}}
                            <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route("show.profile",['slug'=>Auth::user()->slug])}}">Profile</a></li>

                            <li><a href="{{route("logout")}}">Logout</a></li>

                        </ul>
                    </li>
                    @else
                    <li><a href="{{route("show.login")}}">Login</a></li>
                    <li><a href="{{route("show.register")}}">Register</a></li>
            @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    <hr>
</nav>
