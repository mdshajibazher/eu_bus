@extends('layouts.admin.app')

@section('content')

<!-- Multi Select -->
<form action="" method="POST">
@csrf

<!-- Select -->
<div class="row clearfix">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    STUDENT BUS REQUIREMENT INFORMATION
                    
                </h2>

            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <label for="">From</label>
                        <select class="form-control" name="from">
                            @if(count($timeslot)>0)
                                @foreach ($timeslot as $slot)
                        <option value="{{$slot['start']}}">{{$slot['start']}}</option>
                                @endforeach
                            @endif
                            
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="">To</label>
                        <select class="form-control" name="to">
                            @if(count($timeslot)>0)
                                @foreach ($timeslot as $slot)
                        <option value="{{$slot['end']}}">{{$slot['end']}}</option>
                                @endforeach
                            @endif
                            
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="">Select Day</label>
                        <select class="form-control show-tick" name="day">
                            <option value="">-- Please select --</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="friday">Friday</option>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="">Session</label>
                        <select class="form-control" name="current_session">
                            
                        <option value="spring2020">Spring 2020</option>
                        
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn bg-green">Submit</button>
                    </div>
                    
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