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

            @if(Request::path() == 'dashboard')

            <li class="active">
                <a href="{{URL::route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Emergency Features</span></a>
            </li>
            @else

            <li >
                <a href="{{URL::route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Emergency Features</span></a>
            </li>
            @endif

        
            
            
              
            
             <li >
                <a href="" data-toggle="modal" data-target="#check"  ><i class="fa fa-inr"></i> <span class="nav-label">Settings</span></a>
            </li>
       
            </ul>

        </div>
    </nav>

            <div class="modal inmodal fade" id="check" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <form action = "{{URL::route('save_settings')}}" method = "post">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Settings</h4>
                            </div>
                            <div class="modal-body" style="min-height: 200px;">
                                {{csrf_field()}}
                                <p><strong>Kindly Enter The Following Details</strong> </p>
                                <div class="form-group"><label class="col-sm-4 control-label">3-Wheeler Price</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon ">&#8377;</span> 
                                            @if(Session::has('pricethree'))
                                            <input type="text" value ="{{Session::get('pricethree')}}" required id ="pricethree"  name = "pricethree" class="form-control"> <span class="input-group-addon"></span>
                                            @else
                                            <input type="text"  required id ="pricethree"  name = "pricethree" class="form-control"> <span class="input-group-addon"></span>

                                            @endif
                                            </div>
                                    </div>
                                </div>
                                   <div class="form-group"><label class="col-sm-4 control-label">4-wheeler Price</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon ">&#8377;</span> 
                                            @if(Session::has('pricefour'))
                                            <input type="text" value ="{{Session::get('pricefour')}}" required id ="pricefour"  name = "pricefour" class="form-control"> <span class="input-group-addon"></span>
                                            @else
                                            <input type="text"  required id ="pricefour"  name = "pricefour" class="form-control"> <span class="input-group-addon"></span>

                                            @endif
                                            </div>
                                    </div>
                                </div>
                                                          
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>