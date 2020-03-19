@extends('layouts.admin.app')

@section('content')


<!-- Basic Table -->
<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3">
        <div class="card">
            <div class="header">
                <h2>
                    Edit Bus
                </h2>
                
            </div>
            <div class="body">
            <h2 class="card-inside-title">Enter A Bus Name</h2>
                <div class="row clearfix">
                    <div class="col-sm-12">
                    <form action="{{route('studentbus.update', $businf['id'])}}" method="POST">
                        @csrf
                        @method('PUT')
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
                            <div class="form-line">
                            <input type="text" class="form-control" placeholder="Enter Bus Name" name="bus" value="{{$businf['bus_name']}}" />
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
<!-- #END# Basic Table -->

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








