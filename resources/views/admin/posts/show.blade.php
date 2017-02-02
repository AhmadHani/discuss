@extends("admin.includes.default")
@section("title")
Posts
@stop
@section("name")
    Posts
@stop
@section("breadcrumb")
    <li>
        <i class="fa fa-dashboard"></i>
        <a href="">Dashboard</a>
    </li>
    <li class="active"><i class="fa fa-pencil"></i> Posts</li>
@stop
@section("content")

   <div class="col-md-12">
       @if(count($errors) > 0)
           <div class="alert alert-danger">you have some problem please return and Fix this error !</div>
       @endif
       <div class="panel panel-default panel-table">
           <div class="panel-heading">

               <div class="row">
                   <div class="col col-xs-6">
                       <h3 class="panel-title">Panel Heading</h3>
                   </div>
                   <div class="col col-xs-6 text-right">
                       <form action="{{route("search.posts")}}" class="navbar-form" role="search">
                           <div class="input-group">
                               <input type="text" class="form-control" placeholder="Search" name="q">
                               <div class="input-group-btn">
                                   <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                               </div>
                           </div>
                       </form>
                   </div>
                   <div class="col col-xs-6 text-left">
                       <a href="{{route("get.newpost")}}"><button type="button" class="btn btn-sm btn-primary btn-create">Create New</button></a>
                   </div>
               </div>
           </div>
           <div class="panel-body">
               <table class="table table-striped table-bordered table-list">
                   <thead>
                   <tr>
                       <th><em class="fa fa-cog"></em></th>

                       <th>ID</th>
                       <th>Title</th>
                       <th>Author</th>
                       <th>Comments</th>
                       <th>Likes</th>

                   </tr>
                   </thead>
                   <tbody>
                   @foreach($posts as $postss)
                       <tr>
                           <td align="center">
                               <a  data-title="{{$postss->title}}" data-body="{{$postss->body}}"  data-slug="{{$postss->slug}}" data-toggle="modal" data-target="#editPost" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                               <a href="{{route("delete.posts",["slug"=>$postss->slug])}}" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                           </td>

                           <td>{{$postss->id}}</td>
                           <td>{{str_limit($postss->title,20)}}</td>
                           <td>{{$postss->user->name}}</td>
                           <td>{{count($postss->comments)}}<a data-toggle="modal"  data-target="#myModal" data-post_name="{{$postss->title}}" data-comment="{{$postss->getComments($postss)}}">Show Comments</a></td>
                            <td>{{count($postss->likes)}}<a data-toggle="modal"  data-target="#showLikesPost" data-likes="{{$postss->getLikes($postss)}}">Show Likes</a></td>


                       </tr>
                       <!-- Button trigger modal -->



                       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                       <h4 class="modal-title" id="myModalLabel"></h4>
                                   </div>
                                   <div class="modal-body">

                                   </div>
                                   <div class="modal-footer">

                                   </div>
                               </div>
                           </div>
                       </div>
                   @endforeach
                   </tbody>
               </table>

           </div>

           <div class="panel-footer">
               <div class="row">
                   {{ $posts->links() }}

               </div>
           </div>
       </div>
   </div>
   <!-- Modal -->
   <div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel"></h4>
               </div>
               <div class="modal-body">
                   <div class="form-group">
                       <form  action="{{route("post.edit.posts")}}" class="form-horizontal" method="post" id="editpost">
                           <input type="hidden" name="slug" class="slug">
                           <div class="form-group">
                               <label for="">Title</label>
                               <input class="form-control title" @if($errors->has("title")) value="{{old("title")}}" @endif  type="text" name="title"  />
                               <div class="bg-danger" id="_title">{{$errors->first("title")}}</div>
                           </div>
                           <div class="form-group">
                               <label for="">Categories</label>
                               <select class="form-control" id="sel1" name="s">
                                   @foreach($categories as $categories)
                                       <option value="{{$categories->id}}">{{$categories->name}}</option>
                                   @endforeach

                               </select>

                           </div>
                           <div class="form-group">
                               <label for="">Post</label>
                               <textarea name="body" @if($errors->has("body")) value="{{old("body")}}" @endif class="form-control body" id="" cols="30" rows="10"></textarea>
                               <div class="bg-danger" id="_body">{{$errors->first("body")}}</div>

                           </div>
                           <div class="form-group">
                               <input type="submit" value="Update" class="btn btn-primary">
                           </div>
                           {{csrf_field()}}
                       </form>
                   </div>
               </div>

           </div>
       </div>
   </div>

   </td>


   <div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel"></h4>
               </div>
               <div class="modal-body">

               </div>

           </div>
       </div>
   </div>



   <div class="modal fade" id="showLikesPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel"></h4>
               </div>
               <div class="modal-body">

               </div>

           </div>
       </div>
   </div>


@stop