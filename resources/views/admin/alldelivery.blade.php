@extends('admin.home')
@section('title', 'Delivared Details')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">All Delivared Parcel</h2> <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <tr>
                    <th>Parcel ID</th>
                    <th>Marchent ID</th>
                    <th>Delivery Location</th>
                    <th>COD</th>
                    <th>Delivery Date</th>
                   
                </tr>
                @foreach($delivered as $pending)
                <tr>
                    <td>{{$pending->id}}</td>
                    <td>{{$pending->user_id}}</td>
                    <td>{{$pending->address}}</td>
                    <td>{{$pending->cod}}</td>
                    @php
                    $dates = $pending->updated_at;
                    $date = $dates->format('Y-m-d');
                    @endphp
                    <td>{{$date}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
{{$delivered->links('pagination::bootstrap-4')}}
@endsection