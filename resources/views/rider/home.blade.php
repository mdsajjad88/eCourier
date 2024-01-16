@extends('layouts.app')
@section('title', 'Rider Home')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <img src="{{url('frontend/img/user.png')}}" height="200px" class="card-img-top" alt="...">
                <div class="card-body">
                <h5>Rider Panel</h5>
                    <h5 class="card-title"><a href="{{url('rhome')}}" class="btn btn-primary form-control">Dashboard</a></h5>
                </div>
                
                <ul class="list-group list-group-flush">

                    <li class="list-group-item"><a href="{{url('info')}}" class="nav-link">My Profile</a></li>
                   
                </ul>

            </div>
        </div>
        <div class="col-md-9">
            @hasSection('subsection')
            @yield('subsection')
            @else

            <div class="container">
                <div class="row">
               
                    <div class="col-md-4">
                    <a href="{{url('allriqu')}}" class="nav-link">
                            <div class="card bg-dark text-light">
                     
                                <div class="card-body">
                                    <h4>Pick Up Assign </h4>
                                    @php 
                                    $rid = Auth::guard('rider')->user()->id;
                                    $date = date('Y-m-d');
                                    $all = DB::table('pickups')->where('status', $rid)->where('date', $date)->get();
                                    $counting = $all->count();
                                    @endphp
                                    <h5>{{$counting}} </h5>
                                </div>
                          
                            </div>
                            </a>
                    </div>
                   
                    <div class="col-md-4">
                        <div class="card bg-dark text-light">
                            <a href="{{url('allassignshow')}}"  class="text-white nav-link">
                            <div class="card-body">
                                <h4>Delivery Assign </h4>
                                @php 
                                $rid = Auth::guard('rider')->user()->id;
                            
                                $delivery = DB::table('parcel_infos')->where('status', 'rider_assign')->where('delivery_rider', $rid)->get();
                                $deliassign = $delivery->count();
                                @endphp
                                <h5>{{$deliassign}}</h5>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark text-light">
                            <a href="{{url('deliverydetails')}}"  class="text-white nav-link">
                            <div class="card-body">
                                <h4>My Total Delivery </h4>
                              @php 
                            $total = DB::table('parcel_infos')->where('status', 'delivared')->where('delivery_rider', $rid)->get();
                            $count = $total->count();
                            @endphp
                                <h5>{{$count}}</h5>
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