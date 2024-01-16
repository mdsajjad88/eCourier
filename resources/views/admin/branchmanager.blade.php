@extends('admin.home')
@section('title', 'Manager Add')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
           <form action="{{url('addmanager')}}" method="post" id="managerad">
            @csrf
            <div class="row mt-2" >
                <div class="col-6">
                    @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                </div>
                <div class="col-6">
                    <p id="show"></p>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col">
                    <h2 class="text-center"> Add a new Branch Manager</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                <label for="">Select Branch</label>
                </div>
                <div class="col-6">
                <select name="branch_name" id="" class="form-control">
                    <option value="">Select Branch Name</option>
                    @foreach($branches as $branch)
                    <option value="{{$branch->bname}}">{{$branch->bname}}</option>
                    @endforeach
                </select>
                </div>  
                @error('branch_name')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">Manager Name</label>
                </div>
                <div class="col-6">
                <input type="text" name="manager_name" class="form-control">
                </div>  
                @error('manager_name')
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
                <label for="">Manager Phone Number</label>
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
                <label for="">Manager E-mail</label>
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
                <label for="">Manager NID No</label>
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
                <input type="text" name="password" class="form-control">
                </div> 
                @error('password')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <input type="submit" class="form-control btn btn-primary" value="Add Parcel">
                </div>
            </div>
           </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection


<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    $(document).ready(function(){
        $('#addingM').click(function(e){
            e.preventDefault();
            
        $.ajax({
            url:"{{ url('addmanager')}}",
            type: "POST",
            dataType: 'json',
            data: $('#managerad').serialize(),
            success:function(response){
                console.log(response);
            }
        });
       
    });
    });
</script>