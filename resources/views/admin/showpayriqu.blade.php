@extends('admin.home')
@section('title', 'Payment Request')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">All Payment Request</h2><hr>
        </div>
    </div>
    <div class="row">
        @if(Session::has('success'))
        <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        <div class="col">
            <table style="width: 100%; text-align:center">
        <tr>
            <th>Marchent ID </th>
            <th>Amount</th>
            <th>Pay Method</th>
            <th>Account Name</th>
            <th>Account No.</th>
            <th>Tnx ID</th>
            <th>Action</th>
        </tr>
        @foreach($allrequ as $payriqu)
        <tr>
            <td>{{$payriqu->user_id}}</td>
            <td>{{$payriqu->current_balance}}</td>
            <td>{{$payriqu->pay_method}}</td>
            <td>{{$payriqu->account_name}}</td>
            <td>{{$payriqu->account_no}}</td>
            <td>{{$payriqu->tnx_id}}</td>
            <td><a href="{{url('paidpayriqu/'.$payriqu->tnx_id)}}" class="btn btn-success">Paid</a></td>
        </tr>
        @endforeach
        </table>
        </div>
    </div>
</div>
@endsection