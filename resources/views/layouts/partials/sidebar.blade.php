<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown mt-3">
                        <div class="user-pic"><img src="{{asset('assets/images/users/1.jpg')}}" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu ml-2">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 user-name font-medium">{{Auth::user()->username}} <i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                               
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();" ><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                {{-- <li class="p-15 mt-2"><a href="javascript:void(0)" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu ml-1">Create New</span> </a></li> --}}
                <!-- User Profile-->
                {{-- <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Personal</span></li> --}}
                @if (Auth::user()->id == 15)
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Admin </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('home')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Dashboard</span></a></li>
                        
                        <li class="sidebar-item"><a href="{{route('report')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Campaign Report</span></a></li>
                        <li class="sidebar-item"><a href="{{route('reportideation')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">IDEATION Report</span></a></li> 
						<li class="sidebar-item"><a href="{{route('smsunsub')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">SMS Unsub Report</span></a></li> 
						<li class="sidebar-item"><a href="{{route('unsubreport')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Unsub Report</span></a></li> 
                        <li class="sidebar-item"><a href="{{route('user-record')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">User Record</span></a></li>
                        <li class="sidebar-item"><a href="{{route('detailedreport')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">JAZZ Report</span></a></li>
                        					
                       
                    </ul>
                </li>
                @endif  
                @cannot('deikho')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">User</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('bulkunsub')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Bulk Unsub</span></a></li>
                        <li class="sidebar-item"><a href="{{route('get-unsub')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Unsub</span></a></li>

                    </ul>
                </li>
                @endcannot
                @if (Auth::user()->id == 4 )
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Report</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('deikho-report')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Deikho Report</span></a></li>
                        

                    </ul>
                </li>
                @endif 
                {{-- Start Marketing URLs section --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Marketing URLs</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('marketing-urls.index')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">View URLs</span></a></li>
                        

                    </ul>
                </li>
                {{-- End Marketing URLs section --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-tune-vertical"></i><span class="hide-menu">System </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item"><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Logout</span></a></li>
                    

                 
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</aside>