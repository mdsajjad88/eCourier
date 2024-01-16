@extends('frontend.layouts.index')
@section('title', 'Tracking Details')
@section('content')
<div class="container-fluid mt-5 mb-3" style="min-height: 400px;">
    <div class="row">
        <div class="col-2">
            <a href="{{url('tracking')}}" class="btn btn-success">Back</a>
        </div>
        @foreach($tracking as $track)
        @endforeach
        <div class="col-10">
            <div class="row">
                <div class="col-10">
                    <h2 class="text-center">Your Parcel Details</h2>
                </div>
                <div class="col-2">
                    <p class="btn btn-info">{{$track->status}} </p>
                </div>
            </div>

            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <h3 class="text-center">Tracking Details</h3>
            <hr>
            <div class="row">
                <div class="col">
                    <table border="1" style="text-align: center; width:100%">
                        <thead class="text-center">
                            <tr>
                                <th  class="text-center">Date & Time</th>
                                <th  class="text-center">Description </th>
                                <th  class="text-center">Status Creator</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($tracking as $track)
                            <tr>
                                <td>


                                    <b> {{ $track->created_at }}</b>

                                </td>
                                <td>

                                    <b>{{ $track->description }}</b>

                                </td>
                                <td>

                                    <b>{{ $track->creat_by }}</b>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
        <div class="col-4">
            <h3 class="text-center">Parcel Details</h3>
            <hr>
            <table border="1" style="text-align: center; width:100%" >

                <tr>
                    <th>Marchent ID</th>
                    <th>{{$track->user_id}}</th>
                </tr>
                <tr>
                    <th>Parcel ID</th>
                    <th>{{$track->parcel_id}}</th>
                </tr>
                @php
                $pid = $track->parcel_id;
                $parcel = DB::table('parcel_infos')->where('id', $pid)->first();
                @endphp
                <tr>
                    <th>Customar Name</th>
                    <th>{{$parcel->name}}</th>
                </tr>
                <tr>
                    <th>
                        Customar Contact
                    </th>
                    <th>{{$parcel->contact}}</th>
                </tr>
                <tr>
                    <th>Parcel Category</th>
                    <th>{{$parcel->category}}</th>
                </tr>
                <tr>
                    <th>Parcel Type</th>
                    <th>{{$parcel->type}} Delivery</th>
                </tr>
                <tr>
                    <th> Delivery Address</th>
                    <th>{{$parcel->address}}</th>
                </tr>
                <tr>
                    <th>Delivery District</th>
                    <th>{{$parcel->district}}</th>
                </tr>
                <tr>
                    <th>Parcel COD</th>
                    <th>{{$parcel->cod}}Tk ({{$parcel->cod_status}}) </th>
                </tr>
                <tr>
                    <th>Paid COD</th>
                    <th>{{$parcel->paid_cod}} Tk</th>
                </tr>
                <tr>
                    <th> COD 1% Charge</th>
                    <th>{{$parcel->cod_oneparcent}} Tk</th>
                </tr>
                <tr>
                    <th>Parcel Weight</th>
                    <th>{{$parcel->weight}} Kg</th>
                </tr>
                <tr>
                    <th>Delivery Charge</th>
                    <th>{{$parcel->delivery_charge}} Tk</th>
                    <th></th>
                </tr>
               
                <tr>
                    <th>Have Exchange</th>
                    <th>{{$parcel->exchenge}}</th>
                </tr>
                <tr>
                    <th>Transaction ID</th>
                    <th>{{$parcel->transaction}}</th>
                </tr>

            </table>
        </div>
    </div>

</div>
@endsection