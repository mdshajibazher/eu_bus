@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
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
                                My Profile
                            </h4>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered  table-hover mt-3">
                                    <thead>
                                        <tr>
                            
                                            <th>Name</th>
                                            <td>{{$user->name}}</td>

                                        </tr>
                                        <tr>
                                            <th>Student Id</th>
                                            <td>{{$user->studentid}}</td>
                                        </tr>
                                            <tr>
                                                <th>Email</th>
                                            <td>{{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                            <td>{{$user->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th>Department</th>
                                            <td>{{$user->department_name}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Address</th>
                                            <td>{{$user->address}}</td>
                                            </tr>
                                            
                                            <tr>
                                            <th>Area</th>
                                            <td>{{$user->area_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Action</th>
                                            <td><a href="{{route('myprofile.edit',Auth::user()->id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit Info</a> | <a href="{{route('userpass.change')}}" class="btn btn-danger btn-sm"> <i class="fa fa-key"></i> Change Password</a> </td>
                                            </tr>
                                            
                                        </tr>
                                    </thead>
     
                                </table>
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
// $('#bus').select2();
// Tooltip
$('[data-toggle="tooltip"]').tooltip();
// Select Box

$('#bus').change(function(){ 
    var id = $(this).val();
    if(id == false){
        alert('Please Select a bus');
    }else{
        $('#spinner').show();
        window.location= id;
    }

    
});

});

</script>
@endpush

