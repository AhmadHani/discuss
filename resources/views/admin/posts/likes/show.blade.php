@foreach($post->likes as $likes)
    <table>
        <tr><?php $v = \App\User::where("id",$likes->user_id)->first() ?></div>
{{$v->name}}
            <div style="float:right"><a  href="{{route("admin.unlike",['post_id'=>$post->id,"user_id"=>$v->id])}}" class="btn btn-danger">Delete</a></div>
            <Br />
        </tr>

    </table><br />
    <hr>

    @endforeach