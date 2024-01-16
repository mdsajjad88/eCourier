@extends('home')
@section('title', 'Waiting Approval')

@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
          <h2 class="text-center">Waiting Approval Parcel List</h2> <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
           <table style="width: 100%;" class="table table-striped">
            <tr>
                <th>Parcel id</th>
                <th>Customar Name</th>
                <th>Contact</th>
                <th>COD</th>
            </tr>
            @foreach($approvalpercel as $parcel)
            <tr>
                <td>{{ $parcel->id }}</td>
                <td>{{$parcel->name}}</td>
                <td>{{$parcel->contact}}</td>
                <td>{{$parcel->cod}}</td>
            </tr>
            @endforeach
           </table>
        </div>
    </div>
</div>
{{$approvalpercel->links('pagination::bootstrap-4')}}
@endsection