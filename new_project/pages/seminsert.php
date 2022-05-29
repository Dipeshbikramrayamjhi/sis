<?php


if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    array_pop($_POST);
    $obj->Insert("tbl_semester",$_POST);
}
?>


<div class="container">
 <div class="row">
 <div class="col-md-5">
  
  <h2><i class="glyphicon glyphicon-user"></i>Semester Insert</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label for="semname">Semester</label>
<input type="number" name="semester" class="form-control">
</div>
<div class="form-group">
<button type="submit" name="submit" value="submit"  class="btn btn-primary">submit</button>

</div>

</div>


 </div>
</div>
</form>
<?php
