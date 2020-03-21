@extends('layouts.app')
@section('content')
@php
$dayArray = array('saturday','sunday', 'monday', 'tuesday', 'wednesday', 'friday');
@endphp
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-4">
        <div class="card">
          <div class="card-header text-uppercase">Edit Class Schedule</div>
          <div class="card-body">
    
          <form action="{{route('information.update', $id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-header info-form-heading">
                    <span> Edit {{$class_info->day}} Information</small>)
                    </div>
                
                      <div class="form-group">
                        <label for="class_start">Class Start</label>
                        <select class="form-control" id="class_start" name="class_start">
                          @if(count($timeslot)>0)
                            @foreach ($timeslot as $slot)
                                <option value="{{$slot['start']}}" @if($class_info->class_start == $slot['start']) selected @endif>{{date('h:i a', strtotime($slot['start']))}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
            
                      <div class="form-group">
                        <label for="class_end">Class End</label>
                        <select class="form-control" id="class_end" name="class_end">
                         @if(count($timeslot)>0)
                            @foreach ($timeslot as $slot)
                                <option value="{{$slot['end']}}" @if($class_info->class_end == $slot['end']) selected @endif>{{date('h:i a', strtotime($slot['end']))}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>


     
                  


              <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </form>
          </div>
        </div>
        
      </div>






      

            
        </div>
 
        
    </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{asset('public/css/icheck-bootstrap.min.css')}}">
@endpush
@push('customjs')

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