@extends('layouts.admin.app')

@section('content')

<!-- Multi Select -->
<form action="{{route('information.retrive')}}" method="POST">
@csrf

<!-- Select -->
<div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-4">
        <div class="card">
            <div class="header">
                <h2>
                    STUDENT BUS REQUIREMENT INFORMATION
                    
                </h2>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            </div>
            <div class="body">
              
                        <div class="form-group">

                        
                        <label for="">From</label>
                        <select class="form-control" name="from">
                            @if(count($timeslot)>0)
                                @foreach ($timeslot as $slot)
                        <option value="{{$slot['start']}}">{{date('h:i a', strtotime($slot['start']))}}</option>
                                @endforeach
                            @endif
                            
                        </select>
                    </div>
                        <div class="form-group">
                        <label for="">To</label>
                        <select class="form-control" name="to">
                            @if(count($timeslot)>0)
                                @foreach ($timeslot as $slot)
                        <option value="{{$slot['end']}}">{{date('h:i a', strtotime($slot['end']))}}</option>
                                @endforeach
                            @endif
                            
                        </select>
                    </div>
                 
                        <div class="form-group">
                  
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

                        <div class="form-group">
                        <label for="current_session">Session</label>
                        <select id="current_session" class="form-control" name="current_session">
                            
                        <option value="{{$current_session->session_slug}}">{{$current_session->session_name.' '.$current_session->year}}</option>
                        
                        </select>
                        </div>
                        
                    <div class="form-group">
                        <input type="checkbox" id="between" class="filled-in chk-col-pink" value="1" name="between" />
                        <label for="between">Between</label>

                        <p>নোটঃ আপনি যদি এই বিটউইন বাটনে চেক করেন তবে সিলেক্টেড সময়সীমার ভেতরে যদি আরো কোন সময়সীমা থেকে থাকে  সবগুলো একসাথে আপনাকে কুয়েরি করে দেখাবে । এরকম না চাইলে যাস্ট ফিল্ড আনচেক রেখে দিন </p>
                    </div>
                   

               
                   
                        <button type="submit" class="btn bg-green">Submit</button>
                 
                    
           
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