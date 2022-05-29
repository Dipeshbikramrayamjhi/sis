<?php
require_once "tablejoin.php";

if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    array_pop($_POST);
     //print_r($_POST);
    
    $pro=$obj->Select('tlb_program',"*",'pid',$_POST['pid']);
    $row=mysqli_fetch_assoc($pro);
    // print_r($row);
    // die;
    
    $_POST['roll_no']=$row['proname'].'-'.$_POST['batch'].'-'.$_POST['roll_no'];
    
  
    $filename=$_FILES['photo']['name'];
    $path='photo/';
    $tempname=$_FILES['photo']['tmp_name'];
    move_uploaded_file($tempname,$path.$filename);
    $_POST['photo']=$filename;
    $obj->Insert("tbl_student",$_POST);
}

?>
<div class="container">
 <div class="row">
  <div class="col-md-12">
  <h2><i class="glyphicon glyphicon-user"></i>Student Insert</h2>
  </div>
<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label for="photo">Photo</label>
<input type="file" name="photo" id="photo">
</div>
<div class='row'>
<div class="col-md-6">
<div class="form-group">
<label for="rollno">Roll no</label>
<input type="number" name="roll_no" class="form-control" >
</div>
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" class="form-control" >
</div>
<div class="form-group">
<label>Batch</label>
<select name="batch" class="form-control">
<option selected disabled >CHOOSE</option>
<?php foreach($batch as $batch):?>
<option value="<?=$batch['batch'];?>"><?=$batch['batch'];?></option>
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label for=address>Address</label>
<input type="address" name="address" class="form-control" >
</div>
<div class="form-group">
<label for=email>Email</label>
<input type="email" name="email" class="form-control">
</div>
<div class="form-group">
<label for="phone">Phone</label>
<input type="phone" name="phone" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="gender">Gender</label><br>
<input type="radio" name="gender" value="male">
<label for="male">Male</label>
<input type="radio" name="gender" value="female">
<label for="female">Female</label>
<input type="radio" name="gender" value="others">
<label for="others">others</label>
</div>
<div class="form-group">
<label for="guardian_name">Guardian Name</label>
<input type="text" name="guardian_name" class="form-control">
</div>
<div class="form-group">
<label for="guardian_number">Guardian_Number</label>
<input type="phone" name="guardian_number" class="form-control">
</div>
<div class="form-group">
<label>Program Name</label>
<select name="pid" class="form-control">
<option selected disabled >CHOOSE</option>
<?php foreach($program as $program):?>
<option value="<?=$program['pid'];?>"><?=$program['proname'];?></option>
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label>SEMESTER</label>
<select name="semester" class="form-control">
<option selected disabled>CHOOSE</option>
<?php foreach($semester as $semester):?>
<option value="<?=$semester['semid'];?>"><?=$semester['semester'];?></option>
<?php endforeach ;?>
</select>
</div>
<div class="form-group">
<button type="submit" name="submit" value="submit" class="btn btn-primary" >submit</button>
</div>
</div>
 </div>
</div>
</form>
