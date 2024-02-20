@extends('layouts.app')
@section('title', 'Marchent Panel')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <img src="{{url('frontend/img/user.png')}}" height="100px" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> {{ Auth::user()->name }}</h5>
                    <h5 class="card-title"> {{ Auth::user()->email }}</h5>
                    <h4>Marchent Panel</h4>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item"><a href="{{url('/home')}}" class="form-control btn btn-success">Dashboard</a></li>
                    @php
                    $date = date('Y-m-d');
                    $uid = Auth::user()->id;
                    $pickam = DB::table('pickups')->where('user_id', $uid)->where('date', $date)->get();
                    $pickkk = $pickam->count();
                    @endphp
                    @if($pickkk > 0)
                    @foreach($pickam as $pickc)
                    @endforeach
                    @php
                    $rid= $pickc->status;
                    $rdetails = DB::table('riders')->where('id', $rid)->get();
                    @endphp
                    @foreach($rdetails as $details)
                    <p class="alert alert-success">Assigned Rider : {{ $details->name }} <br> Contact No {{$details->contact}}</p>
                    @endforeach
                    @else
                    <li class="list-group-item"><a href="{{url('pickuprequ')}}" class="form-control btn btn-primary">Send A pick up risuest</a></li>
                    @endif
                    <li class="list-group-item"><a href="{{url('setprofile')}}" class="nav-link">Add Your Information</a></li>
                    <li class="list-group-item"><a href="{{url('addparcel')}}" class="nav-link">Add Parcel</a></li>                   
                    <li class="list-group-item"><a href="{{url('addBalance')}}" class="nav-link">Add Balance </a></li>
                   <li class="list-group-item"> <a href="{{url('payment/request')}}" class="nav-link"> Send Payment Request</a></li>
                   <li class="list-group-item"><a href="{{url('transactioninfo')}}" class="nav-link"> All Transaction</a></li>
                   <li class="list-group-item"><a href="{{url('editprofile')}}" class="nav-link">Edit Profile</a></li>
                </ul>

            </div>
        </div>
        <div class="col-md-9">
            @hasSection('subsection')
            @yield('subsection')
            @else

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card bg-dark text-light">
                            <a href="{{url('balancedetails')}}" class="nav-link">
                            <div class="card-body">
                                <h5 class="card-title">Current Balance</h5>
                                @php 
                                $user = Auth::user()->id;
                                $count = DB::table('marchents')->where('user_id', $user)->count();
                                @endphp 
                                @if($count > 0)

                                @php 
                                $user = Auth::user()->id;
                                $balance = DB::table('marchents')->where('user_id', $user)->first();
                                @endphp
                                <h6 class="card-subtitle mb-2">{{$balance->current_balance}}</h6>
                                @else 
                                <h6 class="card-subtitle mb-2">000</h6>
                                @endif
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="card bg-dark text-light">
                            <a href="{{url('pendingtk')}}" class="nav-link">
                            <div class="card-body">
                                @php
                                $user = auth()->user()->id;
                                $allpercel = DB::table('parcel_infos')->where('user_id', $user)->where('cod_status', 'pending')->sum('cod');
                                @endphp
                                <h5 class="card-title">Pending Balance</h5>
                                <h6 class="card-subtitle mb-2">{{$allpercel}}</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-dark text-light">
                            <a href="{{url('waitingappr')}}" class="nav-link">
                                <div class="card-body">
                                    <h5 class="card-title">Waiting Approval</h5>
                                    @php
                                    $user = auth()->user()->id;
                                    $approvalpercel = DB::table('parcel_infos')->where('user_id', $user)->where('cod_status', 'approval_pending')->sum('cod');
                                    $parcel = DB::table('parcel_infos')->where('user_id', $user)->count();
                                    @endphp
                                    <h6 class="card-subtitle mb-2">{{$approvalpercel}}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-dark text-light">
                            <a href="{{url('allparceldetails')}}" class="nav-link">
                            <div class="card-body">
                                <h5 class="card-title">Total Parcel</h5>
                                <h6 class="card-subtitle mb-2">{{ $parcel }}</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="card bg-dark text-light">
                            <a href="{{url('addBalDetails')}}" class="nav-link">
                            <div class="card-body">
                                <h5 class="card-title">Total Add Balance</h5>
                                @php 
                                $user = Auth::user()->id;
                                $totalBal  = DB::table('add_balances')->where('user_id', $user)->sum('amount');
                                @endphp
                                <h6 class="card-subtitle mb-2">{{$totalBal}}</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-dark text-light">
                            <a href="{{url('pending/parcel')}}" class="nav-link">
                            <div class="card-body">
                                <h5 class="card-title">Pending Parcel </h5>
                                @php 
                                $user = auth()->user()->id;
                                $allpercel = DB::table('parcel_infos')->where('user_id', $user)->where('cod_status', 'pending')->count();
                                   
                                @endphp
                                <h6 class="card-subtitle mb-2">{{$allpercel}}</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-dark text-light">
                            <a href="{{url('delivared/parcel')}}" class="nav-link">
                            <div class="card-body">
                                <h5 class="card-title">Total Delivared Parcel </h5>
                                @php 
                                $user = Auth::user()->id;
                                $totaldeli   = DB::table('parcel_infos')->where('user_id', $user)->where('status','delivared')->count();
                                @endphp
                                <h6 class="card-subtitle mb-2">{{$totaldeli}}</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if(Session::has('success'))
            <p class="alert alert-success form-control">{{ Session::get('success')}}</p>
            @endif
            @endif
        </div>
    </div>
</div>
@endsection