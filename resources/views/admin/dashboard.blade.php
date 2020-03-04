
@extends('layouts.admin.app')

@section('content')
            <!-- #END# Counter Examples -->
            <!-- Hover Zoom Effect -->
            <div class="block-header">
                <h2>General Information</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-pink">
                            <i class="material-icons">
                                directions_bus
                                </i>
                        </div>
                        <div class="content">
                            <div class="text">Total Bus</div>
                            <div class="number">{{$busCount}}</div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-blue">
                            <i class="material-icons">
                                location_on
                                </i>
                        </div>
                        <div class="content">
                            <div class="text">Total Covered Area</div>
                        <div class="number">{{count($UsedArea)}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-light-blue">
                            <i class="material-icons">swap_calls</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Routes</div>
                            <div class="number">{{$busCount}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-cyan">
                            <i class="material-icons">
                                account_circle
                                </i>
                        </div>
                        <div class="content">
                            <div class="text">Total Students</div>
                            <div class="number">{{$students}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Zoom Effect -->





@endsection

@push('js')

 

@endpush
 <!-- Multi Select css -->
@push('css')

@endpush