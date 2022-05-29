<?php
require "tablejoin.php";
if(isset($_POST['submit']) && $_POST['submit'] =='submit')
 {
  
    unset($_POST['submit']);
    $obj->Insert('fee_installment',$_POST);
}
?>
 <h2><i class="glyphicon glyphicon-user"></i>Insert INS Fee</h2>
<div class="container">
 <div class="row">
  <div class="col-md-12">
  <div class="col-md-5">
 

<form action="" method="post" class="form-group"  enctype="multipart/form-data">
<div class="form-group">
<label for="Roll_no">Roll_no</label>
<select name="sid" class="form-control" id="rollno">
<option selected disabled >ROLLNO / NAME</option>
<?php foreach($student as $student): ?>
<option value="<?=$student['sid'];?>"><?=$student['roll_no']." / ".$student['name'];?></option>
<?php endforeach ; ?>
</select>
</div>
<div class="form-group">
<label for="fid">FEE TYPE</label>
<select name="fid" class="form-control fee_type" id="ins"  >
<option selected disabled >FEE TYPE SEMESTER / BATCH / PROGRAM NAME</option>
<?php foreach($fees as $fees):
if($fees['feetype'] == 'semester') {?>
<option value="<?=$fees['fid'];?>"><?=$fees['feetype']." ".$fees['semester']." / ".$fees['batch']." / ".$fees['proname'];?></option>
<?php } 
else
{ ?>
<option value="<?=$fees['fid'];?>"><?=$fees['feetype']." / ".$fees['batch']." / ".$fees['proname'];?></option>
<?php }
endforeach ; ?>
</select>
</div>

<div class="form-group">
<label for="paying">PAYING AMOUNT</label>
<input type="number" name="paying" class="form-control">
</div>
<div class="form-group">
<label for="date">DATE</label>
<input type="date" name="date" class="form-control" >
</div>
<div class="form-group">
<button type="submit" name="submit" value="submit" class="btn btn-primary">submit</button>
</div>

</div>
<div class="col-md-7">
<div id="showdata">
<!-- area of showing total fee -->
</div>
<div id="remainingfees">

</div>
</div>
 </div>
</div>
</form>

<script>
$(document).ready(function(){
    $('#ins').on('change',function(){
       
        var showfee = $(this).val();
        //alert(showfee);
        var showfeeset = {showfee:showfee}
        $.ajax({
            type : 'POST',
            url : 'ajax.php?action=showfee',
            data : showfeeset,
            success : function(response){
                //alert(response);
               $('#showdata').html(response);
            }
        })
    });
    $('.fee_type').on('change',function(){
        var roll = $('#rollno').val();

     var fee = $(this).val();
     
        var data = {
            roll: roll,
            fee:fee
            //alert (ins);
        }
        
        $.ajax ({
            type :'post',
            url:'ajax.php?action=show',
            data:data,
            success:function(e){
                
                $('#remainingfees').html(e);
            }
        })
    });
});
</script>

