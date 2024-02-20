@extends('home')
@section('title', 'Add Balace')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
        @if(Session::has('success'))
        <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h2 class="text-center">Add Balace To Your Account</h2><hr>
        </div>
       
    </div>

    <div class="row">      
        <div class="col">          
            <form action="{{url('addBalance/action')}}" method="post">
                @csrf
                <table class="table">
                    <tr>
                        <th>Company Account No</th>
                       <td><input type="text" value="01767295333" class="form-control" readonly name="our_account"></td>
                    </tr>
                    <tr>
                        <th>Payment Method</th>
                        <td><input type="text" name="pay_method" class="form-control" required></td>
                        @error('pay_method')
                        <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </tr>
                    <tr>
                        <th>Account No</th>
                        <td><input type="number" name="pay_account"  class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Pay Amount</th>
                        <td><input type="number" name="amount"  class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Payment Date</th>
                        <td><input type="date" name="pay_date" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Transaction ID</th>
                        <td><input type="text" name="pay_tnx" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <th><input type="submit" class="form-control btn btn-info" value="Submit"></th>
                    </tr>
                </table>          
            </form>         
        </div>
        
    </div>
</div>
@endsection