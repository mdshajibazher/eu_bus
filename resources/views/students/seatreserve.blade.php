@if(Session::has('journetDate') == false)
<script>
    alert('You cant access this route without select Bus');
</script>
@php
    die();
@endphp
@endif

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
                <div class="card-header">Dashboard</div>
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
                <form action="{{route('home.seatupdate',$busid)}}" method="post">
                        @csrf
 
                            <div class="single-seat">
                                
                                <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Specifications</th>
                            </tr>
                          </thead>
                          <tbody>
                               <tr>
                              <th scope="row">Student: </th>
                              <td><span class="badge badge-warning">{{Auth::user()->name}}</span></td>
                            </tr>
                            <tr>
                              <th scope="row">Journey Date: </th>
                              <td><span class="badge badge-success">{{Session::get('journetDate')}}</span></td>
                            </tr>
                            <tr>
                              <th scope="row">For Route: </th>
                              <td><span class="badge badge-warning">{{Session::get('route')}}</span></td>
                            </tr>
                            <tr>
                              <th scope="row">Bus: </th>
                              <td><span class="badge badge-danger">{{$busName->bus_name}}</span></td>
                            </tr>
                            
                          </tbody>
                        </table>
                        
                        <div class="form-group">
                            <label for="bus">Select Bus</label>
                            <select class="form-control" id="bus">
                            <option value="">--Change  bus--</option>
                                @foreach ($RouteSpecificbus as $item)
                            
                            <option value="{{$item->id}}">{{$item->bus_name}}</option>
                                @endforeach
                              </select>
                        </div>
                                
                    
                                @foreach ($seatInfo as $item)
                                    @php
                                    $disabled_seat[] = $item->seat
                                    @endphp
                                @endforeach


                                <div class="seat-container">
                                <div class="seat-image">
                                    <img src="{{asset('public/image/wheel.png')}}" alt="">
                                </div>
                                @for ($i = 1; $i <= 40; $i++)
                                
                                <input type="radio" name="seat" value="{{$i}}" id="{{$i}}"
                                @if(isset($disabled_seat))
                                @foreach($disabled_seat as $disabled)
                                @if($disabled == $i)
                                {{"disabled"}}
                                @endif
                                @endforeach
                                @endif
                                >
                                <label class="btn btn-primary btn-sm btn-seat" for="{{$i}}" data-toggle="tooltip" title="Hooray!">{{$i}}</label>
                                @endfor
                                <div class="reservation-button">
                                    <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Hooray!">Reserve</button>
                                </div>
                            </div>
                                
                                
                                
                            </div>
  
                    </form>
                    
                    
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
    window.location= id;
});

});

</script>
@endpush