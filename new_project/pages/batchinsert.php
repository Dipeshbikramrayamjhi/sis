<?php
if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
    array_pop($_POST);
    $obj->Insert("tbl_batch",$_POST);
}
?>

<div class='col-md-12'>
<div class="container">
 <div class="row">
   
 <div class="col-md-5">
  
  <h2><i class="glyphicon glyphicon-user"></i>Batch Insert</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label for="batch">Batch</label>
<input type="number" name="batch" class="form-control">
</div>
<div class="form-group">
<button type="submit" name="submit" value="submit" class="btn btn-primary">submit</button>
</div>

</div>
</form>
<div class="col-md-5">
  
<form method="post">
  <button class="btn btn-primary" name="showbatch" value="showbatch">SHOW ALL BATCHES</button>
  </form>
<?php
  if(isset($_POST['showbatch']) == 'showbatch')
{
  $result = $obj->Select('tbl_batch','*');
  
  ?>
  <h2> Batch Display </h2>
<table class="table table-striped table-dark">
<tr>
  <td>Batch</td>

<?php
while($row =mysqli_fetch_assoc($result))
  {
    echo "<tr>";
    echo "<td>".$row['batch']."</td>";
    echo "</tr>";
    
  }
  echo "</tr>";
  echo'</table>';
}

?>
</div>
</div>
</div>



