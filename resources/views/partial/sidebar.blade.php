<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
            <img src="{{asset('public/asset/images/user.png')}}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Name : {{Auth::guard('admin')->user()->name}}</div>
                <div class="email">Email: {{Auth::guard('admin')->user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li>                        
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="material-icons">input</i>
                                {{ __('Logout') }}
                            </a>
                            
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>


                <li class="{{Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{route('admin.dashboard')}}">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{Request::is('admin/busroute*') ? 'active' : '' }}">
                    <a class="menu-toggle" href="javascript:void(0);">
                        <i class="material-icons">room</i>
                                <span>Area Assign For Route</span>
                        </a>
                        <ul class="ml-menu">
                            @foreach ($eu_bus_route as $routeItem)
                            <li class="{{Request::is('admin/busroute/'.$routeItem->id.'/edit') ? 'active' : '' }}">
                                <a href="{{route('busroute.edit',$routeItem->id)}}">
                                    <i class="material-icons">swap_calls</i> <span>{{$routeItem->name}}</span></a>
                            </li>
                            @endforeach
                            
                        </ul>
                    </li>
                    <li class="{{Request::is('admin/bus/*') ? 'active' : '' }}">
                        <a class="menu-toggle" href="javascript:void(0);">
                            <i class="material-icons">
                                directions_bus
                                </i>
                                    <span>Bus Assign For Route</span>
                            </a>
                            <ul class="ml-menu">
                                @foreach ($eu_bus_route as $routeItem)
                                <li class="{{Request::is('admin/bus/'.$routeItem->id.'/edit') ? 'active' : '' }}">
                                    <a href="{{route('bus.edit',$routeItem->id)}}">
                                        <i class="material-icons">
                                            call_split
                                            </i><span>{{$routeItem->name}}</span></a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </li>
                        <li class="{{Request::is('admin/seat*') ? 'active' : '' }}">
                            <a href="{{Route('seat.view')}}">
                                <i class="material-icons">
                                    airline_seat_recline_extra
                                    </i>
                                        <span>Seat Information</span>
                                </a>
                            </li>
                    <li class="header">system</li>

                    <li>
                
                     <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="material-icons">input</i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                    
                    </li>


                

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; {{date('Y')}} <a href="javascript:void(0);">EU BUS MANAGEMENT</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

</section>