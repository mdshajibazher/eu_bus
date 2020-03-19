@extends('layouts.app')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-uppercase">Semesterwise Class Schedule Information</div>
                <div class="card-body">
                    <h4 class="mb-3">{{Auth::user()->name}}'s Class Schedule</h4>
                <a href="{{route('information.create')}}" class="btn btn-info btn-sm"><i class="fa fa-plus">Add New</i></a>
                    <table class="table table-dark table-hover mt-3">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Day</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                            <th scope="col">Campus Duration</th>
                            <th scope="col">Session</th>
                            <th scope="col">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        @php
                            $i =1;    
                        @endphp
                        @if(count($existing_inf) > 0)
                        @foreach ($existing_inf as $inf)
                        <tr>
                            <th scope="col">{{$i++}}</th>
                            <td>{{$inf['day']}}</td>
                            <td>{{date('h:i a', strtotime($inf['class_start']))}}</td>
                            <td>{{date('h:i a', strtotime($inf['class_end']))}}</td>
                            
                            <td>
                                @php
                                $d1 = new DateTime($inf['class_start']);
                                $d2 = new DateTime($inf['class_end']);
                                $interval = $d2->diff($d1);
                                @endphp
                                {{$interval->format('%H hours, %I minutes, %S seconds')}}
                            </td>

                            <td>{{$inf['current_session']}}</td>
                        <td><a href="{{route('information.edit',$inf['id'])}}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i>
                            </a></td>
                          </tr>
                        @endforeach
                        @endif
                        </tbody>
                      </table>
                   
                    
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
    if(id == false){
        alert('Please Select a bus');
    }else{
        $('#spinner').show();
        window.location= id;
    }

    
});

});

</script>
@endpush