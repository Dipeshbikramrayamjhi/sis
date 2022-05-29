<?php
require_once 'tablejoin.php';
//print_r($_SESSION);
if(isset($_POST['upgrade']) && $_POST['upgrade'] =='upgrade')
{
 
  $result = $obj->Select("tbl_student",'semester','batch',$_POST['batch']);

 
  while($data=mysqli_fetch_assoc($result))
  {
    
    if($data['semester'] == 8){
     
     $_SESSION['semester_error']  = "You can't upgrade semester.";
    
    }else{
      $s= $data['semester']+1;
      $up['semester'] =  $s;
      // $up['batch'] = $_POST['batch'];
      // print_r($up);
    
      $obj->Update('tbl_student', $up,'batch',$_POST['batch']);
    }

  }

}
if(isset($_POST['downgrade']) && $_POST['downgrade'] =='downgrade')
{
 
  $result = $obj->Select("tbl_student",'semester','batch',$_POST['batch']);
  
  while($data=mysqli_fetch_assoc($result))
  {
    
    if($data['semester'] == 1){
     
     $_SESSION['semester_error']  = "You can't downgrade semester.";
    
    }else{
      $s= $data['semester']-1;
      $up['semester'] =  $s;
      // $up['batch'] = $_POST['batch'];
      // print_r($up);
    
      $obj->Update('tbl_student', $up,'batch',$_POST['batch']);
    

    }

  }
  
}
?>
<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-user"></i>UPGRADE</h2>
  <?php if(isset($_SESSION['semester_error'])){
    ?>
  <div class="alert alert-danger">
  <?php 
  echo $_SESSION['semester_error'];
  unset($_SESSION['semester_error']);
  ?></div>
    <?php
  } ?>

  <form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label>Batch</label>
<select name="batch" class="form-control" id="list">
<option selected disabled >CHOOSE</option>
<?php $student= $obj->Select('tbl_student group by batch',"*");?>
<?php foreach($student as $student):?>
<option value="<?=$student['batch'];?>"><?=$student['batch'];?></option>
<?php endforeach; ?>
</select>
</div>
<div class="col-md-12">
<div class="col-md-5">
<div class="form-group">
<button type="submit" name="upgrade" value="upgrade" class="btn btn-primary" >upgrade</button>
</div>
</div>
<div class="col-md-5">
<div class="form-group">
<button type="submit" name="downgrade" value="downgrade" class="btn btn-danger" >downgrade</button>
</div>
</div>
</div>
</div>
</div>
 </div>
</div>
</form>
<div id="student" >

</div>

<script>
setTimeout(function(){
  $('.alert').hide('slow');
},3000)

$(document).ready(function(){
    $('#list').on('change',function(){
        var batch = $(this).val();
       // alert(name);
        var batchset = {batch:batch}
        $.ajax({
            type : 'POST',
            url : 'ajax.php?action=showstudent',
            data : batchset,
            success : function(response){
               // alert(response);
               $('#student').html(response);
            }
        })
    })
})

</script>

