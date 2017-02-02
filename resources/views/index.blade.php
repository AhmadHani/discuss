@extends("includes.default")

@section("title")
Disscus V1.0

@endsection

@section("content")

        <div class="container">

                @foreach($posts as $post)
                <div class="media col-md-8">
                        <a  href="{{route("show.post",['slug'=>$post->slug])}}"><h3 class="title media-heading">{{$post->title}}</h3></a>
                    <br /><hr>
                        <div class="media-left media-middle">
                                <a href="#">
                                        <img class="media-object img-circle" style="width:40px" src="{{route("show.img",['filename'=>$post->user->name.'-'.$post->user->id.'.jpg'])}}" alt="...">
                                </a>
                        </div>
                        <div class="media-body">
                            <a href="{{route("show.profile",['slug'=>$post->user->slug])}}" style="color:#000;"> <p class="author">{{$post->user->name}}</p></a>
                                <p class="date">{{$post->created_at->diffForHumans()}}</p>
                        </div>
                    <br />
                        <p>{{str_limit($post->body,200)}} <a href="{{route("show.post",['slug'=>$post->slug])}}"> Read More ...</a></p>
                   @if(Auth::check())
                       @if(Auth::user()->id == $post->user->id)


                       @elseif(count($post->likes()->where("user_id",Auth::user()->id)->first()) > 0)



                        <a href="{{route("unlike",['slug'=>$post->slug])}}" class="like glyphicon glyphicon-heart" style="cursor:pointer;" ></a>
                    @else
                            <a href="{{route("like",['slug'=>$post->slug])}}" class="like glyphicon glyphicon-heart-empty" style="cursor:pointer;" ></a>

                @endif

                    @endif
                    Loves {{count($post->likes)}}
                    <hr style="margin-top: 40px;">

</div>
            @endforeach
                @include("includes.side_menu")



        </div>

        <div class="container">
        {{$posts->links()}}
        </div>
@stop