<form id="editcomment" action="{{route("update.comment")}}" method="post" class="form-horizontal">
    <input type="hidden" name="comment_id" value="{{$comments->id}}">
    <div class="form-group">
        <label for="">Comment</label>
        <textarea class="form-control" name="comment" id="" cols="30" rows="10">{{$comments->comment}}</textarea>
        <div class="bg-danger">{{$errors->first("comment")}}</div>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update">
    </div>
    {{csrf_field()}}
</form>