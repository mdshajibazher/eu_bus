@extends('layouts.admin.app')

@section('content')

<!-- Multi Select -->


<div class="row clearfix">
    <div class="col-lg-8 col-lg-offset-2  col-sm-12 col-xs-12 ">
        <div class="card">
            <div class="header">
                <h2 class="text-center">
                    <a href="{{route('seat.view')}}" class="btn btn-info">Back</a>
                    Seat Resrevation Information On <span class="font-bold col-pink">{{$JourneyDate}}
                    
                </h2>
            </div>
        </div>
        @php
            $seat_sum = 0;
        @endphp
        @for($i=0; $i<count($ReservationInfo); $i++)
        <div class="card">
        <div class="header bg-blue-grey">
                <h2 class="text-center">
                   Reservation Information - <b>( {{$busname[$i]->bus_name}} )</b>
                </h2>
            </div>

         
            <div class="body">

            

<div class="row">
    


    <div class="col-lg-6">
    
        <table class="table table-bordered" >
            <tr>
                <th scope="row">Journey Date</th>
                <td><span class="badge bg-teal">{{$JourneyDate}}</span></td>
    
              </tr>
              <tr>
                <th scope="row">Bus</th>
              <td> <span class="badge bg-pink">{{$busname[$i]->bus_name}}</span></td>
    
              </tr>
              <tr>
                <th scope="row">Booked Seat</th>
              <td><span class="badge bg-red">{{count($ReservationInfo[$i])}}</span></td>
    
              </tr>
              @php
                $seat_sum +=  count($ReservationInfo[$i])
              @endphp
              <tr>
                <th scope="row">Empty Seat</th>
              <td><span class="badge bg-dark">{{40-count($ReservationInfo[$i])}}</span></td>
    
              </tr>
        </table>
    </div>  
    <div class="col-lg-6">
        @if(count($ReservationInfo[$i])>0)


        <div class="admin seat-image">
            <img src="{{asset('public/image/wheel.png')}}" alt="">
        </div>
        @for($j=1;$j<=40;$j++)
        <div class="single-seat">
        <label class="btn  @foreach($ReservationInfo[$i] as $Reserve)
        @if($Reserve->seat == $j)
            btn-danger
        @endif
        @endforeach   btn-sm btn-seat" for="{{$j}}">{{$j}} 
            @foreach($ReservationInfo[$i] as $Reserve)
            @if($Reserve->seat == $j)
            <span class="passenger-tooltip">{{$Reserve->name}} At <br> {{$Reserve->created_at}} </span>
            @endif
            @endforeach
            </label> 
    </div>
 
        @endfor

        @else
        <span class="bg-pink not-found"><i class="material-icons">
            not_interested
            </i>Sorry No Seat Reservation Data Found</span>

        
    @endif
            

                </div>
            </div>        
        </div>

        @endfor
        
    </div>
</div>
  <div class="row">
<div class="col-lg-4 col-lg-offset-4">
    <table class="table table-bordered">

        <tr>
            <th scope="col">Total  Seat</th>
            <th><span class="badge bg-orange">{{count($ReservationInfo)*40}}</span></th>
          </tr>
          <tr>
            <th scope="col">Total Reserved Seat</th>
            <th><span class="badge bg-green">{{$seat_sum}}</span></th>
          </tr>

          <tr>
            <th scope="col">Total Empty Seat</th>
            <th><span class="badge bg-info">{{(count($ReservationInfo)*40)-($seat_sum)}}</span></th>

          </tr>


      </table>
    </div>
</div>



<!-- #END# Select -->


@endsection

@push('js')
<script src="{{asset('public/asset/js/flatpicker.min.js')}}"></script>
<script>
   flatpickr('#date',{
dateFormat: "d-m-Y",
});
    
</script>
@endpush
 
@push('css')
<!--  Select css -->
   <link href="{{asset('public/asset/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('public/asset/css/seat_reservation.css')}}">
<link rel="stylesheet" href="{{asset('public/asset/css/flatpicker.css')}}">
   
@endpush