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
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action="" method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="single-seat">
                                    
                                    @for ($i = 1; $i <= 40; $i++)
                                    
                                    <input type="radio" name="seat" value="{{$i}}" id="{{$i}}">
                                    <label class="btn btn-primary btn-sm btn-seat" for="{{$i}}">{{$i}}</label>
                                    @endfor
                                    
                                </div>
                        </div>

                        
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="journey_date">Journey Date</label>
                                <input type="text" class="form-control" id="journey_date" name="journey_date"  placeholder="Enter Journey Date">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                

                    </div>
                </form>


 


                    
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
    flatpickr('#journey_date',{
    minDate: "today",
    maxDate: new Date().fp_incr(7),
    dateFormat: "d-m-Y",
});
</script>
@endpush