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
                <div class="card-header">Update Information</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                  <h1>Coming soon</h1>
                   
                    
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