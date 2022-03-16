<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Log in</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('app.logo')) }}" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/style.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box admin-login">

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-left">
                <!-- <div class="user">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h2>Welcome to Shutters4UK admin</h2> -->
            </div>

            <div class="card-body login-card-body">
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="login-logo">
                    <img src="{{ asset(config('app.logo')) }}" width="200px" alt="{{ config('app.name') }} " />
                </div>
                <p class="login-box-msg">Forgot your password?</p>

                <form role="form" action="{{ route('forgot_password_submit') }}" method="POST" enctype="multipart/form-data" id=" ">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Enter your email...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
                <p class="mb-0">
                    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
</body>

</html>

@section('customJsInclude')
<script>
    $(function() {

        $('#loginForm').validate({
            rules: {
                'email': {
                    required: true
                },
                'password': {
                    required: true
                }
            },
            errorElement: "span",
            errorClass: "form-text text-danger is-invalid"
        });
    });

    $('#loginForm').submit(function() {
        $('button[type=submit]').attr("disabled", true);
        setTimeout(function() {
            $('button[type=submit]').attr("disabled", false);
        }, 3000);
    });
</script>
@endsection