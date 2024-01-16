@extends('manager.managerhome')
@section('title', 'All Pending Parcel')
@section('subsection')



<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3 class="text-center">Pending Parcel List</h3>
            <hr>
            <table style="width: 100%;text-align:center" class="table table-striped">
                <thead>
                    <tr>
                        <th>Parcel ID</th>
                        <th>Marchent ID</th>
                        <th>Receiver Name</th>
                        <th> Contact</th>
                        <th> Address</th>
                        <th>COD</th>
                        <th colspan="2">Action</th>
                    </tr>

                </thead>

                <tbody>
                    @foreach($allparcel as $parcel)
                    <tr>
                        <td>{{$parcel->id}}</td>
                        <td>{{$parcel->user_id}}</td>
                        <td>{{$parcel->name}}</td>
                        <td>{{$parcel->contact}}</td>
                        <td>{{$parcel->address}}</td>
                        <td>{{$parcel->cod}}</td>
                        <td>
                            <a href="{{url('parcelapprove/'.$parcel->id)}}" class="btn btn-success">Apporove</a>
                        </td>
                        <td>
                            <a href="{{url('parceldelete/'.$parcel->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@if(Session::has('success'))
<p class="alert alert-success form-control">{{ Session::get('success')}}</p>
@endif
{{$allparcel->links('pagination::bootstrap-4')}}

@endsection