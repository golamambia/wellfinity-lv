<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('site.title')}} | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset("/admin_lte/bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("/admin_lte/bower_components/font-awesome/css/font-awesome.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset("/admin_lte/bower_components/Ionicons/css/ionicons.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/admin_lte/dist/css/AdminLTE.min.css") }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset("/admin_lte/plugins/iCheck/square/blue.css") }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      @if( config('site.logo')!='' && File::exists(public_path('uploads/'.config('site.logo'))) )
      <a href="{{url('/')}}"><img style="width: 100px;" src="{{ asset('/uploads/'.config('site.logo')) }}" class="user-image" alt="User Image" ></a>
      @else
        <a href="{{url('/')}}"><b>Admin</b>LTE</a>
      @endif
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <!--<p class="login-box-msg">Sign in to start your session</p>-->

      <form type="form" action="{{ url('/admin/login') }}"  method="post" enctype="multipart/form-data" class="formvalidation">

      @csrf

      <!-- if there are login errors, show them here -->
      @if($errors->has('email') || $errors->has('password') || $errors->has('authentication') || $errors->has('errormsg'))   
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        {{ $errors->first('email') }}
        {{ $errors->first('password') }}
        {{ $errors->first('authentication') }}
        {{ $errors->first('errormsg') }}
      </div>
      @endif


      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" id="email" data-validation-engine="validate[required,custom[email]]" placeholder="Email" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback"> 
        <input type="password" class="form-control" name="password" id="password" data-validation-engine="validate[required]" placeholder="Password" value="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Submit">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
      </form>

      @if (Route::has('password.request'))
      <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
      </a>
      @endif

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="{{ asset("/admin_lte/bower_components/jquery/dist/jquery.min.js") }}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset("/admin_lte/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
  <!-- iCheck -->
  <script src="{{ asset("/admin_lte/plugins/iCheck/icheck.min.js") }}"></script>
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
