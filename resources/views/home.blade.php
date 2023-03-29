@extends('layouts.base')
@section('title','Dashboard')
@section('content')
    
            <!-- ============================================================== -->
            <div class="card gredient-info-bg m-t-0 m-b-0">
                <div class="card-body">
                    <h4 class="card-title text-white">Welcome {{ucfirst(Auth::user()->username)}}</h4>
                    <h5 class="card-subtitle text-white op-5">Dashboard</h5>
                    <div class="row m-t-30 m-b-20">
                        <!-- col -->
                        <div class="col-sm-12 col-lg-4">
                            <div class="temp d-flex align-items-center flex-row">
                                {{-- <div class="display-5 text-white"><i class="wi wi-day-showers"></i> <span>73<sup>°</sup></span></div> --}}
                                <div class="m-l-10">
                                    <h3 class="m-b-0 text-white">{{\Carbon\Carbon::now()->format('d-M-Y')}} </h3>
                                </div>
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-sm-12 col-lg-8">
                            <div class="row">
                                <!-- col -->
                                <div class="col-sm-12 col-md-4">
                                    <div class="info d-flex align-items-center">
                                        <div class="m-r-10">
                                            <i class="mdi mdi-account text-white display-5 op-5"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-white m-b-0">0</h3>
                                            <span class="text-white op-5">Total Users</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- col -->
                                <!-- col -->
                                <div class="col-sm-12 col-md-4">
                                    <div class="info d-flex align-items-center">
                                        <div class="m-r-10">
                                            <i class="mdi mdi-account-star text-white display-5 op-5"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-white m-b-0">0</h3>
                                            <span class="text-white op-5">Active Users</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- col -->
                                <!-- col -->
                                <div class="col-sm-12 col-md-4">
                                    <div class="info d-flex align-items-center">
                                        <div class="m-r-10">
                                            <i class="mdi mdi-account-off text-white display-5 op-5"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-white m-b-0">0</h3>
                                            <span class="text-white op-5">Blacklisted Users</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @can('deikho',Auth::user())
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">

                                    <a href="{{ route('deikho-report') }}" class="btn btn-lg btn-block font-medium btn-outline-primary block-default">Deikho Report</a>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endcan
                </div>
            </div>
          
                        <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            {{-- <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Earnings -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- col -->
                    <div class="col-sm-12">
                        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab2" data-toggle="pill" href="#month" role="tab" aria-selected="true">Month Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab2" data-toggle="pill" href="#revenue" role="tab" aria-selected="false">Revenue</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#conversion" role="tab" aria-selected="false">Conversions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-session-tab2" data-toggle="pill" href="#session" role="tab" aria-selected="false">Sessions</a>
                            </li>
                        </ul>
                        <div class="tab-content m-t-30" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="month" role="tabpanel" aria-labelledby="pills-home-tab2">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <h1 class="font-bold m-b-5">$6,890.68</h1>
                                        <h6 class="m-b-20">Current Month Earnings</h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non pharetra ligula, sitametlaoreet arcu.</p>
                                        <button class="waves-effect waves-light m-t-20 btn btn-lg btn-info">Last Month Summary</button>
                                    </div>
                                    <div class="col-sm-12 col-lg-8 border-left">
                                        <div class="earnings ct-charts"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="revenue" role="tabpanel" aria-labelledby="pills-profile-tab2">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <h1 class="font-bold m-b-5">$6,890.68</h1>
                                        <h6 class="m-b-20">Current Month Earnings</h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non
                                            <br/>pharetra ligula, sitametlaoreet arcu.</p>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="w-100">
                                            <div class="product-sales"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="conversion" role="tabpanel" aria-labelledby="pills-contact-tab2">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <h1 class="font-bold m-b-5">$6,890.68</h1>
                                        <h6 class="m-b-20">Current Month Earnings</h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non pharetra ligula, sitametlaoreet arcu.</p>
                                        <button class="waves-effect waves-light m-t-20 btn btn-lg btn-info">Last Month Summary</button>
                                    </div>
                                    <div class="col-sm-12 col-lg-8 text-center border-left">
                                        <div class="rate"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="session" role="tabpanel" aria-labelledby="pills-session-tab2">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <h1 class="font-bold m-b-5">$6,890.68</h1>
                                        <h6 class="m-b-20">Current Month Earnings</h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non pharetra ligula, sitametlaoreet arcu.</p>
                                        <button class="waves-effect waves-light m-t-20 btn btn-lg btn-info">Last Month Summary</button>
                                    </div>
                                    <div class="col-sm-12 col-lg-8 text-center border-left">
                                        <div class="status"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            
@endsection