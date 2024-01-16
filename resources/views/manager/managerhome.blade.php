@extends('layouts.app')
@section('title', 'Manager Panel')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <img src="{{url('frontend/img/user.png')}}" height="200px" class="card-img-top" alt="...">
                <div class="card-body">
                <h5>Manager Panel ({{ $branch = Auth::guard('manager')->user()->branch_name;}}) </h5>

                    <h5 class="card-title"><a href="{{url('managerpanel')}}" class="btn btn-primary form-control">Dashboard</a></h5>
                   

                </div>
                
                <ul class="list-group list-group-flush">

                    <li class="list-group-item"><a href="{{url('addrider')}}" class="nav-link">Add New Rider</a></li>
                    <li class="list-group-item"><a href="{{url('addparceltom')}}" class="nav-link">Add New Parcel</a></li>
                    <li class="list-group-item"><a href="{{url('sendparcel')}}" class="nav-link">Send Parcel</a></li>
                    <li class="list-group-item"><a href="{{url('moneytransfer')}}" class="nav-link">Money Transfer</a></li>
                    <li class="list-group-item"><a href="{{url('editparcel')}}" class="nav-link">Edit a Parcel </a></li>
                    <li class="list-group-item"><a href="{{url('ourdelivery')}}" class="nav-link">Total Delivery Our Hub </a></li>
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
                        <div class="card bg-secondary text-light">
                            <a href="{{url('viewpickriqu')}}"  class="text-white nav-link">
                            <div class="card-body">
                                <h5 class="card-title">Pick up request</h5>
                                <h6 class="card-subtitle mb-2">{{$pick}}</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-secondary text-light">
                         <a href="{{url('allreceived')}}" class="nav-link"> 
                            <div class="card-body">
                                <h5 class="card-title">Received Parcel</h5>
                                @php
                                $branch = Auth::guard('manager')->user()->branch_name;
                                $received = DB::table('parcel_infos')->where('status', 'received')->where('receiving_add', $branch)->count();      
                                             
                                @endphp
                                <h6 class="card-subtitle mb-2">{{ $received }}</h6>
                            </div>
                            </a>  
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="{{url('allpendingshow')}}" class="nav-link">
                        <div class="card bg-secondary text-light">
                            <div class="card-body">
                                <h5 class="card-title">Pending Parcel</h5>
                                @php
                                $branch = Auth::guard('manager')->user()->branch_name;
                                $userid = DB::table('parcel_infos')->where('status', 'pending')->where('user_district', $branch)->count();      
                                             
                                @endphp
                                <h6 class="card-subtitle mb-2">{{$userid}}</h6>
                            </div>
                            
                        </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{url('upcoming')}}" class="nav-link">
                        <div class="card bg-secondary text-light">
                          
                            <div class="card-body">
                                <h5 class="card-title">Upcoming Parcel</h5>
                                @php
                                $branch = Auth::guard('manager')->user()->branch_name;
                                $upcoming = DB::table('parcel_infos')->where('status', 'sending')->where('receiving_add', $branch)->count();      
                                             
                                @endphp
                                <h6 class="card-subtitle mb-2">{{$upcoming}} </h6>
                            </div>
                        </div>
                        </a>
                    </div>                  
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                    <a href="{{url('pendingmarchent')}}" class="nav-link">
                        <div class="card bg-secondary text-light">
                          
                            <div class="card-body">
                                <h5 class="card-title">Pending Marchent</h5>
                                @php
                                $branch = Auth::guard('manager')->user()->branch_name;
                                $pending = DB::table('marchents')->where('district', $branch)->where('status', 'pending')->count();      
                                             
                                @endphp
                                <h6 class="card-subtitle mb-2">{{$pending}} </h6>
                            </div>
                        </div>
                        </a>
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