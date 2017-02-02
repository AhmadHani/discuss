@extends("includes.default")
@section("title")
{{$user->name}}
@stop
@section("content")
    <div class="container">
        @if(count($errors) > 0)
            <div class="alert alert-danger">You have some problem please return and fix this !</div>
        @endif
        <div class="profile"> <div class="media">
            <div class="media-left media-middle">

                <a href="#">
                    <img style="height: 120px;" class="media-object img-circle" src="{{route("show.img",['filename'=>$user->name . '-' . $user->id . '.jpg'])}}" alt="{{$user->name}}">
                </a>
            </div>
<div class="media-body">

   <h3>{{$user->name}}
      {{-- @if(Auth::user()->slug == $user->slug )
       @elseif(Auth::user()->id != Auth::user()->followers()->first()->follower_id)
           <button class="btn btn-primary btn-xs">Follow</button> @elseif(Auth::user()->id == $user->users()->first()->follower_id) <button class="btn btn-danger btn-xs">Unfollow</button> @endif</h3>
   --}}</h3>
    @if(Auth::check())
    @if(Auth::user() == $user)
        <button data-toggle="modal" data-user="{{$user->editProfile(Auth::user())}}" data-target="#editProfile" class="btn btn-info" style="float:right">Edit</button>
        @else
    @if(Auth::user()->followers()->find($user->id))

        <a href="{{route('unfollow',['slug'=>$user->slug])}}"><button class="btn btn-danger" >unfollow</button></a>

    @else

<a href="{{route('follow',['slug'=>$user->slug])}}"><button class="btn btn-primary">follow</button></a>
    @endif
        @endif
    @endif


Followers {{count($user->users)}}

</div>


                <div style="margin-top: 40px;">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Posts</a></li>
                        <li role="presentation"><a href="#comments" aria-controls="profile" role="tab" data-toggle="tab">Comments</a></li>
                        <li role="presentation"><a href="#following" aria-controls="messages" role="tab" data-toggle="tab">Following</a></li>
                        <li role="presentation"><a href="#loves" aria-controls="settings" role="tab" data-toggle="tab">Loves</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            @foreach($user->posts as $post)

                                <div style="background: #fff;
padding: 15px;" class="media col-md-8">
                                    <a  href="{{route("show.post",['slug'=>$post->slug])}}"><h4 class="title media-heading">{{$post->title}}</h4></a>
                                  <hr>
                                    <div class="media-left media-middle">
                                        <a href="#">
                                            <img style="width:40px" class="media-object img-circle" src="{{route("show.img",['filename'=>$user->name.'-'.$user->id.'.jpg'])}}" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <p class="author">{{$post->user->name}}</p>
                                        <p class="date">{{$post->created_at->diffForHumans()}}</p>
                                    </div>
                                    <br />
                                    @if(Auth::check())
                                        @if(Auth::user()->id == $post->user->id)

                                        @elseif(count($post->likes()->where("user_id",Auth::user()->id)->first()) > 0)



                                            <a href="{{route("unlike",['slug'=>$post->slug])}}" class="like glyphicon glyphicon-heart" style="cursor:pointer;" ></a>
                                        @else
                                            <a href="{{route("like",['slug'=>$post->slug])}}" class="like glyphicon glyphicon-heart-empty" style="cursor:pointer;" ></a>

                                        @endif

                                    @endif
                                    Loves {{count($post->likes)}}

                                </div>

                                <hr style="margin-top: 40px;">
                            @endforeach


                        </div>
                        <div role="tabpanel" class="tab-pane" id="comments">
                            @foreach($user->comments as $comments)
                            <div style="background: #fff;padding:15px;" class="media col-md-8">

                                <div class="media-left media-middle">
                                    <a href="#">
                                        <img style="width:40px" class="media-object img-circle" src="https://scontent.fdmm1-2.fna.fbcdn.net/v/t1.0-1/p48x48/15780787_1761260710867246_6792545643560711111_n.jpg?oh=d8e275744718a48428622b1c58e0316c&oe=5918518E" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">

                                    <div>{{$comments->user->name}}</div>
                                    {{$comments->created_at->diffForHumans()}}
                                    <br />

                                </div><br />
                                {{$comments->comment}}<br />
</div>
                            @endforeach
                                    @foreach($user->replies as $replies)
                                        <div style="background: #fff;padding:15px" class="media col-md-8">
                                            <div class="media-left media-middle">
                                                <a href="#">
                                                    <img style="width:40px" class="media-object img-circle" src="{{route("show.img",['filename'=>$user->name.'-'.$user->id.'.jpg'])}}" alt="...">
                                                </a>
                                            </div>

                                            <div class="media-body">
                                               <b>Replies</b> <div>{{$replies->user->name}}</div>
                                                {{$replies->created_at->diffForHumans()}}
                                            </div><br />


                                            {{$replies->reply}}


                                        </div>
                                    @endforeach
                                <hr>




                        </div>
                        <div role="tabpanel" class="tab-pane" id="following">
                            @foreach($user->followers as $users)
                                <div style="background:#fff;padding:15px" class="media col-md-8">
                                    <div class="media-left media-middle">
                                        <a href="#">
                                            <img style="width:40px" class="media-object img-circle" src="{{route("show.img",['filename'=>$user->name.'-'.$user->id.'.jpg'])}}" alt="...">
                                        </a>
                                    </div>

                                    <div class="media-body">
                                      <div>{{$users->name}}</div>
                                    <div>Friends since {{\App\Follower::where("user_id",$users->id)->where("follower_id",$user->id)->first()->created_at->diffForHumans()}}</div>
                                    </div><br />
                                    </div>
                                @endforeach
                        </div>
                        <div role="tabpanel" class="tab-pane" id="loves">




                            @foreach($user->likes as $likes)
                                <div style="background: #fff;padding:15px" class="media col-md-8">
                                    <a  href="{{route("show.post",['slug'=>$likes->post->slug])}}"><h4 class="title media-heading">{{$likes->post->title}}</h4></a>
                                    <hr>
                                    <div class="media-left media-middle">
                                        <a href="#">
                                            <img style="width:40px" class="media-object img-circle" src="{{route("show.img",['filename'=>$user->name.'-'.$user->id.'.jpg'])}}" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <p class="author">{{$likes->post->user->name}}</p>
                                        <p class="date">{{$likes->post->created_at->diffForHumans()}}</p>
                                    </div>
                                    <br />
                                    @if(Auth::check())
                                        @if(count($likes->post->likes()->where("user_id",Auth::user()->id)->first()) > 0)



                                            <a href="{{route("unlike",['slug'=>$likes->post->slug])}}" class="like glyphicon glyphicon-heart" style="cursor:pointer;" ></a>
                                        @else
                                            <a href="{{route("like",['slug'=>$likes->post->slug])}}" class="like glyphicon glyphicon-heart-empty" style="cursor:pointer;" ></a>

                                        @endif

                                    @endif
                                    Loves {{count($likes->post->likes)}}

                                </div>


                            @endforeach
                                <hr style="margin-top: 40px;">
                        </div>
                    </div>

                </div>
    </div></div>
    </div>



    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    @stop