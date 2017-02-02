@foreach($user->posts as $posts)
<table>
    <td><a href="{{route("show.post",['slug'=>$posts->slug])}}"><h4>{{$posts->title}}</h4></a><div style="color:#cccccc">{{$posts->created_at->diffForHumans()}}</div></td>
    <dt>
        <div style="float:right">
        <button onclick="hide()"  data-title="{{$posts->title}}" data-body="{{$posts->body}}"  data-slug="{{$posts->slug}}" data-toggle="modal" data-target="#editPost" class="btn btn-info">Edit</button>
        <a href="{{route("delete.posts",['slug'=>$posts->slug])}}"><button class="btn btn-danger">Delete</button></a>
    </div>
    </dt>
</table>
<hr>
<script>
    function hide(){
        $('#showPostsUser').modal('hide')
        $('#showPostsUser').on('hidden', function () {
            // Load up a new modal...
            $('#editPost').modal('show')
        })
    }
</script>
    @endforeach