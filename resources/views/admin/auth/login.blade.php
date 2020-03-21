
@extends('layouts.app')
@push('css')
  <link rel="stylesheet" href="{{asset('public/asset/css/login.css')}}">
@endpush
@section('content')
<div class="col-lg-4 offset-lg-4">
	

<div class="login-box">
 
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    	<h4 class="text-center">EU-BUS <b>ADMIN</b></h4>
      <p class="login-box-msg">Sign in to start your session</p>
      @if (Session::has('error'))
        <span class="login-error">
            <strong>{{ Session::get('error') }}</strong>
        </span>
      @endif
      <form action="" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="username" name="adminname" value="@if(old('adminname') == null){{'admin'}}@else{{old('adminname')}}
@endif"
            > 
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
          <input type="password" class="form-control" placeholder="Password" name="password" value="12345678">
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
</div>
@endsection
