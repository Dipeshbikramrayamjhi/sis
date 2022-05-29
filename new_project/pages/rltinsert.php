<?php
require_once "tablejoin.php";
if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    
    array_pop($_POST);
    if($_POST['fullmarks']<$_POST['passmarks']){
        echo "passmarks is greater than fullmarks";
        ?>  <br>
            <a href="rltinsert.php">BACK</a>
        <?php
        die;
        //unset($_POST[''])
    }
    if($_POST['fullmarks']<$_POST['obt_marks']){
        echo "obt_marks is greater than fullmarks";
        ?>  <br>
            <a href="rltinsert.php">BACK</a>
        <?php
        die;
    }
    if($_POST['percentage']>100){
        echo "Percentage cant be greater than 100";
        ?>  <br>
            <a href="rltinsert.php">BACK</a>
        <?php
        die;
    }
    if($_POST['passmarks']>$_POST['obt_marks'])
    {
        $_POST['result']='FAIL';
    }
    else{
        $_POST['result']='PASS';
    }
    $obj->Insert("tbl_result",$_POST);
}
?>
<div class="container">
 <div class="row">
  <div class="col-md-12">
  <h2><i class="glyphicon glyphicon-user"></i>Result Insert</h2>
  </div>

<form action="" method="post" class="form-group">
</div>
<div class="row">
  <div class="col-md-6">
<div class="form-group">
<label for="roll no">Roll_no</label>
<select name="sid" class="form-control" id="rollno">
<option selected disabled >CHOOSE</option>
<?php foreach($student as $student): ?>
<option value="<?=$student['sid'];?>"><?=$student['roll_no'];?></option>
<?php endforeach ; ?>
</select>
</div>
<div class="form-group">
<div id="batch" style="font-size: 30px;"></div>
</div>
<div class="form-group">
<div id="name" style="font-size: 30px;"></div>
</div>
<div class="form-group">
<label>Program Name</label>
<select name="pid" class="form-control" id="programname">
<option selected disabled >CHOOSE</option>
<?php foreach($program as $program): ?>
<option value="<?=$program['pid'];?>"><?=$program['proname'];?></option>
<?php endforeach ; ?>
</select>
</div>

<div class="form-group">
<label for="semester">SEMESTER</label>
<select name='semid' class="form-control"  >
<option selected disabled>CHOOSE SEMESTER</option>
<option >1</option>
<option >2</option>
<option>3</option>
<option >4</option>
<option >5</option>
<option >6</option>
<option>7</option>
<option>8</option>
</select>
</div>

<div class="form-group">
<label> Term</label>
<select name="term" class="form-control">
<option selected disabled >CHOOSE</option>
<option>First term</option>
<option>Mid term</option>
<option>Final term</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group" >
<label>Subject</label>
<select name="subid" class="form-control" id="proData">
<option selected disabled >CHOOSE</option>
</select>
</div>
<div class="form-group">
<label for="fullmarks">Full Marks</label>
<input type="number" name="fullmarks" class="form-control">
</div>
<div class="form-group">
<label for="passmarks">Pass Marks</label>
<input type="number" name="passmarks" class="form-control">
</div>
<div class="form-group">
<label for=obt_marks>Obtain Marks</label>
<input type="number" name="obt_marks" class="form-control">
</div>
<div class="form-group">
<label for="percentage">Percentage</label>
<input type="number" name="percentage" class="form-control">
</div>

<div class="form-group">
<label for="grade">Grade</label>
<input type="text" name="grade" class="form-control">
</div>

<div class="form-group" id="submit">
<input type="submit" name="submit" value="submit" class="btn btn-primary">

</div>
</div>
 </div>
</div>
</form>

<script>
$(document).ready(function(){
    $('#programname').on('change',function(){
        var proname = $(this).val();
        //alert(proname);
        var DataSet = {proname:proname}
        $.ajax({
            type : 'POST',
            url : 'ajax.php?action=changeProgram',
            data : DataSet,
            success : function(response){
               // alert(response);
               $('#proData').html(response);
            }
        })
    })
    
})
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
               // alert(response);
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
               // alert(response);
               $('#batch').html(response);
            }
        })
    })
})
</script>
