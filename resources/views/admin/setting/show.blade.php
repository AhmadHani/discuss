@extends("admin.includes.default")
@section("title")
    Setting
@stop
@section("name")
    Setting
@stop
@section("breadcrumb")
    <li>
        <i class="fa fa-dashboard"></i>
        <a href="">Dashboard</a>
    </li>
    <li class="active"><i class="fa fa-cog"></i> Setting</li>
@stop
@section("content")

   <div class="panel panel-default">
       <div class="panel-heading">
           <div class="panel-title">
               <i class="glyphicon glyphicon-wrench pull-right"></i>
               <h4>Setting</h4>
           </div>
       </div>
       <div class="panel-body">

           <form class="form form-vertical" action="{{route("post.setting")}}" enctype="multipart/form-data" method="post">
               <div class="control-group">
                   <label>Name</label>
                   <div class="controls">
                       <input type="text" @if(isset($setting->name)) value="{{$setting->name}}" @endif name="name"  class="form-control" placeholder="Enter Name">
                   </div>
               </div>
               <div class="control-group">
                   <label>Icon</label>
                   <div class="controls">
                       <input type="file" class="form-control" name="img">

                   </div>
               </div>

               <div class="control-group">
                   <label>Key Words</label>

                   <div class="controls">
                       <input type="text" @if(isset($setting->key_words)) value="{{$setting->key_words}}" @endif  name="key_words"  class="form-control" placeholder="Enter Key Words">
                   </div>
               </div>
               <div class="control-group">
                   <label></label>
                   <div class="controls">
                       <input type="submit" class="btn btn-primary"  value="Update"/>

                   </div>
               </div>
{{csrf_field()}}
           </form>


       </div><!--/panel content-->
   </div><!--/panel-->

@stop