@extends('manager.managerhome')
@section('title', 'Send Parcel')
@section('subsection')

            <div class="container">
                <div class="row">
                    <div class="col">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>Parcel ID</td>
                                    <td>Receiver Address </td>
                                    <td>Select Send Address</td>
                                    <td>Send</td>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{url('parcelsend')}}" method="post">
                                    @csrf
                                    @foreach($allparcel as $parcel)
                                    <tr>
                                        <td><input type="text" class="form-control" name="parcel_id" value="{{$parcel->id}}">  </td>
                                        <td> <input class="form-control" type="text" name="address" value="{{$parcel->address}}"> </td>
                                        <td>
                                            <select name="bname" id="" class="form-control">
                                                <option value="">Select Send Branch</option>
                                            @php 
                                            $branch = DB::table('branches')->get();
                                            @endphp
                                            @foreach($branch as $mybranch)
                                            <option value="{{$mybranch->bname}}" >{{$mybranch->district}}</option>
                                            @endforeach
                                            </select>
                                            @error('bname')
                                            <p class="alert alert-dangr">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td> <input class="btn btn-success" type="submit" value="Send"></td>
                                    </tr>
                                     @endforeach
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            @if(Session::has('success'))
            <p class="alert alert-success form-control">{{ Session::get('success')}}</p>
            @endif
           
@endsection