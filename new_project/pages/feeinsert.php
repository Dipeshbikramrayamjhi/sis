<?php

require_once "tablejoin.php";

if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    array_pop($_POST);
    $_POST['remain_adm_fee']=$_POST['adm_fee'];
    $_POST['paid_adm_fee']=0;
    $_POST['remainingfee']=$_POST['totalfee'];
    $_POST['paidfee']=0;

    $obj->Insert("tbl_fee",$_POST);
}
?>


<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-user"></i>Insert Fee</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label for="Roll_no">Roll_no</label>
<select name="roll_no" class="form-control" id="rollno">
<option selected disabled >CHOOSE</option>
<?php foreach($student as $student): ?>
<option value="<?=$student['roll_no'];?>"><?=$student['roll_no'];?></option>
<?php endforeach ; ?>
</select>
</div>
<div class="form-group">
<label>Name</label>
<select name="sid" class="form-control" id='name'>
<option selected disabled >SELECT ROLLNO</option>
</select>
</div>
<div class="form-group">
<label for="batch">Batch</label>
<select name="batch" class="form-control" id='batch'>
<option selected disabled >SELECT ROLLNO</option>
</select>
</div>
<div class="form-group">
<label>Program Name</label>
<select name="pid" class="form-control" id="programname">
<option selected disabled >SELECT ROLLNO</option>
</select>
</div>
<div class="form-group">
<label for="admission_fee">ADMISSION FEE</label>
<input type="number" name="adm_fee" class="form-control">
</div>
<div class="form-group">
<label>SEMESTER</label>
<select name="semid" class="form-control">
<option selected disabled>CHOOSE</option>
<?php foreach($semester as $semester):?>
<option value="<?=$semester['semid'];?>"><?=$semester['semester'];?></option>
<?php endforeach ?>
</select>
</div>
<div class="form-group">
<label for="totalfee">Total fee</label>
<input type="number" name="totalfee" class="form-control">
</div>
<div class="form-group">
<label for="date">DATE</label>
<input type="date" name="date" class="form-control">
</div>
<div class="form-group">
<button type="submit" name="submit" value="submit" class="btn btn-primary">submit</button>
</div>

</div>
 </div>
</div>
</form>
<script>
$(document).ready(function(){
    $('#rollno').on('change',function(){
        var name = $(this).val();
       // alert(name);
        var nameset = {name:name}
        $.ajax({
            type : 'POST',
            url : 'ajax.php?action=changename',
            data : nameset,
            success : function(response){
                //alert(response);
               $('#name').html(response);
            }
        })
    })
})
$(document).ready(function(){
    $('#rollno').on('change',function(){
        var batch = $(this).val();
       // alert(name);
        var batchset = {batch:batch}
        $.ajax({
            type : 'POST',
            url : 'ajax.php?action=changebatch',
            data : batchset,
            success : function(response){
                //alert(response);
               $('#batch').html(response);
            }
        })
    })
})
$(document).ready(function(){
    $('#rollno').on('change',function(){
        var programname = $(this).val();
       // alert(name);
        var pronameset = {programname:programname}
        $.ajax({
            type : 'POST',
            url : 'ajax.php?action=changefeeprogram',
            data : pronameset,
            success : function(response){
                //alert(response);
               $('#programname').html(response);
            }
        })
    })
})
</script>