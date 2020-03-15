
@extends('layouts.admin.app')

@section('content')


<div class="row clearfix">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3">
        <div class="card">
            <div class="header">
                <h2 class="text-center">
                    Time Slot For Students
                </h2>
            <a href="{{route('timeslot.create')}}" class="btn btn-primary waves-effect">Add New +</a>
            </div>
            <div class="body table-responsive">

            
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

         <!-- Basic Table -->
            @php
                $i=1;    
            @endphp

                    @if(count($timeslot) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Slot Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($timeslot as $slot)
                                    <tr>
                                    <th scope="row">{{$i++}}</th>
                                        <td>{{$slot['slot_name']}}</td>
                                        <td>{{$slot['start']}}</td>
                                        <td>{{$slot['end']}}</td>
                                        <td><a href="#" class="btn btn-info btn-sm waves-effect"><i class="material-icons"> 
                                            edit </a> &nbsp; | <a href="#" class="btn btn-danger btn-sm waves-effect"><i class="material-icons">
                                                delete
                                            </i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                      
                        
                    @endif

            </div>
            
        </div>
    </div>

       
</div>



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