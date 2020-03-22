@extends('layouts.admin.app')

@section('content')

<!-- Multi Select -->
<form action="" method="POST">
@csrf

<div class="row clearfix">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3">
        <div class="card">
            <div class="header">
                <h2 class="text-center">
                    SELCT  JOURNEY DATE USING DATEPICKER <span class="badge bg-red text-center">DUMMY DATA FOUND ON 22-03-2020</span>
                   
                </h2>
            </div>
            <div class="body">

            
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-lg-10">
    <label for="date">Date</label>
    <input type="text" class="form-control" name="date" id="date" value="{{old('date')}}">
    </div>
    <div class="col-lg-2">
        <div class="for-group" style="margin-top: 20px">
            <button type="submit" class="btn btn-lg bg-green waves-effect">Show</button>
        </div>  
    </div>
</div>        






            </div>
            
        </div>
    </div>

       
</div>

<!-- Select -->
<div class="row clearfix">

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