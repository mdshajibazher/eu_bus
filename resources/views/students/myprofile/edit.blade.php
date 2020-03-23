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
                                Edit Profile
                            </h4>

                        </div>
                        <div class="body">
                            <div class="col-lg-12">

                                <form action="{{route('myprofile.update',Auth::user()->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="area">Area</label>
                                        <select class="form-control" id="area" name="area">
                                            @foreach ($Allarea as $singlearea)
                                        <option value="{{$singlearea->id}}" @if($singlearea->id == $user->area) selected @endif>{{$singlearea->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" value="{{$user->phone}}" name="phone"/>
                                      </div>

                                      <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" class="form-control" cols="30" rows="10">{{$user->address}}</textarea>
                                        
                                      </div>
                                      <div class="form-group">
                                        <label for="Name">Name <span class="badge badge-danger">Contact Admin To Edit</span></label>
                                        <input type="text" class="form-control" value="{{$user->name}}" disabled/>
                                        
                                      </div>
                                    <div class="form-group">
                                      <label for="Email">Email <span class="badge badge-danger">Contact Admin To Edit</span></label>
                                      <input type="text" class="form-control" id="Email" placeholder="Enter Email" value="{{$user->email}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Student id <span class="badge badge-danger">Contact Admin To Edit</span></label>
                                        <input type="text" class="form-control" value="{{$user->studentid}}" disabled/>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label>Department <span class="badge badge-danger">Contact Admin To Edit</span></label>
                                        <input type="text" class="form-control" value="{{$user->department_name}}" disabled/>
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

