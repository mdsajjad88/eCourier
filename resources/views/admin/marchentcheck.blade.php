@extends('admin.home')
@section('title', 'Check Marchent')
@section('subsection')

<div class="container">
    <div class="row">
    
        <div class="col-10">    
           
                <label for="">Enter Marchent ID</label>
            
            <input type="number" placeholder="Input Here Marchent ID" id="marchentID" name="marchentID" class="form-control">
 
        </div>
        
       
    </div>
    <div class="row mt-3">
        <div class="col">
        <div id="showResult" >
            
        </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#marchentID").keyup(function(){
            var myid = $(this).val();
            $.ajax({
                url: "mcheck/"+myid,
                type: "GET",
                success:function(ok){
                  $("#showResult").html(ok.right);
                 
                }
            })
        })
    })
</script>
@endsection
