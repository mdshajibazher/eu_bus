@extends('layouts.admin.app')

@section('content')
@php
    $i =1;
 $colors = array('green', 'orange','pink', 'deep-purple', 'indigo', 'blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey', 'blue-grey','red', 'pink', 'deep-purple', 'indigo', 'blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey', 'blue-grey','red', 'pink', 'deep-purple', 'indigo', 'blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey','blue-grey','indigo', 'blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey', 'blue-grey','red', 'pink', 'deep-purple', 'indigo', 'blue', 'cyan', 'teal', 'green', 'lime', 'yellow', 'amber','orange', 'deep-orange', 'brown', 'grey', 'blue-grey','lime','red',);
@endphp
<!-- Exportable Table -->

<div class="row clearfix">
      
    <div class="col-lg-9 col-md-10 col-sm-12 col-xs-12">
        
        
            
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 20px">
                    INFORMATION AT A GLANCE -- <a href="{{route('information.request')}}" class="btn btn-link btn-sm">Custom Time Combination</a>
                </h2>
                
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
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

                    
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
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
                    
                                             <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-light-green">date_range</i>
                            </div>
                            <div class="content">
                                <div class="text">Day</div>
                            <div class="number">{{$day}}</div>
                            </div>
                        </div>
                    </div>
                        
                  
        

                    

            </div>
            </div>
        </div>

  

        @foreach($info as $key =>  $inf)
  
        <div class="card" id="{{$key+1}}">
            <div class="header">

                <h2>
                    DETAILED INFORMATION FROM  {{ date('h:i a', strtotime($from[$key])) }} To {{date('h:i a', strtotime($to[$key]))}}
                </h2>

                    

            </div>
            <div class="body">
                <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12">
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
 
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                        <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-{{$colors[$key]}}">
                                    directions_bus
                                    </i>
                            </div>
                            @php $busNeeded = ceil(count($inf)/40);  @endphp
                            <div class="content">
                                <div class="text">BUS NEDED</div>
                            <div class="number count-to" data-from="0" data-to="{{$busNeeded}}" data-speed="1000">{{$busNeeded}}</div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-{{$colors[$key]}}">face</i>
                            </div>
                            <div class="content">
                                <div class="text">STUDENTS RANGE</div>
                            <div class="number count-to" data-from="0" data-to="{{count($inf)}}" data-speed="2500" data-fresh-interval="20">{{count($inf)}}</div>
                            </div>
                        </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-4 hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons col-{{$colors[$key]}}">airline_seat_recline_extra</i>
                            </div>
                            <div class="content">
                                <div class="text">REQUIRED SEAT</div>
                            <div class="number count-to" data-from="0" data-to="{{count($inf)}}" data-speed="1000" data-fresh-interval="20">{{count($inf)}}</div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-4  hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons @if(count($inf) >= 40*$busNeeded) col-green @else col-red @endif">highlight_off</i>
                        </div>
                        <div class="content">
                            <div class="text">Wasted Seat</div>
                            <div class="number count-to" data-from="0" data-to="@if(count($inf) >= 40*$busNeeded) 0 @else {{(40*$busNeeded)-count($inf)}}  @endif" data-speed="2500">@if(count($inf) >= 40*$busNeeded) 0 @else {{(40*$busNeeded)-count($inf)}}  @endif </div>
                        </div>
                    </div>
                </div>
      
                </div>
             
            </div>
        </div>

        @endforeach



        
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="card text-center">
            <div class="header">
                <h2>Total {{count($time_array)}} Time Combination Found </h2> <br>
                
                <table class="table table-bordered table-striped table-hover text-center">
                     @foreach($time_array as $key =>  $timeSchedule)
                    
                    <tr>
                    <td>{{$key+1}}</td>
                        <td>
                         <a href="#{{$key+1}}">{{date('h:i A', strtotime($timeSchedule[0]))}} To {{date('h:i A', strtotime($timeSchedule[1]))}}</a> 
                       </td>
                    </tr>
                    @endforeach
                </table>
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

    //Smooth Scroll
    $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});


$(window).scroll(function(){
  if($(this).scrollTop() > 100){
    $('.scroll').fadeIn();
  } else{
    $('.scroll').fadeOut();
  }
});


  </script>
@endpush
 
@push('css')

   
    <!-- JQuery DataTable Css -->
    <link href="{{asset('public/asset/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('public/asset/plugins/animate-css/animate.css')}}" rel="stylesheet">
    
@endpush