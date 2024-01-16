@extends('rider.home')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <tr>
                    <th>Parcel ID</th>
                    <th>Customar Name</th>
                    <th>Delivery Location</th>
                    <th>Parcel COD</th>
                    <th>Delivery Date</th>
                </tr>
                @foreach($alldetails as $details)
                <tr>
                    <td>{{$details->id}}</td>
                    <td>{{$details->name}}</td>
                    <td>{{$details->address}}</td>
                    <td>{{$details->cod}}</td>
                    @php 
                   $dates =  $details->updated_at;
                   $date = $dates->format('Y-m-d');
                   @endphp
                    <td>{{$date}}</td>
                </tr>
                @endforeach
                <tr></tr>
            </table>
        </div>
    </div>
</div>
@endsection