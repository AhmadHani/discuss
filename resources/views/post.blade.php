@extends("includes.default")
@section("title")
{{$post->title}}
@stop

@section("content")
<div class="container">
            <div class="media col-md-8">
                @include("includes.side_menu")


                <h3>{{$post->title}}</h3>

                <hr>
            <div class="media-left media-middle">
                <a href="#">
                    <img class="media-object img-circle" width="50px" src="{{route("show.img",['filename'=>$post->user->name.'-'.$post->user->id.'.jpg'])}}" alt="...">
                </a>
            </div>

            <div class="media-body">

                <div> <a style="color:#000" href="{{route("show.profile",['slug'=>$post->user->slug])}}">  <b>{{$post->user->name}}</b></a></div>
                {{$post->created_at->diffForHumans()}}

            </div>
                <hr style="margin-bottom: 5px">
                <div style="margin-bottom: 5px;"><span class="label label-info">{{$post->category->name}}</span></div>

                <p>{{$post->body}}</p>

                @if(Auth::check())
                    @if(Auth::user()->id == $post->user->id)

                    @elseif(count($post->likes()->where("user_id",Auth::user()->id)->first()) > 0)



                        <a href="{{route("unlike",['slug'=>$post->slug])}}" class="like glyphicon glyphicon-heart" style="cursor:pointer;" ></a>
                    @else
                        <a href="{{route("like",['slug'=>$post->slug])}}" class="like glyphicon glyphicon-heart-empty" style="cursor:pointer;" ></a>

                    @endif

                @endif
                Loves {{count($post->likes)}}
                <hr>
               <h4>Comments :  {{count($post->comments)}}</h4>


            </div>

            @if(!Auth::check())

                @else
                    <div class="form-group col-md-8 ">
            <form class="form-horizontal" action="{{route("post.newcomment")}}" method="post">
                <input type="hidden" value="{{$post->id}}" name="post_id">

            <textarea  name="comment" class="textarea form-control col-md-6" ></textarea>
            <input type="submit" class="btn btn-primary col-md-2" value="Comment">


                {{csrf_field()}}

                </form>
                    </div>
                @endif




    @foreach($post->comments as $comments)
        <div class="media col-md-8">

            <div class="media-left media-middle">
                <a href="#">
                    <img style="width:40px" class="media-object img-circle" src="{{route("show.img",['filename'=>$comments->user->name.'-'.$comments->user->id.'.jpg'])}}" alt="...">
                </a>
            </div>
            <div class="media-body">
                <dt style="float:right"><button  data-toggle="modal" data-post_id="{{$comments->post->id}}" data-_comment="{{$comments->comment}}" data-comment_user="{{$comments->user->name}}"  data-comment_id="{{$comments->id}}" data-target="#replyComment" class="btn btn-info">Reply</button></dt>

                    <div>{{$comments->user->name}}</div>
                {{$comments->created_at->diffForHumans()}}
            <br />

            </div><br />
            {{$comments->comment}}<br />
@if(count($comments->replies) == 0)
                <hr>
    @else
                @foreach($comments->replies as $replies)
            <div class="media col-md-8">
                <div class="media-left media-middle">
                    <a href="#">
                        <img  style="width:40px" class="media-object img-circle" src="{{route("show.img",['filename'=>$replies->user->name.'-'.$replies->user->id.'.jpg'])}}" alt="...">
                    </a>
                </div>

                <div class="media-body">
                    <div>{{$replies->user->name}}</div>
                    {{$replies->created_at->diffForHumans()}}
                </div><br />


                    {{$replies->reply}}

                <hr>
            </div>
                @endforeach

@endif

        </div>

        @endforeach
    <div class="modal fade" id="replyComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                </div>
                <div class="modal-body">
                <div style="font-style: italic;color:#666666" class="comment">

                </div>
                    <div class="reply_form">
                        <form action="{{route("post.reply")}}" method="post" class="form-horizontal">
                            <input type="hidden" class="post_id" name="post_id">

                            <input type="hidden" class="id" name="id">
                            <div class="form-group">
                                <label for="">Reply To Comment</label>
                            <textarea class="form-control" name="reply" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control">
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    @stop