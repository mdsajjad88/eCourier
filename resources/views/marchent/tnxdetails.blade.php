@extends('home')
@section('title', 'Transaction Details')

@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center"> Transaction Details</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table style="width: 100%; text-align:center" class="table table-striped">
                <tr>
                    <th>Parcel ID</th>
                    <th>Customar Name</th>
                    <th>Delivery Location</th>
                    <th>COD</th>
                    <th>Pay COD</th>
                    <th>Delivery Charge</th>
                    <th>1% COD</th>
                </tr>
                @foreach($parcelinfo as $details)
                <tr>
                    <td>{{$details->id}} </td>
                    <td>{{$details->name}} </td>
                    <td>{{$details->address}} </td>
                    <td>{{$details->cod}} </td>
                    <td>{{$details->paid_cod}} </td>
                    <td>{{$details->delivery_charge}} </td>
                    <td>{{$details->cod_oneparcent}} </td>                   
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total COD = {{$cod}}</td>
                    <td>Paid COD = {{$paid_cod}}</td>
                    <td>Delivery Charge = {{$delivery_charge}}</td>
                    <td>1% Charge Total = {{$cod_one}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection