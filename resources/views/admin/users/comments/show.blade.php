@foreach($user->comments as $comments)
    <table>
    <td><b>Comment is : </b>{{str_limit($comments->comment,300) }}<br />
           <div style="color:#cccccc">{{$comments->created_at->diffForHumans()}}</div><br />
            <a href="{{route("show.post",['slug'=>$comments->post->slug])}}">{{$comments->post->title}}</a></td><br />
                <dt><div style="float:right">
            <button    data-toggle="modal" data-target="#editComment" data-commentt='{{$comments->getComment($comments)}}'  onclick="hide()"  class="btn btn-info">Edit</button>
            <a href="{{route("delete.comments",['id'=>$comments->id])}}"><button  class="btn btn-danger">Delete</button></a>
                </div></dt>
    </table>
                    <hr>
    <script>
        function hide(){
            $('#showCommentsUser').modal('hide')
            $('#showCommentsUser').on('hidden', function () {
                // Load up a new modal...
                $('#editComment').modal('show')
            })
        }
    </script>
    @endforeach