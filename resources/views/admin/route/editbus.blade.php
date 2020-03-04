
@extends('layouts.admin.app')

@section('content')

<!-- Multi Select -->
<form action="{{route('bus.update',$routeId)}}" method="POST">
@csrf
@method('PUT')
<div class="row clearfix">
    <div class="col-lg-2"></div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
        <div class="card">
            <div class="header">
                <h2 class="text-center">
                    ASSIGN SOME BUS FOR ROUTE {{$routeId}}
                    <small>Select Some bus to assign a bus route</small>
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
                

<select class="form-control show-tick " name="bus[]" multiple="multiple" data-placeholder="--Select a Bus--" >
    @if(count($bus) > 0)
    @foreach ($bus as $item)
        <option value="{{$item->id}}" @if($item->route == $routeId)
            {{'selected'}} 
        @else
          {{'disabled'}}
         @endif>{{$item->bus_name}}</option>
    @endforeach
    @endif
    @if(count($Unassignedbus) > 0)
        @foreach ($Unassignedbus as $busitem)
        <option value="{{$busitem->id}}">{{$busitem->bus_name}}</option>
        @endforeach
    @endif
</select>

<div class="form-group" style="margin-top: 20px">
    <button type="submit" class="btn btn-lg bg-green waves-effect">update</button>
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