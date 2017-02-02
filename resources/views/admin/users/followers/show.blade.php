@foreach($user->users as $users)
<table>
    <tr>
       <div>{{$users->name }} </div>

     <div style="float:right"><a  href="{{route("admin.unfollow",['user_id'=>$user->id,'follower_id'=>$users->id])}}" class="btn btn-danger">Unfollow</a></div>
<Br />
    </tr>

</table><br />
<hr>
@endforeach