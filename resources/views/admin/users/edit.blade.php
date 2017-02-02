<form id="edituser"  action="{{route("update.user")}}" enctype="multipart/form-data" method="post" class="form-horizontal">

    <input type="hidden" value="{{$users->id}}" name="id">
    <div class="form-group">
        <label for="">Name</label>
        <input name="name" type="text" value="{{$users->name}}" class="form-control">
        <div class="bg-danger" id="_name">{{$errors->first("name")}}</div>
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input name="email" type="email" value="{{$users->email}}" class="form-control">
        <div class="bg-danger" id="_email">{{$errors->first("email")}}</div>

    </div>
    <div class="form-group">
        <label for="">New Password</label>
        <input name="password" type="password" class="form-control">
        <div class="bg-danger" id="_password">{{$errors->first("password")}}</div>

    </div>
    <div class="form-group">
        <label for="">Confirm Password</label>
        <input name="password_confirmation" type="password" class="form-control">
        <div class="bg-danger" id="_confirm_pass">{{$errors->first("confirm_pass")}}</div>

    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input name="img" type="file" class="form-control">

    </div>
    <div class="form-group">
        <label for="">Blocked?</label>
        <select class="form-control" id="sel1" name="blocked">

                <option @if($users->blocked == 1) selected="selected" @endif value="1">Blocked</option>
                <option @if($users->blocked == 0) selected="selected" @endif  value="0">Not Blocked</option>


        </select>
    </div>
    <div class="form-group">
        <label for="">Rank</label>
        <select class="form-control" id="sel1" name="rank">

            <option @if($users->rank == 1) selected="selected" @endif value="1">Member</option>
            <option @if($users->rank == 2) selected="selected" @endif  value="2">Admin</option>


        </select>    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" id="btn_editpost" value="Update">
    </div>

    {{csrf_field()}}
</form>