
@extends('layouts.admin.app')

@section('content')
<!-- Multi Select -->
<form action="{{route('busroute.store')}}" method="POST">
@csrf
<div class="row clearfix">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    BUS ROUTE
                    <small>Select Area to assign a bus route</small>
                </h2>
            </div>
            <div class="body">
                <h4>Please assign some area in Route 1</h4>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                
                @php
                    $color = array('red', 'pink', 'purple', 'deep-purple', 'indigo', 'blue', 'light-blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey', 'blue-grey');
                @endphp


                <div class="demo-checkbox">
                    <table class="table">
                    @foreach ($area as $item)
                    <input type="checkbox" id="{{$item->id}}" class="filled-in chk-col-{{$color[rand(1,17)]}}" value="{{$item->id}}" name="area[]" />
                    <label for="{{$item->id}}">{{$item->name}}</label>
                    @endforeach
                </table>
                </div>

            </div>
            
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    SELECT BUS & ROUTE
                    <small>Please select a bus for Specific route</small>
                </h2>

            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <select class="form-control show-tick " name="bus">
                            <option value="">-- Please select Bus --</option>
                            @foreach ($bus as $item)
                            <option value="{{$item->id}}">{{$item->bus_name}}</option>
                            @endforeach
                        </select><br><br><br>

                        <select class="form-control show-tick " name="route">
                            <option value="">-- Please select Route --</option>
                            @foreach ($route as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>

                        <div class="form-group" style="margin-top: 20px">
                            <button type="submit" class="btn btn-lg bg-green waves-effect">submit</button>
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

@endpush
 
@push('css')
<!--  Select css -->
   <link href="{{asset('public/asset/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@endpush