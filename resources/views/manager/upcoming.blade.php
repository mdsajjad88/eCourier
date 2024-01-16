@extends('manager.managerhome')
@section('title', 'Upcoming Parcel')

@section('subsection')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Parcel ID</th>
                        <th>Receiver Name </th>
                        <th>Contact</th>
                        <th> Action </th>
                    </tr>
                    @foreach($upcoming as $upparcel)
                    <tr> 
                        <td> {{$upparcel->id}}</td>
                        <td> {{$upparcel->name}}</td>
                        <td> {{$upparcel->contact}}</td>
                        <td> <a href="{{url('receiving/'.$upparcel->id)}}" class="btn btn-success">Received</a></td>
                    </tr>
                    @endforeach
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection