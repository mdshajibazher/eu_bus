@extends('layouts.admin.app')

@section('content')
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
                        <div class="info-box hover-expand-effect">
                            <div class="icon bg-pink">
                                <i class="material-icons">
                                    access_alarm
                                    </i>
                            </div>
                            <div class="content">
                                <div class="text">FROM</div>
                                <div class="number">{{ date('h:i a', strtotime($from)) }}</div>
                            </div>
                        </div>
                        <div class="info-box hover-expand-effect">
                            <div class="icon bg-light-green">
                                <i class="material-icons">
                                    access_alarm
                                    </i>
                            </div>
                            <div class="content">
                                <div class="text">To</div>
                            <div class="number">{{date('h:i a', strtotime($to))}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-orange">face</i>
                            </div>
                            <div class="content">
                                <div class="text">TOTAL STUDENTS</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{count($inf)}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-indigo">date_range</i>
                            </div>
                            <div class="content">
                                <div class="text">DAY</div>
                            <div class="number">{{$day}}</div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-black">
                                    directions_bus
                                    </i>
                            </div>
                            <div class="content">
                                <div class="text">Bus Needed</div>
                            <div class="number">{{ceil(count($inf)/40)}}</div>
                            </div>
                        </div>
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

            </div>
                <h2>
                    DETAILED INFORMATION
                </h2>

                    

            </div>
            <div class="body">
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
                            @php
                                $i =1;
                             $colors = array('red', 'pink', 'deep-purple', 'indigo', 'blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey', 'blue-grey');


                            @endphp
                            @if(count($inf) > 0)
                                @foreach ($inf as $slotinf)
                                
                                <tr>
                                <td>{{$i++}}</td>
                                    <td>{{$slotinf->name}}</td>
                                    <td>@php $areaname = DB::table('area')->select('name')->where('id',$slotinf->area)->first(); @endphp
                                        <span class="badge bg-{{$colors[rand(1,15)]}}">{{$areaname->name}}</span></td>
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
    </div>
</div>
<!-- #END# Exportable Table -->



@endsection

@push('js')
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
@endpush