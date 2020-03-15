
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
                    Time Slot For Students
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
    <h1>Something</h1>
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