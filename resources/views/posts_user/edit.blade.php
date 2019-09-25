
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fly Fox| Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('plugins/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/square/blue.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Post</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    @include('partials.validation_errors')
    <form method="POST" action="{{ route('post_user.update', $model->id) }}" class="form-horizontal">
        @method('PUT')
        @csrf
        <div class="box-body">
            @include('flash::message')
            <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>

                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$model->title}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Body</label>

                <div class="col-sm-10">
                    <textarea name="body" class="form-control" placeholder="Content">{{$model->body}}</textarea>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ route('post_user.index') }}" class="btn btn-info pull-left">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Update</button>
        </div>
        <!-- /.box-footer -->
    </form>

</div>
<script src="{{asset('plugins/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>