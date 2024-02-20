@extends('manager.managerhome')
@section('title', 'Our Marchent')
@section('subsection')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3 class="text-center">Our Marchent List</h3>
            <hr>
            <table style="width: 100%;text-align:center" class="table table-striped">
                <thead>
                    <tr>
                        <th>Marchent ID</th>
                        <th>Marchent Name</th>
                        <th>E-mail Address</th>
                        <th> Contact No</th>
                        <th> Local Address</th>
                        <th>Upozilla</th>
                        <th>District</th>
                        <th>Division</th>
                    </tr>

                </thead>

                <tbody>
                    @foreach($marchents as $marchent)
                    <tr>
                        <td>{{$marchent->user_id}}</td>
                        @php 
                            $users = DB::table('users')->where('id', $marchent->user_id)->first();
                        @endphp
                      
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$marchent->primary_num }}</td>
                        <td>{{$marchent->local_address}}</td>
                        <td>{{$marchent->upozilla}}</td>
                        <td>{{$marchent->district}}</td>
                        <td>{{$marchent->division}}</td>
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

@endsection