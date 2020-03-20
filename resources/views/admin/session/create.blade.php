
@extends('layouts.admin.app')

@section('content')


<div class="row clearfix">
    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3">
        <div class="card">
            <div class="header">
                <h2 class="text-center">
                    Add New Session
                </h2>
                <a href="{{route('currentsession.index')}}" class="btn btn-primary waves-effect">back</a>
            </div>
            <div class="body">

            
                <div class="row clearfix">
                    <div class="col-sm-12">
                    <form action="{{route('currentsession.store')}}" method="POST">
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
                            <label for="slot">Session Name</label>
                            <select class="form-control show-tick " name="current_session" >
                                <option value="summer"selected >Summer</option>
                                <option value="fall">Fall</option>
                                <option value="spring">Spring</option>
                            </select>
                
                            </div>

                            <div class="form-group">
                                <label for="slot">Session Year</label>
                                <select class="form-control show-tick " name="session_year">
                                    @for($i=20;$i<40;$i++)
                                <option value="20{{$i}}">20{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="status" class="filled-in chk-col-pink" value="1" name="status">
                                <label for="status">Set As Current</label>
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