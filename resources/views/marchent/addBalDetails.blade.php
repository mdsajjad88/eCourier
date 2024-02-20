@extends('home')
@section('title', 'Add Balace Details')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Add Balance Details</h2> <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <tr>
                    <th> Transaction Code</th>
                    <th> Company Account</th>
                    <th> Pay Methode</th>
                    <th> Pay  Account</th>
                    <th> Pay Date</th>
                    <th> Pay Transaction</th>
                   
                    <th> Amount</th>
                    <th> Status </th>
                </tr>
                @foreach($allbalances as $balance)
                <tr>
                    <td>{{$balance->tnx_code}}</td>
                    <td>{{$balance->our_account}}</td>
                    <td>{{$balance->pay_method}}</td>
                    <td>{{$balance->pay_account}}</td>
                    <td>{{$balance->pay_date}}</td>
                    <td>{{$balance->pay_tnx}}</td>
                    <td>{{$balance->amount}}</td>
                    <td ><p class="btn btn-success">{{$balance->pay_status}} </p> </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection 