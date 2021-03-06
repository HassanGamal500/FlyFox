
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
<div class="login-box">
    <div class="login-logo">
        <a href="/"><b>THE </b>POST</a>
    </div>
    <!-- /.login-logo -->

    @include('flash::message')
    <div class="clearfix"></div>
    <div class="login-box-body">
        <p class="login-box-msg">Write your Post</p>

        <form method="POST" action="{{ route('post_user.store') }}">
            @csrf

            <div class="form-group has-feedback">
                <input id="text" type="text" class="form-control" placeholder="Title" name="title" required autofocus>
            </div>
            <div class="form-group has-feedback">
                <textarea id="body" class="form-control" placeholder="Content" name="body" required></textarea>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<br>
<div class="box">
    <!-- /.box-header -->
    @if(count($posts))
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 200px">Title</th>
                    <th style="width: 200px">Body</th>
                    <th style="width: 40px; text-align: center">Edit</th>
                    <th style="width: 40px; text-align: center">Delete</th>
                </tr>
            @foreach($posts as $post)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td style="text-align: center"><a href="{{url(route('post_user.edit', $post->id))}}" class="badge bg-green"><i class="fa fa-edit"></i></a></td>
                        <td style="text-align: center">
                            <form method="POST" action="{{route('post_user.destroy', $post->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="badge bg-red"><i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            No Data
        </div>
@endif
<!-- /.login-box -->

    <!-- jQuery 3 -->
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
