@extends('layouts.admin.app')

@section('content')

<!-- Multi Select -->
<form action="" method="POST">
@csrf

<div class="row clearfix">
    <div class="col-lg-2"></div>
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 ">
        <div class="card">
            <div class="header">
                <h2 class="text-center">
                    Seat Resrevation Infromation On {{$JourneyDate}}
                </h2>
            </div>
            <div class="body">

            
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    
    <div class="col-lg-6">
    <a href="{{route('seat.view')}}" class="btn btn-info">Back</a><br><br>
        <table class="table table-bordered">
            <tr>
                <th scope="row">Journey Date</th>
                <td>{{$JourneyDate}}</td>
    
              </tr>
              <tr>
                <th scope="row">Bus</th>
              <td>{{$busname->bus_name}}</td>
    
              </tr>
              <tr>
                <th scope="row">Booked Seat</th>
              <td>{{count($ReservationInfo)}}</td>
    
              </tr>
              <tr>
                <th scope="row">Empty Seat</th>
              <td>{{40-count($ReservationInfo)}}</td>
    
              </tr>
        </table>
    </div>  
    <div class="col-lg-6">
        


        <div class="admin seat-image">
            <img src="{{asset('public/image/wheel.png')}}" alt="">
        </div>
        @for($i=1;$i<=40;$i++)
        <div class="single-seat">
        <label class="btn  @foreach($ReservationInfo as $Reserve)
        @if($Reserve->seat == $i)
            btn-danger
        @endif
        @endforeach   btn-sm btn-seat" for="{{$i}}">{{$i}} 
            @foreach($ReservationInfo as $Reserve)
            @if($Reserve->seat == $i)
            <span class="passenger-tooltip">{{$Reserve->name}} At <br> {{$Reserve->created_at}} </span>
            @endif
            @endforeach
            </label> 
    </div>
 
        @endfor
    </div>
</div>        






            </div>
            
        </div>
    </div>

       



<!-- #END# Select -->
</form>

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