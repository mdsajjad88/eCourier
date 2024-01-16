@extends('admin.home')
@section('title', 'Balance Approval')
@section('subsection')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Approval Pending Parcel List</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if(Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif
            <table style="width: 100%;">
                <tr>
                    <th>Parcel ID</th>
                    <th>Weight (kg)</th>
                    <th>Parcel COD </th>
                    <th>Delivery Branch</th>
                    <th>Paid COD</th>
                    <th>Delivery Charge</th>
                    <th>COD 1%</th>
                    <th>Action</th>
                </tr>
                @foreach($apnding as $parcel)
                <form action="balanceadded" method="post">
                    @csrf
                
                <tr>
                    
                    <td>
                    <select name="parcel_id" id="" class="form-control">
                        <option value="{{$parcel->id}}" selected>{{$parcel->id}}</option>
                    </select>    
                    </td>
                     
                    <td>
                        <input type="text" class="form-control" name="weight" value="{{$parcel->weight}}">
                    </td>

                    <td>
                    <input type="text" name="cod" class="form-control" value=" {{$parcel->cod}}"> 
                    @error('cod')
                   <p class="alert alert-danger">{{ $message }}</p>
                   @enderror   
                   </td>
                  
                    @php
                    $riderid = $parcel->delivery_rider;
                    $branch = DB::table('riders')->where('id', $riderid)->first();
                    @endphp
                    <td>
                    <select name="delivery_branch" class="form-control" id="">
                        <option value="{{$branch->branch}}" selected>{{$branch->branch}}</option>
                    </select>    
                    </td>  
                    @php 
                    $parcent = $parcel->cod_oneparcent;
                    $charge = $parcel->delivery_charge;
                    $cod = $parcel->cod;
                    $paiding = $cod -($parcent + $charge)
                    @endphp 
                    
                    <td>
                        <input type="text" name="paid_cod" class="form-control" value="{{$paiding}}">
                        @error('paid_cod')
                   <p class="alert alert-danger">{{ $message }}</p>
                   @enderror
                    </td>   
                   
                    <td>
                        <input type="text" class="form-control" name="delivery_charge" value="{{$parcel->delivery_charge}}">
                        @error('delivery_charge')
                   <p class="alert alert-danger">{{ $message }}</p>
                   @enderror
                    </td>  
                    <td>
                        <input type="text" class="form-control" readonly name="cod_oneparcent" value="{{$parcel->cod_oneparcent}}">
                        @error('cod_oneparcent')
                   <p class="alert alert-danger">{{ $message }}</p>
                   @enderror
                    </td>
                   
                    <td> <input type="submit" value="Paid" class="btn btn-success"> </td>
                </tr>
             </form>
                @endforeach
            </table>
        </div>
    </div>
</div>
{{ $apnding->links('pagination::bootstrap-4')}}
@endsection