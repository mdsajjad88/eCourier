@extends('admin.home')
@section('title', 'Our Profit')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Our Profit Details</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
                <table style="width: 100%; text-align:center" class="table table-striped">
            <tr>
                <th> Parcel ID </th>
                <th>Delivery Charge</th>
                <th>COD 1% Charge</th>
               
            </tr>
            @foreach($alldetails as $details)
            <tr>
                <td>{{$details->id}}</td>
                <td>{{$details->delivery_charge}}</td>
                <td>{{$details->cod_oneparcent}}</td>
            </tr>
            @endforeach
            <tr> 
                <td> Total = {{ $delivery + $codcharge }}</td>
                <td > Total Delivery Charge = {{ $delivery }} </td>
                <td > Total COD Charge = {{ $codcharge }} </td>
            </tr>
            </table>
        </div>
    </div>
</div>
@endsection