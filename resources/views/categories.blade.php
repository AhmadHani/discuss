@extends("includes.default")
@section("title")
{{$categories->name}}
@stop
@section("content")

        <div class="container">
           <h4> <div style="text-align:center">Tag is : {{$categories->name}}</div></h4>
            @foreach($categories->paginate(9) as $post)
                <div class="media col-md-8">
                    <a  href="{{route("show.post",['slug'=>$post->slug])}}"><h3 class="title media-heading">{{$post->title}}</h3></a>
                  <br/><hr>
                    <div class="media-left media-middle">
                        <a href="#">
                            <img class="media-object img-circle" style="width:40px" src="{{route("show.img",['filename'=>$post->user->name.'-'.$post->user->id.'.jpg'])}}" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <p class="author">{{$post->user->name}}</p>
                        <p class="date">{{$post->created_at->diffForHumans()}}</p>
                    </div><br />
                    <p>{{str_limit($post->body,200)}} <a href="{{route("show.post",['slug'=>$post->slug])}}"> Read More ...</a></p>
                    @if(Auth::check())
                        @if(count($post->likes()->where("user_id",Auth::user()->id)->first()) > 0)



                            <a href="{{route("unlike",['slug'=>$post->slug])}}" class="like glyphicon glyphicon-heart" style="cursor:pointer;" ></a>
                        @else
                            <a href="{{route("like",['slug'=>$post->slug])}}" class="like glyphicon glyphicon-heart-empty" style="cursor:pointer;" ></a>

                        @endif

                    @endif
                    Likes {{count($post->likes)}}
                    <hr style="margin-top: 40px;">
                </div>
                @endforeach

            @include("includes.side_menu")

        </div>


@stop