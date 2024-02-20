@extends('home')
@section('title', 'Add Balace')
@section('subsection')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="text-center">All Delivared Parcel</h2> <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
            <tr>
                   
                   <th>Parcel ID</th>
                   <th>Parcel COD</th>
                   <th>Receiver </th>
                   <th>Paid COD</th>
                   <th> Delivery Charge</th>
                   <th> COD 1% </th>
               </tr>
               @foreach($alldelivery as $parcel)
               <tr>

                   <td>{{$parcel->id}}</td>
                   <td>{{$parcel->cod}}</td>
                   <td>{{$parcel->name}}</td>
                   <td>{{$parcel->paid_cod}}</td>
                   <td>{{$parcel->delivery_charge}}</td>
                   <td>{{$parcel->cod_oneparcent}}</td>
               </tr>
               @endforeach
            </table>
        </div>
    </div>
</div>
@endsection 