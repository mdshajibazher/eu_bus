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
                                <div class="text">DATE</div>
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
                                <div class="text">SESSION</div>
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
                                <div class="text">DAY</div>
                            <div class="number">{{$day}}</div>
                            </div>
                        </div>
                    </div>
                        
                  
        

                    

            </div>
            </div>
        </div>

  

        
  
        <div class="card">
            <div class="header">

                <h2>
                    Total {{count($info)}} Time Combination Found
                </h2>

                    

            </div>
            <div class="body">
                <div class="row">

                    <div class="table-responsive text-center" style="font-weight: bold;">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead class="bg-grey">
                                <tr>
                                    <th>id</th>
                                    <th>Time Range</th>
                                    <th>Total Students</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Time Range</th>
                                    <th>Total Students</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    $i=1; 
                                    $totalstudent =0;   
                                @endphp
                                @foreach($info as $key =>  $inf)
                                @php
                                    $totalstudent += count($inf);
                                @endphp

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ date('h:i A', strtotime($from[$key])) }}  থেকে {{date('h:i A', strtotime($to[$key]))}} ঘটিকা পর্যন্ত</td>
                                    <td>{{count($inf)}} জন</td>
                                <td>
                                <form action="{{route('information.retrive')}}" method="POST">
                                @csrf
                                <input type="hidden" name="from" value="{{$from[$key]}}">
                                <input type="hidden" name="to" value="{{$to[$key]}}">
                                <input type="hidden" name="day" value="{{$day}}">
                                <input type="hidden" name="current_session" value="{{$current_session}}">
                                <button type="submit" class="btn bg-cyan btn-sm"><i class="material-icons">visibility</i></button>
                                </form>
                                        
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
    
                    </div>
           
      
                </div>
             

            

            </div>
        </div>

       



        
    </div>
    <div class="row">
        <div class="col-md-3 col-lg-3">
            <div class="info-box-4 hover-expand-effect">
                <div class="icon">
                    <i class="material-icons col-yellow">face</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL STUDENT</div>
                <div class="number">{{$totalstudent}}</div>
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
    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        paging: false,
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