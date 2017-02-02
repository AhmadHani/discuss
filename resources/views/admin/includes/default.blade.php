<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="{{url("css/sb-admin.css")}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{url("css/plugins/morris.css")}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url("css/style.css")}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom Fonts -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
@include("admin.includes.navbar")
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        @yield("name")
                    </h1>
                    <ol class="breadcrumb">
                           @yield("breadcrumb")

                    </ol>
    <!-- /#page-wrapper -->
@yield("content")
                </div>
            </div>
            <!-- /.row -->


        </div>
        <!-- /.container-fluid -->

    </div>
</div>
</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="{{url("js/plugins/morris/raphael.min.js")}}"></script>
<script src="{{url("js/plugins/morris/morris.min.js")}}"></script>
<script src="{{url("js/plugins/morris/morris-data.js")}}"></script>

<script src="{{url("js/app.js")}}"></script>
</body>
</html>