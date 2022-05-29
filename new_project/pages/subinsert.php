<?php

require_once "tablejoin.php";
if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    array_pop($_POST);
    $obj->Insert("tbl_subject",$_POST);
}
?>


<div class="container">
 <div class="row">
 <div class="col-md-5">
  
  <h2><i class="glyphicon glyphicon-user"></i>Subject Insert</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">

<div class="form-group">
<label>Program Name</label>
<select name="pid" class="form-control">
<option selected disabled >CHOOSE</option>
<?php foreach($program as $program): ?>
<option value="<?=$program['pid']?>"><?=$program['proname'];?></option>
<?php endforeach ;?>
</select>
</div>
<div class="form-group">
<label>SEMESTER</label>
<select name="semid" class="form-control">
<option selected disabled>CHOOSE</option>
<?php foreach($semester as $semester): ?>
<option value="<?=$semester['semid'];?>"><?=$semester['semester'];?></option>
<?php endforeach ;?>
</select>
</div>
<div class="form-group">
<label for="sub_code"> subject Code</label>
<input type="text" name="sub_code" class="form-control">
</div>
<div class="form-group">
<label for="sname"> subject Name</label>
<input type="text" name="sname" class="form-control">
</div>
<div class="form-group">
<label for="scredit_hour"> subject Credit hour</label>
<input type="number" name="scredit_hour" class="form-control">
</div>
<div class="form-group">
<button type="submit" name="submit" value="submit" class="btn btn-primary">submit</button>
</div>
</div>
</div>
</form>
