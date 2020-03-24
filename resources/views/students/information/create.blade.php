@extends('layouts.app')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@php
$dayArray = array('saturday','sunday', 'monday', 'tuesday', 'wednesday', 'friday');
@endphp
<div class="container">
    <div class="row justify-content-center">
      @if(Session::has('dayName')) 
      <div class="col-md-4">
        <div class="card">
          <div class="card-header text-uppercase">Class Schedule Form</div>
          <div class="card-body">
    
          <form action="{{route('classinfo.save')}}" method="POST">
              @csrf
              
              @php
                $dayNameList = Session::get('dayName');  
              @endphp

                    @foreach ($dayNameList as $dayinfo)
                    
                      <div class="card-header info-form-heading">
                        <span>For {{$dayinfo}}-</span>(<small>{{$current_session->session_name." ".$current_session->year}}</small>)
                        </div>
                      <div class="form-group">
                        <label for="class_start">Class Start</label>
                        <select class="form-control" id="class_start" name="class_start[]">
                          @if(count($timeslot)>0)
                            @foreach ($timeslot as $slot)
                                <option value="{{$slot['start']}}">{{date('h:i a', strtotime($slot['start']))}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
            
                      <div class="form-group">
                        <label for="class_end">Class End</label>
                        <select class="form-control" id="class_end" name="class_end[]">
                         @if(count($timeslot)>0)
                            @foreach ($timeslot as $slot)
                                <option value="{{$slot['end']}}">{{date('h:i a', strtotime($slot['end']))}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>


     
                    @endforeach


              <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </form>
          </div>
        </div>
        
      </div>


      @else



      

        <div class="col-md-4">
         
            <div class="card">
                <div class="card-header text-uppercase">Semesterwise Class Schedule Information</div>
                <div class="card-body">
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                 
                    <!-- <a href="#" class="btn btn-info btn-sm"><i class="fa fa-plus">Add New</i></a> -->
                    <span>Check How Many Days Of Your Class In This Semester</span> <br><br>
                    @if(Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
                <form action="{{route('information.store')}}" method="POST">
                      @csrf
                 {{ Session::get('dayName') }}
                  @for ($i = 0; $i<count($dayArray); $i++)
                  <div class="form-group">
                    <div class="icheck-success">
                    <input type="checkbox" id="{{$dayArray[$i]}}" name="day[]" value="{{$dayArray[$i]}}"  @if (count($info)>0)
                    @foreach ($info as $dayinfo)
                        @if ($dayinfo->day == $dayArray[$i])
                            disabled
                        @endif
                    @endforeach
                @endif/>
                      <label for="{{$dayArray[$i]}}">{{$dayArray[$i]}}</label>
                  </div>
                </div>
                  @endfor
                    @if(count($info) > 5)
                    <p style="color: red;font-weight: bold;text-align: center;">You Already Fulfilled All Slot Please Try Next Semester</p>
                    @else
                   <div class="form-group">
                     <button type="submit" class="btn btn-info">Submit</button>
                   </div>
                   @endif
                  </form>
                </div>
            </div>
            
        </div>
        
        @endif
        
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