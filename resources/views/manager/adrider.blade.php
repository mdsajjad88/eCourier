@extends('manager.managerhome')
@section('title', 'Add Rider')

@section('subsection')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            <form action="{{url('createrider')}}" method="post">
                @csrf
                <div>
                    @php 
                    $branch = Auth::guard('manager')->user()->branch_name;
                    @endphp
                    <label for="">Branch Name</label>
                   <select name="branch" id="" class="form-control">
                        <option value="{{ $branch }}" selected class="">{{ $branch}}</option>
                   </select>                 
                </div>
                <div>
                    <label for="">Rider Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="">E-mail</label>
                    <input type="email" name="email" class="form-control">
                    @error('email')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="">Contact</label>
                    <input type="text" name="contact" class="form-control">
                    @error('contact')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <input type="submit" name="submit" value="submit" class="btn btn-success mt-2 form-control">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection