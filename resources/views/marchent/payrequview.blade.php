@extends('home')
@section('title', 'Payment Request Send')

@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Please Fill Up This Form</h2>
            <hr>
        </div>
    </div>
    @if(Session::has('success'))
    <p class="alert alert-success" >{{Session::get('success')}}</p>
    @endif
    @if(Session::has('error'))
    <p class="alert alert-danger" >{{Session::get('error')}}</p>
    @endif
    <div class="row">
        <div class="col">
            <form action="{{url('payment/request/send')}}" method="post">
                @csrf 
                <div class="row">
                    <div class="col-6">
                    <label for="">Your Current Balence</label>
                    </div>
                    <div class="col-6">
                   <select name='current_balance' id="" class="form-control">
                    <option value="{{$balance}}" selected>{{$balance}}</option>
                   </select>
                    </div>
                   @error('current_balance')
                   <p class="alert alert-danger">{{$message}}</p>
                   @enderror
                </div>
                <div class="row mt-2">
                    <div class="col-6">Input Payment Method </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="pay_method" placeholder="Example Mobile Bangking / Bank Method">
                    </div>

                    @error('pay_method')
                   <p class="alert alert-danger">{{$message}}</p>
                   @enderror
                </div>
                <div class="row mt-2">
                    <div class="col-6">Account Name</div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="account_name" placeholder="Example Bkash / City Bank">
                    </div>
                    @error('account_name')
                   <p class="alert alert-danger">{{$message}}</p>
                   @enderror
                </div>
                <div class="row mt-2">
                    <div class="col-6">Account Numbar</div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="account_no" placeholder="Example 017******** / 24789*********">
                    </div>
                    @error('account_no')
                   <p class="alert alert-danger">{{$message}}</p>
                   @enderror
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Send Request" class="btn btn-primary form-control">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection