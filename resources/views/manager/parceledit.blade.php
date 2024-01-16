@extends('manager.managerhome')
@section('title', 'Edit Parcel')

@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Edit Your Parcel Information</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        @if(Session::has('success'))
        <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        <div class="col">
            <form action="{{route('pl')}}" method="post">
                @csrf
                <table class="table table-striped">
                    <tr>
                        <th> 
                        <label>Parcel ID</label>
                    
                        </th>
                        <td>
                        <input type="text" name="parcel_id" value="{{$parcelsearch->id}}" readonly class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Marchent ID</label>
                  
                        </th>
                        <td>
                        <input type="text" value="{{$parcelsearch->user_id}}" name="user_id" class="form-control" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Delivery Category</label>
                   
                        </th>
                        <td>
                        <input type="text" required name="category" value="{{$parcelsearch->category}}" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Delivery Type</label>
                  
                        </th>
                        <td>
                        <input type="text" required class="form-control" name="type" value="{{$parcelsearch->type}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Customar Name</label>
                    
                        </th>
                        <td>
                        <input type="text" required name="name" value="{{$parcelsearch->name}}" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Customar Contact</label>
                 
                        </th>
                        <td>
                        <input type="text" required name="contact" class="form-control" value="{{$parcelsearch->contact}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            
                    <label>Customar Address</label>
                    
                        </th>
                        <td>
                        <input type="text" required name="address" class="form-control" value="{{$parcelsearch->address}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Customar District</label>
                    
                        </th>
                        <td>
                        <input type="text" required name="district" class="form-control" value="{{$parcelsearch->district}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Customar Police-station</label>
                   
                        </th>
                        <td>
                        <input type="text" required name="policestation" class="form-control" value="{{$parcelsearch->policestation}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Parcel COD</label>
                  
                        </th>
                        <td>
                        <input type="text" required name="cod" class="form-control" value="{{$parcelsearch->cod}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Parcel Exchange</label>
                   
                        </th>
                        <td>
                        <input type="text"  name="exchange" class="form-control" value="{{$parcelsearch->exchange}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Parcel weight</label>
                   
                        </th>
                        <td>
                        <input type="text"  name="weight" class="form-control" value="{{$parcelsearch->weight}}">
                        </td>
                    </tr>
                    <tr>
                        <th> <label>Parcel Note</label>
                    </th>
                    <td>
                    <input type="text" required name="note" class="form-control" value="{{$parcelsearch->note}}">
                    </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Parcel Status</label>
                        </th>
                        <td> 
                    <input type="text" required name="status" class="form-control" value="{{$parcelsearch->status}}"></td>
                    </tr>
                    <tr>
                   <th> <label for="">Editing reasons and Details</label></th>
                   <td>
                   <textarea name="desc" required id="" class="form-control" rows="4"></textarea>
                   </td>
                    </tr>
                    <tr>
                   <td colspan="2"><input type="submit" value="Update Parcel Info" class="btn btn-info form-control"></td>
                    </tr>
                </table>
                
            </form>
           
        </div>
    </div>

</div>

@endsection