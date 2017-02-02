<div style=" position: fixed;
    right: 0;
    top: 5;
   "  class="col-sm-3 col-md-3">
    <div class="panel-group" id="accordion">
        <div  class="panel panel-default">
            <div  class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> <span class="glyphicon glyphicon-comment">
                    </span> Last Comments</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">

                    <div class="list-group">
                        @foreach(\App\Comment::orderBy('id', 'desc')->take(10)->get() as $lastcomments)

                        <a href="{{route("show.post",['slug'=>$lastcomments->post->slug])}}" class="list-group-item"><img class="img-circle" src="{{route("show.img",['filename'=>$lastcomments->user->name.'-'.$lastcomments->user->id.'.jpg'])}}" style="width:40px" />
                           {{$lastcomments->user->name}} : {{str_limit($lastcomments->comment,13)}}</a>
              @endforeach
                    </div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-user">
                    </span> New Users</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                @foreach(\App\User::orderBy("id",'desc')->take(5)->get() as $users)
                <div class="list-group">
                    <a href="{{route("show.profile",['slug'=>$users->slug])}}" class="list-group-item">
                        <h4 class="list-group-item-heading"><img style="width:50px" class="img-circle" src="{{route("show.img",['filename'=>$users->name.'-'.$users->id.'.jpg'])}}" alt=""> {{ $users->name}}</h4>

                    </a>
                </div>
@endforeach
            </div>
        </div>
    </div>
</div>
