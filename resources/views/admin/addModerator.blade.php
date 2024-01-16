@extends('admin.home')
@section('title', 'Add Moderator')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
           <form action="{{url('addmodaretor')}}" method="post">
            @csrf
            <div class="row mt-2" >
                <div class="col-6">
                    @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                </div>
                
            </div>
            <div class="row mt-3">
                <div class="col">
                    <h2 class="text-center"> Add a new Moderator</h2>
                    <hr>
                </div>
            </div>
           
            <div class="row mt-1">
                <div class="col-6">
                <label for="">Moderator Name</label>
                </div>
                <div class="col-6">
                <input type="text" name="moderator_name" class="form-control">
                </div>  
                @error('moderator_name')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror 
            </div>
            <div class="row mt-1">
                <div class="col-6">
                <label for="">Father  Name</label>
                </div>
                <div class="col-6">
                <input type="text" name="father_name" class="form-control">
                </div>  
                @error('father_name')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror 
            </div>
            <div class="row mt-1">
                <div class="col-6">
                <label for="">Mother Name</label>
                </div>
                <div class="col-6">
                <input type="text" name="mother_name" class="form-control">
                </div>  
                @error('mother_name')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror 
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">Moderator Phone Number</label>
                </div>
                <div class="col-6">
                <input type="number" name="contact"  class="form-control">
                </div>  
                @error('contact')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror 
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">Moderator E-mail</label>
                </div>
                <div class="col-6">
                <input type="email" name="email" class="form-control">
                </div>   
                @error('email')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror
            </div>
            <div class="row mt-1">
                <div class="col-6">
                <label for="">Moderator NID No</label>
                </div>
                <div class="col-6">
                <input type="text" name="nid" class="form-control">
                </div>   
                @error('nid')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>
            <div class="row mt-1">
                <div class="col-6">
                <label for="">Full Address</label>
                </div>
                <div class="col-6">
                <input type="text" name="address" class="form-control">
                </div> 
                @error('address')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">Date of Birth</label>
                </div>
                <div class="col-6">
                <input type="date" name="birthday" class="form-control">
                </div> 
                @error('birthday')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">Password</label>
                </div>
                <div class="col-6">
                <input type="password" name="password" class="form-control">
                </div> 
                @error('password')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" class="form-control btn btn-primary" value="Add Moderator">
                </div>
            </div>
           </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection

