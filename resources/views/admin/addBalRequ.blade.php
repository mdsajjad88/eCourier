@extends('admin.home')
@section('title', 'Add Balance Request')
@section('subsection')

<div class="container">
    <div class="row">
        <div class="col">
        @if(Session::has('success'))
        <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
            <table class="table table-striped">
                <tr>
                    <th>Marchent ID</th>
                    <th>Pay Methode </th>
                    <th>Pay Account</th>
                    <th>Pay Date</th>
                    <th>Tnx Code</th>
                    <th>Amount</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
                @foreach($allrequ as $request )
                <tr>
                    <td>{{$request->user_id}}</td>
                    <td>{{$request->pay_method}}</td>
                    <td>{{$request->pay_account}}</td>
                    <td>{{$request->pay_date}}</td>
                    <td>{{$request->pay_tnx}}</td>
                    <td>{{$request->amount}}</td>
                    <td><a href="" class="btn btn-danger">Delete</a> </td>
                    <td><a href="{{url('add/balance/approved/'.$request->id)}}" class="btn btn-success">Approve</a> </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection