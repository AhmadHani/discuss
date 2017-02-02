@extends("admin.includes.default")
@section("title")
Dashboard
@stop
@section("name")
    Dashboard
    @stop
@section("breadcrumb")
    <li class="active">
    <i class="fa fa-dashboard"></i> Dashboard
    </li>
@stop
@section("content")
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-pencil fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{count($all['posts'])}}</div>
                            <div>Posts!</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{count($all['comments'])}}</div>
                            <div>Comments!</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tags fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{count($all['categories'])}}</div>
                            <div>Categories!</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{count($all['users'])}}</div>
                            <div>Users!</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>


@stop