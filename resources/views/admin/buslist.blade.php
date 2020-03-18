@extends('layouts.admin.app')

@section('content')


<!-- Basic Table -->
<div class="row clearfix">
    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    BUS DETAILS
                </h2>
                
            </div>
            <div class="body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bus Name</th>
                            <th>Current Route</th>
                            <th>Last Route Update</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;    
                        @endphp
                        @foreach ($bus as $busitem)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$busitem->bus_name}}</td>
                            <td>  @if($busitem->route == NULL) <span class="badge bg-red">No Route Assigned {{$busitem->route}}</span> @else <span class="badge bg-green">Route {{$busitem->route}}</span> @endif</td>
                            <td>@if($busitem->updated_at == NULL) Not Updated @else {{$busitem->updated_at}} @endif</td>
                            <td><a href="#" class="btn btn-info btn-sm"><i class="material-icons"> 
                                edit  </a> | <a href="#" class="btn btn-danger btn-sm"><i class="material-icons">
                                    delete
                                </i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
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








