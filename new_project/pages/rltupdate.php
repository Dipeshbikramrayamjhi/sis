<?php

require_once 'tablejoin.php';
$Result=$obj->Select("tbl_result","*","rid",$_GET['rid']);
if(isset($_POST['submit'])){
    array_pop($_POST);
    if($_POST['fullmarks']<$_POST['passmarks']){
        echo "passmarks is greater than fullmarks";
        ?>  <br>
        <a href="rltupdate.php">BACK</a>
    <?php
    die;
    }
    if($_POST['fullmarks']<$_POST['obt_marks']){
        echo "obt_marks is greater than fullmarks";
        ?>  <br>
            <a href="rltupdate.php">BACK</a>
        <?php
        die;
    }
    if($_POST['percentage']>100){
        echo "Percentage cant be greater than 100";
        ?>  <br>
            <a href="rltupdate.php">BACK</a>
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
    $obj->update("tbl_result",$_POST,"rid",$_GET['rid']);
    header("location:rltdisplay.php");
}
$row = mysqli_fetch_assoc($Result);
  
?>
<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-user"></i>Result Update</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label>Program Name</label>
<select name="roll_no" class="form-control">
<?php foreach($rollno as $rollno):?>
<?php
    if($rollno['roll_no']==$row['roll_no']){
        ?>
    <option selected value="<?php echo $rollno["roll_no"];?>"><?php echo $rollno["roll_no"];?></option>
<?php
    }
    else {
        ?>
<option value="<?php echo $rollno["roll_no"];?>"><?php echo $rollno["roll_no"];?></option>

        <?php
    }
    ?>
}
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label>Batch</label>
<select name="batch" class="form-control">
<?php foreach($batch as $batch):?>
<?php
    if($batch['batch']==$row['batch']){
        ?>
    <option selected value="<?php echo $row['batch'];?>"><?php echo $row["batch"];?></option>
<?php
    }
    else {
        ?>
<option value="<?php echo $batch["batch"];?>"><?php echo $batch["batch"];?></option>

        <?php
    }
    ?>
}
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label>Program Name</label>
<select name="pid" class="form-control" id="programname">
<?php foreach($program as $program):?>
<?php
    if($program['pid']==$row['pid']){
        ?>
    <option selected value="<?php echo $program["pid"];?>"><?php echo $program["proname"];?></option>
<?php
    }
    else {
        ?>
<option value="<?php echo $program["pid"];?>"><?php echo $program["proname"];?></option>

        <?php
    }
    ?>
}
<?php endforeach; ?>
</select>
</div>

<div class="form-group">
<label>SEMESTER</label>
<select name="semid" class="form-control">
<?php foreach($semester as $semester):?>
<?php
    if($semester['semid']==$row['semid']){
        ?>
    <option selected value="<?=$semester["semid"];?>"><?=$semester["semester"];?></option>
<?php
    }
    else {
        ?>
<option value="<?=$semester["semid"];?>"><?=$semester["semester"];?></option>

        <?php
    }
    ?>
}
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label>Name</label>
<select name="sid" class="form-control">
<?php foreach($student as $student):?>
<?php
    if($student['sid']==$row['sid']){
        ?>
    <option selected value="<?=$student["sid"];?>"><?=$student["name"];?></option>
<?php
    }
    else {
        ?>
<option value="<?=$student["sid"];?>"><?=$student["name"];?></option>

        <?php
    }
    ?>
}
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label> Term</label>
<select name="term" class="form-control">
<option selected value="<?=$row['term']?>"><?=$row['term']?></option>
<option>First term</option>
<option>Mid term</option>
<option>Final term</option>

</select>
</div>

<div class="form-group">
<label>Subject</label>
<select name="subid" class="form-control" id="proData">
<?php foreach($subject as $subject):?>
<?php
    if($subject['subid']==$row['subid']){
        ?>
    <option selected value="<?=$subject["subid"];?>"><?=$subject["sname"];?></option>
<?php
    }
    else {
        ?>
<option value="<?=$subject["subid"];?>"><?=$subject["sname"];?></option>

        <?php
    }
    ?>
}
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label for="fullmarks">Full Marks</label>
<input type="number" name="fullmarks" class="form-control" value="<?=$row['fullmarks'];?>">
</div>
<div class="form-group">
<label for="passmarks">Pass Marks</label>
<input type="number" name="passmarks" class="form-control" value="<?=$row['passmarks'];?>">
</div>
<div class="form-group">
<label for=obt_marks>Obtain Marks</label>
<input type="number" name="obt_marks" class="form-control" value="<?=$row['obt_marks'];?>">
</div>
<div class="form-group">
<label for="percentage">Percentage</label>
<input type="number" name="percentage" class="form-control" value="<?=$row['percentage'];?>">
</div>

<div class="form-group">
<label for="grade">Grade</label>
<input type="text" name="grade" class="form-control" value="<?=$row['grade'];?>">
</div>

<div class="form-group" id="submit">
<input type="submit" name="submit" value="Update" class="btn btn-danger">

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

</script>