@extends('layouts.app')


@push('css')
<link rel="stylesheet" href="{{asset('public/asset/css/seat_reservation.css')}}">
@endpush



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    <div class="col-md-5">

                        @for ($i = 1; $i <= 40; $i++)
                        <div class="single-seat">
                                <form action="" method="post">
                                    <input type="hidden" value="{{$i}}">
                                    <button type="submit" class="btn btn-primary btn-sm btn-seat">{{$i}}</button>
                                </form>
                            </div>
       
                        
                        @endfor
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
