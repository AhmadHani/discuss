@extends("admin.includes.default")
@section("title")
Users
@stop
@section("name")
    Users
@stop
@section("breadcrumb")
    <li>
        <i class="fa fa-dashboard"></i>
        <a href="">Dashboard</a>
    </li>
   <li class="active"><i class="fa fa-user"></i> Users</li>
@stop
@section("content")
   {{-- <div class="container">
        <a href="{{route("get.newpost")}}"><button>Add User</button></a>
        @if(count($errors) > 0)
        <div class="alert alert-danger">unlikely you have some Error Please Return And Fix it !</div>
                @endif
            <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Posts</th>
                <th>Comments</th>
                <th>Blocked ? </th>
                <th>Rank</th>
                <th>Control</th>
            </tr>

            @foreach($users as $users)
                <tr>
                    <td>{{$users->id}}</td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{count($users->posts)}}
                        <a href="" data-toggle="modal"  data-target="#showPostsUser" data-user="{{$users->name}}" data-whatever="{{$users->getPosts($users)}}">Show Posts</a></td>
                    <td>{{count($users->comments)}}
                        <a href="" data-toggle="modal" data-target="#showCommentsUser" data-user="{{$users->name}}" data-whatever="{{$users->getComments($users)}}">Show Comments</a></td>
                    </td>
                    <td>{{$users->getBlocked($users)}}</td>
                    <td>{{$users->getRank($users)}}</td>

                    <td>                <button data-user="{{$users->getUser($users)}}"  data-toggle="modal" data-target="#editUser" style="" class="btn btn-primary btn-sm">Edit</button>
                        <a href="{{route("delete.user",["id"=>$users->id])}}"><button class="btn btn-danger">Delete</button></a></td>
                </tr>
                <!-- Button trigger modal -->

            @endforeach

            </div>
        </div>
    </div>
--}}





           <div class="col-md-12">
               @if(count($errors) > 0)
                   <div class="alert alert-danger">unlikely you have some Error Please Return And Fix it !</div>
               @endif
               <div class="panel panel-default panel-table">
                   <div class="panel-heading">
                       <div class="row">
                           <div class="col col-xs-6">
                               <h3 class="panel-title">Panel Heading</h3>
                           </div>

                           <div class="col col-xs-6 text-right">

                               <form action="{{route("search.users")}}" class="navbar-form" role="search">
                                   <div class="input-group">
                                       <input type="text" class="form-control" placeholder="Search" name="q">
                                       <div class="input-group-btn">
                                           <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                       </div>
                                   </div>
                               </form>

                           </div>
                       <div class="col col-xs-6 text-left">

                       <button  data-toggle="modal" data-target="#adduser" class="btn btn-sm btn-primary btn-create">Create New</button>
</div>

                       </div>
                   </div>
                   <div class="panel-body">
                       <table class="table table-striped table-bordered table-list">
                           <thead>
                           <tr>
                               <th><em class="fa fa-cog"></em></th>
                               <th>ID</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Posts</th>
                               <th>Comments</th>
                               <th>Followers</th>

                               <th>Blocked ? </th>
                               <th>Rank</th>

                           </tr>
                           </thead>
                           <tbody>
                           @foreach($users as $userss)
                               <tr>
                                   <td align="center">
                                       <a data-user="{{$userss->getUser($userss)}}"  data-toggle="modal" data-target="#editUser" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                       <a href="{{route("delete.user",["id"=>$userss->id])}}" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                   </td>

                                   <td>{{$userss->id}}</td>
                                   <td>{{$userss->name}}</td>
                                   <td>{{$userss->email}}</td>
                                   <td>{{count($userss->posts)}} <a href="" data-toggle="modal"  data-target="#showPostsUser" data-user="{{$userss->name}}" data-whatever="{{$userss->getPosts($userss)}}">Show Posts</a></td>
                                   <td>{{count($userss->comments)}} <a href="" data-toggle="modal" data-target="#showCommentsUser" data-user="{{$userss->name}}" data-whatever="{{$userss->getComments($userss)}}">Show Comments</a></td>
                                   <td>{{count($userss->users)}}  <a href="" data-toggle="modal" data-target="#showFollowers" data-whatever="{{$userss->getFollowers($userss)}}">Show Followers</a></td>
                                   <td>{{$userss->getBlocked($userss)}}</td>
                                   <td>{{$userss->getRank($userss)}}</td>

                               </tr>
                               <!-- Button trigger modal -->

                           @endforeach
                           </tbody>
                       </table>

                   </div>
                   <div class="panel-footer">
                       <div class="row">
                           {{$users->links()}}
                       </div>
                   </div>
               </div>
           </div>
   <div class="modal fade" id="showPostsUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="exampleModalLabel"></h4>
               </div>
               <div class="modal-body">

               </div>
           </div>
       </div>



       </table>
   </div>



   <div class="modal fade" id="showCommentsUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="exampleModalLabel"></h4>
               </div>
               <div class="modal-body">

               </div>
           </div>
       </div>


   </div>


   <div class="modal fade" id="showFollowers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="exampleModalLabel"></h4>
               </div>
               <div class="modal-body">

               </div>
           </div>
       </div>


   </div>

   <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="exampleModalLabel"></h4>
               </div>
               <div class="modal-body">

               </div>
           </div>
       </div>


   </div>

   <!-- Edit Comment By User ! -->
   <div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="exampleModalLabel"></h4>
               </div>
               <div class="modal-body">

               </div>
           </div>
       </div>


   </div>
   <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="exampleModalLabel"></h4>
               </div>
               <div class="modal-body">
                   <form class="form-horizontal" enctype="multipart/form-data" action="{{route('post.admin.newpost')}}" method="post">
                       <div class="form-group">
                           <label for="">Name</label>
                           <input type="text" class="form-control" name="name">
                       </div>

                       <div class="form-group">
                           <label for="">Email</label>
                           <input type="text" class="form-control" name="email">
                       </div>

                       <div class="form-group">
                           <label for="">Password</label>
                           <input type="password" class="form-control" name="password">
                       </div>

                       <div class="form-group">
                           <label for="">Confirm Password</label>
                           <input type="password" class="form-control" name="password_confirmation">
                       </div>

                       <div class="form-group">
                           <label for="">Image</label>
                           <input type="file" class="form-control" name="img">
                       </div>

                       <div class="form-group">
                           <label for="">Blocked?</label>
                           <select class="form-control" id="sel1" name="blocked">

                               <option value="1">Blocked</option>
                               <option selected="selected" value="0">Not Blocked</option>


                           </select>
                       </div>
                       <div class="form-group">
                           <label for="">Rank</label>
                           <select class="form-control" id="sel1" name="rank">

                               <option value="1">Member</option>
                               <option value="2">Admin</option>


                           </select>    </div>
                       <div class="form-group">
                           <input type="submit" class="btn btn-primary"  value="Update">
                       </div>
{{csrf_field()}}
                   </form>
               </div>
           </div>
       </div>


   </div>
   <div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel"></h4>
               </div>
               <div class="modal-body">
                   <div class="form-group">
                       <form id="editpost" action="{{route("post.edit.posts")}}" class="form-horizontal" method="post">
                           <input type="hidden" name="slug" class="slug">
                           <div class="form-group">
                               <label for="">Title</label>
                               <input class="form-control title" type="text" name="title"  />
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
                               <textarea name="body" class="form-control body" id="" cols="30" rows="10"></textarea>
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
@stop