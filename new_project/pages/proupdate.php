<?php
require_once 'tablejoin.php';
$Result=$obj->Select("tlb_program","*","pid",$_GET['pid']);
if(isset($_POST['submit'])){
    array_pop($_POST);
    $obj->update("tlb_program",$_POST,"pid",$_GET['pid']);
    header("location:prodisplay.php"); 
}
$row = mysqli_fetch_assoc($Result);
 
?>
<div class="container">
 <div class="row">
 <div class="col-md-5">
  
  <h2><i class="glyphicon glyphicon-user"></i>Program Insert</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label for="proname"> Program Name</label>
<input type="text" name="proname" class="form-control" value="<?=$row['proname'];?>">
</div>
<div class="form-group">
<label for="duration">Duration</label>
<input type="text" name="duration" class="form-control" value="<?=$row['duration'];?>">
</div>
<div class="form-group">
<label for="total_credit">Total Credit</label>
<input type="number" name="total_credit" class="form-control" value="<?=$row['total_credit'];?>">
</div>
<div class="form-group">
<button type="submit" name="submit" value="submit" class="btn btn-danger">Update</button>

</div>
</div>
 </div>
</div>
</form>