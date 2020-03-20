@extends('layouts.app')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-uppercase">Semesterwise Class Schedule Information</div>
                <div class="card-body">
                     <!-- <h4 class="mb-3">{{Auth::user()->name}}'s Class Schedule</h4> -->
                    <!-- <a href="#" class="btn btn-info btn-sm"><i class="fa fa-plus">Add New</i></a> -->
                    <span>Check How Many Days Of Your Class In This Semester</span> <br><br>
                <form action="{{route('information.store')}}" method="POST">
                      @csrf

                    
                    <div class="form-group">
                      <div class="icheck-primary">
                        <input type="checkbox" id="saturday" name="day[]" value="saturday"/>
                        <label for="saturday">Saturday</label>
                    </div>

                    </div>
                    <div class="form-group">
                      <div class="icheck-primary">
                        <input type="checkbox" id="sunday" name="day[]" value="sunday"/>
                        <label for="sunday">Sunday</label>
                    </div>

                    </div>
                    <div class="form-group">
                      <div class="icheck-primary">
                        <input type="checkbox" id="monday" name="day[]" value="monday"/>
                        <label for="monday">Monday</label>
                    </div>

                    </div>
                    <div class="form-group">
                      <div class="icheck-primary">
                        <input type="checkbox" id="tuesday" name="day[]" value="tuesday"/>
                        <label for="tuesday">Tuesday</label>
                    </div>

                    </div>
                    <div class="form-group">
                      <div class="icheck-primary">
                        <input type="checkbox" id="wednesday" name="day[]" value="wednesday"/>
                        <label for="wednesday">Wednesday</label>
                    </div>

                    </div>
                    <div class="form-group">
                      <div class="icheck-primary">
                        <input type="checkbox" id="friday" name="day[]" value="friday"/>
                        <label for="friday">Friday</label>
                    </div>

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