
@extends('layouts.admin.app')

@section('content')

<!-- Multi Select -->
<form action="{{route('busroute.update',$routeId)}}" method="POST">
@csrf
@method('PUT')
<div class="row clearfix">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    ASSIGN AREA FOR ROUTE {{$routeId}}
                    <small>Select Area to assign a bus route</small>
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
                
                @php
                    $color = array('red', 'pink', 'deep-purple', 'indigo', 'blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey', 'blue-grey');
                @endphp


                <div class="demo-checkbox">
                    <table class="table">
                    @foreach ($area as $item)
                    <input type="checkbox" id="{{$item->id}}" class="filled-in chk-col-{{$color[$routeId]}}" value="{{$item->id}}" name="area[]"  
                    @if(count($RouteWiseAreaInformation) > 0)
                        @foreach($RouteWiseAreaInformation as $bus_route)
                                @if($bus_route->area == $item->id){
                                {{'checked'}}@endif
                        @endforeach
                   @endif
                />
                    <label for="{{$item->id}}">{{$item->name}}
            </label>
                    
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
                    SELECT ROUTE
                    <small>Please select a bus for Specific route</small>
                </h2>

            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">

                        <select class="form-control show-tick " name="route" disabled>
                            <option value="">-- Please select Route --</option>
                            @foreach ($route as $item)
                            <option value="{{$item->id}}" @if($item->id == $routeId) {{"selected"}} @endif>{{$item->name}}</option>
                            @endforeach
                        </select>

                        <div class="form-group" style="margin-top: 20px">
                            <button type="submit" class="btn btn-lg bg-green waves-effect">update</button>
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