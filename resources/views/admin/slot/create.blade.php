
@extends('layouts.admin.app')

@section('content')


<div class="row clearfix">
    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3">
        <div class="card">
            <div class="header">
                <h2 class="text-center">
                    Add New Time Slot
                </h2>
                <a href="{{route('timeslot.index')}}" class="btn btn-primary waves-effect">back</a>
            </div>
            <div class="body">

            
                <div class="row clearfix">
                    <div class="col-sm-12">
                    <form action="{{route('timeslot.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            <div class="form-group">
                            <label for="slot">Slot Name</label>
                            <div class="form-line">
                                <input type="text" id="slot" class="form-control" placeholder="Enter Slot Name" name="slot" />
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="start">Starting Time</label>
                            <div class="form-line">
                                <input id="starting" type="text" class="form-control" placeholder="Enter Starting Time" name="start" />
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="end">Ending  Time</label>
                                <div class="form-line">
                                    <input id="ending" type="text" class="form-control" placeholder="Enter Ending Time" name="end" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg bg-green waves-effect">Submit</button>
                        </div>
                    </form>
 
                    </div>
                </div>
                        
            </div>
            
        </div>
    </div>

       
</div>



@endsection

@push('js')
<script src="{{asset('public/asset/js/flatpicker.min.js')}}"></script>
<script>
   flatpickr('#starting',{
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
});
flatpickr('#ending',{
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
});
    
</script>
@endpush
 
@push('css')
<!--  Select css -->
   <link href="{{asset('public/asset/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('public/asset/css/seat_reservation.css')}}">
<link rel="stylesheet" href="{{asset('public/asset/css/flatpicker.css')}}">
   
@endpush