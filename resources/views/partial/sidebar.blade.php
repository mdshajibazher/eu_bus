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


                <li class="">
                    <a href="">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
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
                &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

</section>