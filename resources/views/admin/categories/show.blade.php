@extends("admin.includes.default")
@section("title")
    Categories
@stop
@section("name")
    Categories
@stop
@section("breadcrumb")
    <li>
        <i class="fa fa-dashboard"></i>
        <a href="">Dashboard</a>
    </li>
    <li class="active"><i class="fa fa-tags"></i> Categories</li>
@stop
@section("content")
    <div class=" col-md-6">
    <div class="panel panel-info">
    <!-- Default panel contents -->
    <div class="panel-heading">Panel heading</div>

    <!-- Table -->
    <table class="list-group">

        <ul class="list-group ">

            @foreach($categories as $category)

                <li class="list-group-item">

                    <div class="category_s">{{$category->name}}</div>


                        <a data-name="{{$category->name}}" data-slug="{{$category->slug}}" data-toggle="modal" data-target="#editCategory"  class="btn btn-default"><em class="fa fa-pencil"></em></a>
                        <a href="{{route("delete.categories",['slug'=>$category->slug])}}" class="btn btn-danger"><em class="fa fa-trash"></em></a>







                    @endforeach
                    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <form action="{{route("post.edit.categories")}}" method="post" class="form-horizontal">
                                            <input type="hidden" name="slug" class="slug">
                                            <input type="text" name="category_name" class="form-control input_text">
                                            <a href="{{route("edit.categories")}}"><button class="btn btn-primary">Update</button></a>
                                            {{csrf_field()}}
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <form class="form-horizontal" method="post" action="{{route("post.categories")}}"> <li class="list-group-item">
                    <center>
                    <input type="text" style="width:50%" class="form-control" value="{{old("category_name")}}" name="category_name">
                    @if($errors->has("category_name"))
                        <div style="color:red">{{$errors->first("category_name")}}</div>
                    @endif
                    <input class="form-control" style="width:50%" type="submit" value="add"></li>{{csrf_field()}}</form>
                </center>
        </ul>

    </table>
    </div>
    </div>
@stop