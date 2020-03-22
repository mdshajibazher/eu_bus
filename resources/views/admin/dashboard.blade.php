@extends('layouts.admin.app')

@section('content')
@php
    $i =1;
 $colors = array('green', 'orange','pink', 'deep-purple', 'indigo', 'blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey', 'blue-grey','red', 'pink', 'deep-purple', 'indigo', 'blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey', 'blue-grey','red', 'pink', 'deep-purple', 'indigo', 'blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey','blue-grey','indigo', 'blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey', 'blue-grey','red', 'pink', 'deep-purple', 'indigo', 'blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey', 'blue-grey','lime','red',);
@endphp
<!-- Exportable Table -->


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        
            
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 20px">
                    INFORMATION AT A GLANCE
                </h2>
                                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-black">date_range</i>
                            </div>
                            <div class="content">
                                <div class="text">Date</div>
                            <div class="number" >{{now()->toDateString()}}</div>
                            </div>
                        </div>

                        </div>

                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-cyan">eco</i>
                            </div>
                            <div class="content">
                                <div class="text">Session</div>
                            <div class="number">{{$current_session}}</div>
                            </div>
                        </div>
                    </div>
                    
                                             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-red">date_range</i>
                            </div>
                            <div class="content">
                                <div class="text">Day</div>
                            <div class="number">{{$day}}</div>
                            </div>
                        </div>
                    </div>
                        
                  
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        
                        <a href="{{route('information.request')}}" class="btn btn-info btn-block btn-lg">Change Time Range</a>
                        
                    
                       
                    </div>

                    

            </div>
            </div>
        </div>

        @php
        $studentsum = 0;
        @endphp

        @foreach($info as $key =>  $inf)
        @php
        $studentsum += count($inf);
         @endphp
        <div class="card">
            <div class="header">

                <h2>
                    DETAILED INFORMATION
                </h2>

                    

            </div>
            <div class="body">
                <div class="row">
                       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                            <div class="icon bg-{{$colors[$key]}}">
                                <i class="material-icons">
                                    access_alarm
                                    </i>
                            </div>
                            <div class="content">
                                <div class="text">Time Range</div>
                                <div class="number">{{ date('h:i a', strtotime($from[$key])) }} To {{date('h:i a', strtotime($to[$key]))}}</div>
                            </div>
                        </div>
                </div>
 
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-{{$colors[$key]}}">
                                    directions_bus
                                    </i>
                            </div>
                            @php $busNeeded = ceil(count($inf)/40);  @endphp
                            <div class="content">
                                <div class="text">NEEDED</div>
                            <div class="number count-to" data-from="0" data-to="{{$busNeeded}}" data-speed="1000">{{$busNeeded}}</div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-{{$colors[$key]}}">face</i>
                            </div>
                            <div class="content">
                                <div class="text">TOTAL STUDENTS</div>
                            <div class="number count-to" data-from="0" data-to="{{count($inf)}}" data-speed="1000" data-fresh-interval="20">{{count($inf)}}</div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box @if(count($inf) >= 40*$busNeeded) bg-green @else bg-{{$colors[$key]}} @endif hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">Wasted Seat</div>
                            <div class="number count-to" data-from="0" data-to="@if(count($inf) >= 40*$busNeeded) 0 @else {{(40*$busNeeded)-count($inf)}}  @endif" data-speed="1000">@if(count($inf) >= 40*$busNeeded) 0 @else {{(40*$busNeeded)-count($inf)}}  @endif </div>
                        </div>
                    </div>
                </div>
      
                </div>
             
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Student</th>
                                <th>Area</th>
                                <th>Session</th>
                                <th>Class Start</th>
                                <th>Class End</th>
                                <th>Day</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Student</th>
                                <th>Area</th>
                                <th>Session</th>
                                <th>Class Start</th>
                                <th>Class End</th>
                                <th>Day</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                            @if(count($inf) > 0)
                                @foreach ($inf as $slotinf)
                                
                                <tr>
                                <td>{{$i++}}</td>
                                    <td>{{$slotinf->name}}</td>
                                    <td>@php $areaname = DB::table('area')->select('name')->where('id',$slotinf->area)->first(); @endphp
                                        <span class="badge bg-{{$colors[$key]}}">{{$areaname->name}}</span></td>
                                    <td>{{$slotinf->current_session}}</td>
                                    <td>{{date('h:i a', strtotime($slotinf->class_start))}}</td>
                                    <td>{{date('h:i a', strtotime($slotinf->class_end))}}</td>
                                    <td>{{$slotinf->day}}</td>
                                </tr> 
                                @endforeach
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @endforeach


                    
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 20px">
                   Total
                </h2>
            <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-yellow">face</i>
                            </div>
                            <div class="content">
                                <div class="text">Total Student</div>
                            <div class="number count-to" data-from="0" data-to="{{$studentsum}}" data-speed="1000" data-fresh-interval="20">{{$studentsum}}</div>
                            </div>
                        </div>

                        </div>

                    


                        
 

                    

            </div>
            </div>
        </div>
        
    </div>
</div>
<!-- #END# Exportable Table -->



@endsection

@push('js')
<script src="{{asset('public/asset/plugins/jquery-countto/jquery.countTo.js')}}"></script>
  <!-- Jquery DataTable Plugin Js -->
  <script src="{{asset('public/asset/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
  <script src="{{asset('public/asset/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
  <script src="{{asset('public/asset/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('public/asset/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
  <script src="{{asset('public/asset/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
  <script src="{{asset('public/asset/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
  <script src="{{asset('public/asset/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
  <script src="{{asset('public/asset/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
  <script src="{{asset('public/asset/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

  
  <script>
      $(function () {
        $('.count-to').countTo();
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});


  </script>
@endpush
 
@push('css')

   
    <!-- JQuery DataTable Css -->
    <link href="{{asset('public/asset/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('public/asset/plugins/animate-css/animate.css')}}" rel="stylesheet">
    
@endpush