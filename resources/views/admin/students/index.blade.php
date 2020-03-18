@extends('layouts.admin.app')

@section('content')
<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    STUDENT INFORMATION
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Student Id</th>
                                <th style="width: 5%">Email</th>
                                <th>Phone</th>
                                <th>Department</th>
                                <th>Address</th>
                                <th>Area</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Student Id</th>
                                <th style="width: 5%">Email</th>
                                <th>Phone</th>
                                <th>Department</th>
                                <th>Address</th>
                                <th>Area</th>
                                <th>Image</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $i =1;
                            @endphp
                            @if(count($user) > 0)
                                @foreach ($user as $userinf)
                                
                                <tr>
                                <td>{{$i++}}</td>
                                    <td>{{$userinf->name}}</td>
                                    <td>{{$userinf->studentid}}</td>
                                    <td>{{$userinf->email}}</td>
                                    <td>{{$userinf->phone}}</td>
                                    <td>{{$userinf->department_name}}</td>
                                    <td>{{$userinf->address}}</td>
                                    <td>{{$userinf->area_name}}</td>
                                    <td>{{$userinf->image}}</td>
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