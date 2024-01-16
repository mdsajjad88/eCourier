@extends('manager.managerhome')
@section('title', 'All Delivery')

@section('subsection')

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <tr>
                <th>Parcel ID</th>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Delivery Address</th>
                <th>Delivery Date</th>
                </tr>
                @foreach($parcels as $parcel)

              <tr>
                <td>{{$parcel->id}}</td>
                <td>{{$parcel->name}}</td>
                <td>{{$parcel->contact}}</td>
                <td>{{$parcel->address}}</td>
                @php 

                $date = $parcel->updated_at;
                $format = $date->format('Y-m-d');
                @endphp
                <td>{{$format}}</td>
              </tr>
              @endforeach
            </table>
        </div>
    </div>
</div>

@endsection