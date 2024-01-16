@extends('admin.home')
@section('title', 'Pending Details')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">All Pending Parcel</h2><hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <tr>
                    <th>Parcel ID</th>
                    <th>Marchent ID</th>
                   <th>Current Location</th>
                    <th>Delivery Location</th>
                    <th>COD</th>
                    <th>Current Status</th>
                </tr>
                @foreach($pendings as $pending)
                <tr>
                    <td>{{$pending->id}}</td>
                    <td>{{$pending->user_id}}</td>
                    @php 
                    $location = DB::table('trakings')->where('parcel_id', $pending->id)->get();
                    @endphp
                    @foreach($location as $loc)
                    @endforeach
                    <td>{{$loc->creat_by}}</td>
                   
                    <td>{{$pending->address}}</td>
                    <td>{{$pending->cod}}</td>
                    <td>{{$pending->status}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
{{$pendings->links('pagination::bootstrap-4')}}
@endsection