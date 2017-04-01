<!DOCTYPE html>
<html>

<head>
    @include('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{asset('js/blocking.js')}}" type=""></script>

</head>

<body>
    <div id="wrapper">
        @include('leftnavigation')
        <div id="page-wrapper" class="gray-bg dashbard-1">
            @include('topnavigation')
            <div class="wrapper wrapper-content animated fadeIn">


               <div class="row">

                 <div class="col-lg-3">
                    <div class="widget style1 red-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-automobile fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Total cars passed</span>

                                <h2 class="font-bold">Cars</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-inr fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Today income</span>
                                <h2 class="font-bold">&#8377; </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 lazur-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-male fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span>Registered customers</span>
                                <h2 class="font-bold"></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 yellow-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-mobile fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Registered Devices</span>
                                <h2 class="font-bold"></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="p-w-md m-t-sm">
             


                <div class="wrapper wrapper-content animated fadeIn">
                   <div class="signup-form" id="error">
                  
                  </div>


                  <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Blocked Vehicles</h5>
                            </div>
                            <div class="ibox-content">
                                <form action="{{URL::to('/block_vehicle')}}" method="POST">
                                    {!!csrf_field()!!}
                                    <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" placeholder="Vehicle No">
                                    <button type="Submit">Submit</button>
                                </form>

                                <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                    <thead>
                                        <tr>
                                            <th>Vehicle type</th>
                                            <th>User Name</th>
                                            <th >Vehicle Name</th>
                                            <th >Mode of Payment</th>
                                            <th >Cost</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($blocked)
                                        @foreach($blocked as $block)
                                        <tr class="gradeX" id="row_{{$block->id}}">
                                            <td>{{$block->id}}</td>
                                            <td>{{$block->vehicle_no}}</td>
                                            <td><button class="unblock_vehicle" id="{{$block->id}}">Unblock</button></td>
                                          
                                            <td class="center"></td>
                                            <td class="center"></td>
                                            <td class="center"></td>


                                        </tr>
                                        @endforeach
                                        @else
                                        <tr class="gradeX">
                                            <td colspan="6"><center>NO Blocked Vehicles YET</center></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <ul class="pagination pull-right"></ul>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>





        </div>


    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="row">

                </div>
            </div>
            @include('footer')
        </div>
    </div>

</div>
</div>