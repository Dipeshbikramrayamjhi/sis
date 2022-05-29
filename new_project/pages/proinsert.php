<?php


if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    array_pop($_POST);
    $obj->Insert("tlb_program",$_POST);
}
?>


<div class="container">
 <div class="row">
 <div class="col-md-5">
  
  <h2><i class="glyphicon glyphicon-user"></i>Program Insert</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label for="proname"> Program Name</label>
<input type="text" name="proname" class="form-control">
</div>
<div class="form-group">
<label for="duration">Duration</label>
<input type="text" name="duration" class="form-control">
</div>
<div class="form-group">
<label for="total_credit">Total Credit</label>
<input type="number" name="total_credit" class="form-control">
</div>
<div class="form-group">
<button type="submit" name="submit" value="submit" class="btn btn-primary">submit</button>

</div>
</div>
 </div>
</div>
</form>
