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
                <div class="card-header">Booking</div>
                <div class="card-body">
                  
       
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
                              <td><span class="badge badge-danger">No Bus Selected</span></td>
                            </tr>
                            
                          </tbody>
                        </table>


                        <div class="form-group">
                            <label for="bus"><strong> Please Select a Bus </strong></label><br>
                            <select class="form-control" id="bus">
                            <option value="">--select a bus--</option>
                                @foreach ($RouteSpecificbus as $item)
                            
                            <option value="{{$item->id}}">{{$item->bus_name}}</option>
                                @endforeach
                              </select>
                              <div id="spinner">
                              <div class="preloader pl-size-sm">
                                <div class="spinner-layer pl-black">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div> &nbsp;<b> Please Wait.......<b> 
                                </div>
                        </div>
                        
                       

                </div>
            </div>
        </div>
        @else
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Booking</div>
                <div class="card-body">
                   
                    
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-group">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="col-md-6">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                <p>Welcome,<br> <b>{{Auth::user()->name}}</b></p>
                                @if(count($availableRouteinf) >0)
                                <div class="form-group">
                                    <label for="journey_date">Select Journey Date</label>
                                    <input type="text" class="form-control" id="journey_date" name="journey_date"  placeholder="Slect Journey Date...">
                                    <small class="bg-danger text-white booking-note">Note: You Can Only Book a seat From Today to Next <b>15</b> Days</small>
                                </div>
                                @endif
                                
                                <div class="form-group">
                                    <label for="journey_date">Your Area: </label><br>
                                    <span class="badge badge-warning">{{$userAreaname}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="journey_date">Address: </label> <br>
                                    <span>{{Auth::user()->address}}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                
                                <div class="form-group available-route">
                                    <label>Your Available Routes</label>
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
maxDate: new Date().fp_incr(15),
dateFormat: "d-m-Y",
});
$(document).ready(function() {
//Selct 2
// $('#bus').select2();
// Tooltip
// Rdirect To bus reservation page

$('#bus').change(function(){ 
    var id = $(this).val();

    if(id == false){
        alert('Please Select a bus');
    }else{
        $('#spinner').show();
        window.location= "home/seatreserve/"+id;
    }
    
});

});
</script>
@endpush