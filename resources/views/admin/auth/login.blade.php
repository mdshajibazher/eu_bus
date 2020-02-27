<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/asset/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- App Css style -->
<link rel="stylesheet" href="{{asset('public/css/app.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  {{-- login css --}}
  <link rel="stylesheet" href="{{asset('public/asset/css/login.css')}}">
  <!-- App Css style -->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html">EU-BUS <b>ADMIN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      @if (Session::has('error'))
        <span class="login-error">
            <strong>{{ Session::get('error') }}</strong>
        </span>
      @endif
      <form action="" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="username" name="adminname" value="{{old('adminname')}}"> 
          <div class="input-group-append">
            <div class="input-group-text">
                <i class="fa fa-user"></i>
            </div>
          </div>
            @error('adminname')
            <span class="login-error">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" value="">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-lock"></i>
            </div>
          </div>
          @error('password')
          <span class="login-error">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- App Js -->
<script src="{{asset('public/js/app.js')}}"></script>
<!-- jQuery -->
<script src="{{asset('public/asset/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Select-->
<script src="{{asset('public/asset/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>


</body>
</html>
