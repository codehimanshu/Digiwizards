<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <center><span>
                    <img alt="image" src="{{URL::asset('img/bpcl.png')}}" height="70px" />
                </span></center>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <center><span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Welcome {{Auth::user()->name}}</strong>
                    </span></span> <span class="text-muted text-xs block"></span> </span> </a>
                    
                </div>
                <div class="logo-element">
                    INSTA TOLL               </div>
                </li>   
                @if(Request::path() == 'dashboard')

            <li class="active">
                <a href="{{URL::route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            @else

            <li >
                <a href="{{URL::route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            @endif
              @if(Request::path() == 'create')

            <li class="active">
                <a href="{{URL::route('create')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Create new toll</span></a>
            </li>
            @else

            <li >
                <a href="{{URL::route('create')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Create new toll</span></a>
            </li>
            @endif
           
             <li class="active">
                <a href="{{URL::route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Edit toll</span></a>
            </li>
             
             <li class="active">
                <a href="{{URL::route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Check Prices</span></a>
            </li>

        
            
            
           
       
            </ul>

        </div>
    </nav>

          