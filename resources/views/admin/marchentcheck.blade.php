@extends('admin.home')
@section('title', 'Check Marchent')
@section('subsection')

<div class="container">
    <div class="row">
    <form action="" method="post">
      @csrf
        <div class="col-10">    
           
                <label for="">Enter Marchent ID</label>
            
            <input type="number" id="marchentID" name="marchentID" class="form-control">
 
        </div>
        <div class="col-2 mt-2">
            <input type="submit" id="bttn" class="btn btn-success form-control">
        </div>
        </form>
    </div>
    <div class="row mt-3">
        <div class="col">
        <div id="showResult">

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
