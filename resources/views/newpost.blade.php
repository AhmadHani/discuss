@extends("includes.default")
@section("title")
Add New Post
@stop
@section("content")
<div class="container">
    <form class="form-horizontal" action="{{route("post.newpost")}}" method="post">

    <div class="form-group col-md-6">
        <label for="usr">Title:</label>
        <input type="text" class="form-control @if ($errors->has('title')) has-error @endif" id="title" name="title"/>
        @if($errors->has("title"))
            <div style="color:red">{{$errors->first("title")}}</div>
            @endif
    </div>
        <div class="form-group col-md-2">
            <label for="sel1">Tag:</label>
            <select class="form-control" id="sel1" name="s">
                @foreach($categories as $categoriess)
                <option  value="{{$categoriess->id}}">{{$categoriess->name}}</option>

                    @endforeach
            </select>
        </div>

        <div class="form-group col-md-12">
            <label for="comment">Post:</label>
            <textarea class="textarea form-control @if ($errors->has('body')) has-error @endif" name="body" rows="5" id="comment"></textarea>
            @if($errors->has("body"))
                <div style="color:red">{{$errors->first("body")}}</div>
            @endif
        </div>
        <input type="submit" class="btn btn-primary col-md-1" value="Post">
        {{csrf_field()}}
    </form>
</div>
@stop