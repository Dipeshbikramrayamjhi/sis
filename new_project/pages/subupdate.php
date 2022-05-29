<?php

require_once 'tablejoin.php';
$Result=$obj->Select("tbl_subject","*","subid",$_GET['subid']);
if(isset($_POST['submit'])){
    array_pop($_POST);
    $obj->update("tbl_subject",$_POST,"subid",$_GET['subid']);
    header("location:subdisplay.php");
}
$row = mysqli_fetch_assoc($Result);
 
?>
<div class="container">
 <div class="row">
 <div class="col-md-5">
 <h2><i class="glyphicon glyphicon-user"></i>Subject Update</h2>
<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label>Program Name</label>
<select name="pid" class="form-control">

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
<label for="sub_code"> subject Code</label>
<input type="text" name="sub_code" class="form-control" value="<?=$row['sub_code']?>">
</div>
<div class="form-group">
<label for="sname"> subject Name</label>
<input type="text" name="sname" class="form-control" value="<?=$row['sname']?>">
</div>
<div class="form-group">
<label for="scredit_hour"> subject Credit hour</label>
<input type="number" name="scredit_hour" class="form-control" value="<?=$row['scredit_hour']?>">
</div>
<div class="form-group">
<button type="submit" name="submit" value="Update" class="btn btn-danger">Update</button>
</div>
</div>
</div>
</form>
