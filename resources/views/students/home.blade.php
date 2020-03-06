@extends('layouts.app')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        
        @if(Session::has('journetDate') && Session::has('route'))
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                  
                        <div class="single-seat">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="text" class="form-control" value="{{Session::get('journetDate')}}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="checkcontainer">Route {{Session::get('route')}}
                                <input type="radio"  value="{{Session::get('route')}}" checked >
                                <span class="radiobtn"></span>
                            </label>
                        </div>


                        <div class="form-group">
                            <label for="bus"> <span class="badge badge-danger">Please Select Bus For Route {{Session::get('route')}}</span></label><br>
                            <select class="form-control" id="bus">
                            <option value="">--select a bus--</option>
                                @foreach ($RouteSpecificbus as $item)
                            
                            <option value="{{$item->id}}">{{$item->bus_name}}</option>
                                @endforeach
                              </select>
                        </div>
                        <p>Select Seat: </p>
                        <div class="seat-container disable-wrapper">
                            
                            @for($i=1;$i<=40;$i++)
                            <label class="btn btn-primary btn-sm btn-seat">{{$i}}</label>
                            @endfor
                        </div>
                       
                        
                    </div>
                </div>
            </div>
        </div>
        @else
        
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
                    
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            
                            <div class="col-md-12">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                <p>Welcome,<br> {{Auth::user()->name}}</p>
                                @if(count($availableRouteinf) >0)
                                <div class="form-group">
                                    <label for="journey_date">Journey Date</label>
                                    <input type="text" class="form-control" id="journey_date" name="journey_date"  placeholder="Enter Journey Date">
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="journey_date">Your Area: </label>
                                    <span class="badge badge-warning">{{$userAreaname}}</span>
                                </div>
                                <div class="form-group available-route">
                                    <p>Your Available Routes</p>
                                    @if(count($availableRouteinf) >0)
                                    @foreach ($availableRouteinf as $routeitem)
                                    
                                    <label class="checkcontainer">{{$routeitem->name}}
                                        <input type="radio"  name="route" value="{{$routeitem->route}}">
                                        <span class="radiobtn"></span>
                                    </label>
                                    <p style="border: 1px solid #ddd;padding: 10px">
                                        @php
                                        $idWiseArea = DB::table('bus_route_area')->join('area', 'bus_route_area.area', '=', 'area.id')->select('bus_route_area.area', 'area.name')->where('bus_route_area.route',$routeitem->route)->get();
                                        foreach ($idWiseArea as $key => $value) {
                                        @endphp
                                        {!! '<span class="badge badge-secondary">'.$value->name.' </span> ' !!}
                                        
                                        @php
                                        }
                                        @endphp
                                    </p>
                                    @endforeach
                                    @else
                                    <span class="badge badge-danger">Oh! You have Currently no available routes </span>
                                    @endif
                                    
                                </div>
                                @if(count($availableRouteinf) >0)
                                <button type="submit" class="btn btn-success">Submit</button>
                                @endif
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
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
flatpickr('#journey_date',{
minDate: "today",
maxDate: new Date().fp_incr(7),
dateFormat: "d-m-Y",
});
$(document).ready(function() {
//Selct 2
// $('#bus').select2();
// Tooltip
$('[data-toggle="tooltip"]').tooltip();
// Rdirect To bus reservation page

$('#bus').change(function(){ 
    var id = $(this).val();
    window.location= "home/seatreserve/"+id;
});

});
</script>
@endpush