<?php
require_once 'tablejoin.php';
$Result=$obj->Select("tbl_student","*","sid",$_GET['sid']);
if(isset($_POST['submit'])){
    if(isset($_FILES['photo']['name'])){
        $filename=$_FILES['photo']['name'];
        $path='photo/';
        $tempname=$_FILES['photo']['tmp_name'];
        move_uploaded_file($tempname,$path.$filename);
        $_POST['photo']=$filename;
    }
    unset($_POST['submit']);
    $obj->update("tbl_student",$_POST,"sid",$_GET['sid']);
    // die();
     header('Location:stddisplay.php');

}
$row = mysqli_fetch_assoc($Result);
?>


<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-user"></i>Student update</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label for="photo">Photo</label>
<?php
if(!empty($row['photo']))
{
    ?>
    <img src="photo/<?= $row['photo'];?>" width="50" height="50">
<?php
}
?>
<label>photo</label>
<input type="file" name="photo" value="" >


<br>

</div>
<div class="form-group">
<label for="name">Roll no</label>
<input type="text" name="roll_no" class="form-control" value="<?=$row['roll_no'];?>">
</div>
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" class="form-control" value="<?=$row['name']?>">
</div>
<div class="form-group">
<label for="batch">Batch</label>
<input type="number" name="batch" class="form-control" value="<?=$row['batch']?>" >
</div>

<div class="form-group">
<label for=address>Address</label>
<input type="address" name="address" class="form-control" value="<?=$row['address']?>" >
</div>
<div class="form-group">
<label for=email>Email</label>
<input type="email" name="email" class="form-control" value="<?=$row['email']?>">
</div>
<div class="form-group">
<label for="phone">Phone</label>
<input type="phone" name="phone" class="form-control" value="<?=$row['phone']?>">
</div>
<div class="form-group">
<label for="guardian_name">Guardian Name</label>
<input type="text" name="guardian_name" class="form-control" value="<?=$row['guardian_name']?>">
</div>
<div class="form-group">
<label for="guardian_number">Guardian_Number</label>
<input type="phone" name="guardian_number" class="form-control" value="<?=$row['guardian_number']?>">
</div>
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
<select name="semester" class="form-control">
<?php foreach($semester as $semester):?>
<?php
    if($semester['semester']==$row['semester']){
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
<button type="submit" name="submit" value="submit" class="btn btn-danger">Update</button>


</div>

</div>
 </div>
</div>
</form>


