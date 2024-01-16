@extends('admin.home')
@section('title', 'Our Manager')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Our All Manager List ({{$count}})</h2> <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <tr> 
                    <th>Name</th>
                    <th>Branch Name</th>
                    <th>Contact</th>
                    <th>E-mail</th>
                </tr>
                @foreach($managers as $manager)
                <tr>
                    <td>{{$manager->manager_name}}</td>
                    <td>{{$manager->branch_name}}</td>
                    <td>{{$manager->contact}}</td>
                    <td>{{$manager->email}}</td>
                   
                </tr>
                @endforeach
            </table>
            {{$managers->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
@endsection