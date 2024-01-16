@extends('home')
@section('title', 'Transaction Information')

@section('subsection')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2  class="text-center">My Transaction History</h2>
            <hr>
        </div>
    </div>    
    <div class="row">
        <div class="col">
            <table style="width: 100%;">
                <tr>
                    <th>SL. No</th>
                    <th> Transaction ID</th>
                    <th>Payment Method</th>
                    <th>Account no</th>
                    <th>Amount </th>
                    <th>Status</th>
                    <th>Info</th>
                </tr>
                @php 
                $uid = auth()->user()->id;
                $tnxid = DB::table('transactions')->where('user_id', $uid)->get();
                @endphp
                @foreach($tnxid as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->tnx_id}}</td>
                    <td>{{$transaction->pay_method}}</td>
                    <td>{{$transaction->account_no}}</td>
                    <td>{{$transaction->current_balance}}</td>
                    <td><b class="btn btn-success"> {{$transaction->status}}</b></td>
                    <td><a href="{{url('tnxdetails/'.$transaction->tnx_id)}}" class="btn btn-primary">Details</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection