@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body" style="padding: 40px 50px">
                    @if (Session::has('success'))
                                    <span class="help-block" style="color: green">
                                        <strong>{{ Session::get('success') }}</strong>
                                    </span>
                                @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" >{{ __('E-Mail Address') }}</label>

     
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@if(old('email') == null){{'mdshajibazher@gmail.com'}}@else{{old('email')}}
                                @endif" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group row">
                            <label for="password">{{ __('Password') }}</label>

              
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="12345678">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                   
                        </div>

                        <div class="form-group row">
      
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                        </div>

                        <div class="form-group row mb-0">
                     
                                <button type="submit" class="btn btn-info">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
             
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
