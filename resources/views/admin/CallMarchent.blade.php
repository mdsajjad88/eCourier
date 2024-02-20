@extends('admin.home')
@section('title', 'All Marchent')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <tr>
                    <th>Marchent ID</th>
                    <th>Contact No</th>
                    <th>Local Address</th>
                    <th>Upzilla </th>
                    <th>Division</th>
                    <th>Status</th>
                </tr>
                @foreach($myMarchents as $myMarchent)
                <tr>
                    <td>{{$myMarchent->user_id}}</td>
                    <td>{{$myMarchent->primary_num}}</td>
                    <td>{{$myMarchent->local_address}}</td>
                    <td>{{$myMarchent->upozilla}}</td>
                    <td>{{$myMarchent->division}}</td>
                    <td>{{$myMarchent->status}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection