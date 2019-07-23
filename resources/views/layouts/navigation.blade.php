           <!-- START X-NAVIGATION -->
           <ul id="mymenu" class="x-navigation">
            <li class="xn-logo">
                <a href="/dashboard">EDC VISIONET</a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            <li class="xn-profile">
                <a href="#" class="profile-mini">
                    <img src="{{asset('assets/images/users/avatar.jpg')}}" alt="John Doe"/>
                </a>
                <div class="profile">
                    <div class="profile-image">{{ asset('js/actions.js') }}
                        <img src="{{ asset('assets/images/users/avatar.jpg') }}" alt="John Doe"/>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name">{{$data_user['name']}}</div>
                        <div class="profile-data-title">
                            @if($data_user['level'] == 3)
                            Engineer
                            @elseif($data_user['level'] == 2)
                            Service Point Leader
                            @else
                            Monitoring
                            @endif
                        </div>
                    </div>
                </div>                                                                        
            </li>
            @if($data_user['level']==1)
            <li class="xn-title">Data Master</li>
            <li class="xn-openable">
                <a href="/admin-services"><span class="fa fa-database"></span> <span class="xn-text">Master</span></a>
                <ul>
                    <li>
                         <a href="/user"><span class="fa fa-user"></span> <span class="xn-text">User</span></a>  
                     </li>
                     <li>
                        <a href="/gerbang"><span class="fa fa-bank"></span> <span class="xn-text">Gerbang</span></a>  
                    </li>
                    <li>
                        <a href="/gardu"><span class="fa fa-building"></span> <span class="xn-text">Gardu</span></a>
                    </li>
                    <li>
                        <a href="/peralatan"><span class="fa fa-cogs"></span> <span class="xn-text">Peralatan</span></a>
                    </li>
                    <li>
                        <a href="/petugas"><span class="fa fa-users"></span> <span class="xn-text">Petugas</span></a>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <a href="/monitoring-dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
            </li>
            <li>
                <a href="/merchant"><span class="fa fa-database"></span> <span class="xn-text">Merchant</span></a>                        
            </li> 
            <li>
                <a href="/service-point"><span class="fa fa-map-marker"></span> <span class="xn-text">Service Point</span></a>                        
            </li> --> 
            <!-- <li>
                <a href="/user"><span class="fa fa-user"></span> <span class="xn-text">User</span></a>                   
            </li> -->
            <!-- <li class="xn-openable">
                <a href="/admin-services"><span class="fa fa-cogs"></span> <span class="xn-text">Service</span></a>
                <ul>
                    <li>
                         <a href="/admin-services"><span class="fa fa-cogs"></span> <span class="xn-text">All Services</span></a> 
                     </li>
                     <li>
                        <a href="/admin-services/schedule"><span class="fa fa-calendar"></span> <span class="xn-text">All Scheduled</span></a>
                    </li>
                    <li>
                        <a href="/admin-services/completed"><span class="fa fa-check-square-o"></span> <span class="xn-text">All Completed</span></a>
                    </li>
                </ul>
            </li> -->
        <li>
            <a href="/pencatatan"><span class="fa fa-file-text"></span> <span class="xn-text">Pencatatan</span></a>
        </li>
        <li>
            <a href="/admin-services/report"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Report</span></a>
        </li>
        @endif
        @if($data_user['level']==2)
        <li class="xn-title">Service</li>
        <li>
            <a href="/service-point-leader/dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
        </li>
        <li><a href="/service-point-leader/assign-services"><span class="fa fa-pencil"></span> New Services</a></li>
        <li><a href="/service-point-leader/schedule"><span class="fa fa-calendar"></span> Scheduled</a></li> 
        <li><a href="/service-point-leader/done"><span class="fa fa-check"></span> Done Services </a></li> 
        <li><a href="/service-point-leader/completed"><span class="fa fa-check-square-o
            Close
            "></span> Completed Services </a></li>
        <li>
            <a href="/service-point-leader/report"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Report</span></a>
        </li>
            @endif
            @if($data_user['level']==3)
            <li class="xn-title">Service</li>
            <li>
            <a href="/engineer/dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
            </li>
            <li><a href="/engineer/services"><span class="fa fa-cogs"></span> Services</a></li>                           
            <li><a href="/engineer/services-done"><span class="fa fa-check"></span> Services Done</a></li>
            <li><a href="/engineer/services-completed"><span class="fa fa-check-square-o"></span> Services Completed</a></li>
            @endif                                    
        </ul>