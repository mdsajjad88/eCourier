@extends('admin.home')
@section('title', 'Our Rider')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Our All Rider List ({{$countt}})</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <tr>
                    <th>Name </th>
                    <th>Branch Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                </tr>
                @foreach($rider as $riders)
                <tr>
                    <td>{{$riders->name}}</td>                   
                    <td>{{$riders->branch}}</td>
                    <td>{{$riders->contact}}</td>
                    <td>{{$riders->email}}</td>
                </tr>
                @endforeach
            </table>
            {{$rider->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>


@endsection