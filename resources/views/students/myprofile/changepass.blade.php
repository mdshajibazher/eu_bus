@extends('layouts.app')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">My Profile</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="card">
                        <div class="header text-center">
                            <h4 class="text-center" style="margin: 20px 0;font-weight: bold;text-transform:uppercase">
                                Change Password
                            </h4>

                        </div>
                        <div class="body">
                            <div class="col-lg-12">

                                <form action="{{route('userpass.update')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @if (Session::has('success'))
                                    <span class="help-block" style="color: green">
                                        <strong>{{ Session::get('success') }}</strong>
                                    </span>
                                @endif
                                    <div class="form-group">
                                        <label for="old_password">Old Password</label>
                                    <input id="old_password" type="password" class="form-control" name="old_password" value="{{old('old_password')}}" required>
                                        @if (Session::has('old_password'))
                                        <span class="help-block" style="color: red">
                                            <small>{{ Session::get('old_password') }}</small>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password" value="{{old('password')}}" required>

                                        @if (Session::has('password'))
                                        <span class="help-block" style="color: red">
                                            <small>{{ Session::get('password') }}</small>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" required>
                                        
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                                
                            </div>
                        </div>
                    </div>
                
                
                    
                </div>
            </div>
        </div>
  
        
        
    </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{asset('public/asset/css/seat_reservation.css')}}">
<link rel="stylesheet" href="{{asset('public/asset/css/flatpicker.css')}}">
@endpush
@push('customjs')
<script src="{{asset('public/asset/js/flatpicker.min.js')}}"></script>
<script>
$(document).ready(function() {
//Selct 2
$('#area').select2();
// Tooltip
$('[data-toggle="tooltip"]').tooltip();
// Select Box



});

</script>
@endpush

