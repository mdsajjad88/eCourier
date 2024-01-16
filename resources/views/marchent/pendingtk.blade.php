@extends('home')
@section('title', 'Pendign Balance Details')

@section('subsection')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Pending Parcel History</h2><hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                
                    <tr>
                        <th>Parcel ID</th>
                        <th>Customar Name</th>
                        <th>COD</th>
                        <th>Status</th>
                    </tr>
                    @foreach($balanced as $ptk)
                    <tr>
                        <td>{{$ptk->id}}</td>
                        <td>{{$ptk->name}}</td>
                        <td>{{$ptk->cod}}</td>
                        <td><a href="" class="btn btn-info">{{$ptk->status}}</a> </td>
                    </tr>
                    @endforeach
               <tr>
                <td></td>
                <td></td>
                <td>Total = {{ $total }}</td>
                <td></td>
               </tr>
            </table>
        </div>
    </div>
</div>
{{$balanced->links('pagination::bootstrap-4')}}
@endsection