@extends('layouts.app')
@section('title', 'Admin Home')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <img src="{{url('frontend/img/user.png')}}" height="200px" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4>Admin Panel</h4>
                </div>
                <ul class="list-group list-group-flush">
                    <a href="{{url('adminpanel')}}" class="btn btn-primary">Dashboard</a>
                    <li class="list-group-item"><a href="{{url('showmanager')}}" class="nav-link">Add a branch Manager</a></li>
                    <li class="list-group-item"><a href="{{url('showmodaretor')}}" class="nav-link">Add a Modaretor</a></li>

                    <li class="list-group-item"><a href="{{url('newbranch')}}" class="nav-link">Add Branch</a></li>
                    <li class="list-group-item"><a href="{{url('marchentcheck')}}" class="nav-link">Search a Marchent</a></li>
                    <li class="list-group-item"><a href="{{url('allmanager')}}" class="nav-link">Our Manager List</a></li>
                    <li class="list-group-item"><a href="{{url('allrider')}}" class="nav-link">Our Rider List</a></li>
                    
                </ul>

            </div>
        </div>
        <div class="col-md-9">
            @hasSection('subsection')
            @yield('subsection')
            @else

            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card bg-success text-light">
                            <a href="{{url('profitdetails')}}" class="nav-link">
                            <div class="card-body">
                                <h5 class="card-title">Our Total Profit</h5>
                                    @php
                                    $delivery = DB::table('parcel_infos')->where('cod_status', 'added_account')->orwhere('cod_status', 'payment_request')->orwhere('cod_status', 'paid')->where('status', 'delivared')->sum('delivery_charge');
                                    $oneparcent = DB::table('parcel_infos')->where('cod_status', 'added_account')->orwhere('cod_status', 'payment_request')->orwhere('cod_status', 'paid')->where('status', 'delivared')->sum('cod_oneparcent');
                                    $total = $delivery + $oneparcent;
                                    @endphp 
                                <h6 class="card-subtitle mb-2">{{$total}} </h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="card bg-success text-light">
                            <a href="{{url('approval')}}" class="nav-link">
                            <div class="card-body">
                                <h5 class="card-title">Waiting Approval</h5>
                                @php
                                $apnding = DB::table('parcel_infos')->where('cod_status', 'approval_pending')->count();
                                @endphp
                                <h6 class="card-subtitle mb-2">{{$apnding}}</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-light">
                            <a href="{{url('showpayriqu')}}" class="nav-link">
                            <div class="card-body">
                                <h5 class="card-title">Payment Riquest</h5>
                                @php 
                                $payriqu = DB::table('transactions')->where('status', 'pending')->get();
                                $count = $payriqu->count();
                                @endphp
                                <h6 class="card-subtitle mb-2"> {{$count}} </h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-light">
                           <a href="{{url('allparcel')}}" class="nav-link">
                            <div class="card-body">
                                <h5 class="card-title">Total Parcel</h5>
                                @php 
                                $allparcel = DB::table('parcel_infos')->get();
                                $allparc = $allparcel->count();
                                @endphp
                                <h6 class="card-subtitle mb-2">{{ $allparc}} </h6>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                 <div class="row mt-2">
                    <div class="col-md-3">
                        <a href="{{url('pendingByAdmin')}}" class="nav-link">
                        <div class="card bg-success text-light">
                            
                            <div class="card-body">
                                @php
                                    $allpending = DB::table("parcel_infos")->where('status', 'pending')->orwhere('status', 'Approved')->orwhere('status', 'received')->orwhere('status', 'sending')->get();
                                    $pcount = $allpending->count();
                                @endphp
                                <h5 class="card-title">Pending Parcel</h5>
                                   
                                <h6 class="card-subtitle mb-2">{{$pcount}}</h6>
                            </div>
                          
                        </div>
                        </a>
                    </div>
                    <div class="col-md-3 ">
                        <div class="card bg-success text-light">
                        <a href="{{url('alldelivery')}}" class="nav-link">
                            <div class="card-body">
                                @php 
                                $delivered = DB::table('parcel_infos')->where('status', 'delivared')->get();
                                $dCount = $delivered->count();
                                @endphp
                                <h5 class="card-title">Total Delivared Parcel </h5>
                              
                                <h6 class="card-subtitle mb-2">{{$dCount}}</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-light">
                           <a href="{{url('company/allmarchent')}}" class="nav-link">
                            <div class="card-body">
                                <h5 class="card-title">All Marchent </h5>
                               @php
                               $marchent = DB::table('marchents')->where('status', 'Marchent')->count();
                               @endphp
                                <h6 class="card-subtitle mb-2"> {{$marchent}} </h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-light">
                           <a href="{{url('balance/add/request')}}" class="nav-link">
                            <div class="card-body">
                                <h5 class="card-title">Add Balance Request</h5>
                                @php 
                                $balance = DB::table('add_balances')->where('pay_status', 'pending')->count();
                                @endphp 
                                <h6 class="card-subtitle mb-2">{{$balance}} </h6>
                            </div>
                            </a>
                        </div>
                    </div>
                </div> 
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
