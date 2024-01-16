@extends('home')
@section('title', Auth::user()->name.' Profile')

@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
        @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
        @if(Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif
        </div>
    </div>
    @php
    $uid = auth()->user()->id;
    $marchent = DB::table('marchents')->where('user_id', $uid)->get();
    $count = $marchent->count();
    @endphp
    @if($count > 0 )
    <p class="alert alert-success"> Already Added {{ Auth::user()->name}} Profile Information </p>
   
    <div class="row">
    @else
        <div class="col-8">
            <h1>{{ Auth::user()->name}} Profile</h1>
            <form action="{{url('addressadd')}}" method="post">
                @csrf
                <div>
                    <div class="row">
                        <div class="col-4">
                            <a href="" class="btn btn-success form-control"> Update Info</a>
                        </div>
                        <div class="col-8">
                            <h3 class="text-center">Enter your personal Information</h3>
                            <hr>
                        </div>
                    </div>

                </div>
                <div>
                    <label for="">Enter Your Primary Number</label>
                    <input type="text" name="primary_num" class="form-control">
                </div>
                <div>
                    <label for="">Local Address</label>
                    <input type="text" name="local_address" class="form-control">
                </div>
                <div>
                    <label for="">Upzilla</label>
                    <input type="text" name="upozilla" class="form-control">
                </div>
                <div>
                    <label for="">District</label>
                    <input type="text" name="district" class="form-control">
                </div>
                <div>
                    <label for="">Division</label>
                    <input type="text" name="division" class="form-control">
                </div>
                <div>
                    <input type="submit" class="form-control btn btn-success mt-2">

                </div>
            </form>
        </div>
        @endif
        <div class="col-4">
            <div class="mobile-payment">
                <div>
                    <input type="text" class="btn btn-primary form-control" value="Add Mobile Payment Account">
                </div>
                <form action="{{url('adbkash')}}" method="post">
                    @csrf
                    <div>
                        <label for="">Payment Method</label>
                        <select name="method" id="" class="form-control">
                            <option value="">Select Payment Method</option>
                            <option value="{{ __('bkash')}}">Bkash</option>
                            <option value="{{ __('nagad')}}">Nagad</option>
                            <option value="{{ __('rocket')}}">Rocket</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Enter Account No</label>
                        <input type="text" name="account_no" class="form-control">
                    </div>
                    <div>
                        <input type="submit" value="Add Account" class="form-control btn btn-success">
                    </div>
                </form>
            </div>
            <hr>
            
            <div class="card-payment mt-4 ">
                <div>
                    <h3 class="btn btn-primary form-control">Add Card Details</h3>
                </div>
                <form action="{{url('adcardno')}}" method="post">
                @csrf
                <div>
                    <label for="">Bank Name</label>
                    <input type="text" name="bank_name" class="form-control">
                </div>
                <div>
                    <label for="">Account No</label>
                    <input type="text" name="account_no" class="form-control">
                </div>
                <div>
                    <input type="submit" value="Add Bank Account" class="btn btn-success mt-2 form-control">
                </div>
                </form>
            </div>
        </div>
    </div>
   
</div>
@endsection