@extends('manager.managerhome')
@section('title', 'Money Transfer')

@section('subsection')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="text-center"> Our Branches Delivared Parcel List</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
                <table style="width: 100%;" class="table table-striped">
                    <tr>
                        <th>Parcel ID</th>
                        <th> Parcel COD</th>
                        <th>Delivary Rider</th>
                    </tr>
                    @foreach($parcels as $parcel)
                    <tr>
                        <td>{{$parcel->id}}</td>
                        <td>{{$parcel->cod}}</td>
                        <td>{{$parcel->delivery_rider}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">Total Balance = {{ $total }}</td>
                        <td> <a href="" onclick="print();" class="btn btn-success">Print</a> </td>
                    </tr>
                </table>
               
        </div>
    </div>
</div>
{{ $parcels->links('pagination::bootstrap-4')}}
@endsection