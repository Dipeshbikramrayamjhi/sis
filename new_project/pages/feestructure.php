<?php
require_once "tablejoin.php";
if(isset($_POST['submit']) && $_POST['submit'] =='submit')
 {
    unset($_POST['submit']);
   $obj->Insert('fee_structure',$_POST);
}

?>

<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-user"></i>Insert Structure Fee</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label for="feetype">FEE TYPE</label>
<select name='feetype' class="form-control" id="feetype" >
<option selected disabled>CHOOSE FEE TYPE</option>
<option value="admission">ADMISSION</option>
<option value="semester">SEMESTER</option>
</select>
</div>
<div id="semester">


</div>
<div class="form-group">
<label for="amount">AMOUNT</label>
<input type="number" name="amount" class="form-control">
</div>
<div class="form-group">
<label for="bid">Batch</label>
<select name="bid" class="form-control" id="rollno">
<option selected disabled >CHOOSE</option>
<?php foreach($fbatch as $fbatch): ?>
<option value="<?=$fbatch['bid'];?>"><?=$fbatch['batch'].'  '.$fbatch['proname'];?></option>
<?php endforeach ; ?>
</select>
</div>
<div class="form-group">
<button type="submit" name="submit" value="submit" class="btn btn-primary">submit</button>
</div>

</div>
 </div>
</div>
</form>
<script>
$(document).ready(function(){
    $('#feetype').on('change',function(){
        var feetype = $(this).val();
        if(feetype=='semester'){
           let Html=`<div class="form-group">
<label for="semester">SEMESTER</label>
<select name='semester' class="form-control required"  >
<option selected disabled>CHOOSE SEMESTER</option>
<option >1</option>
<option >2</option>
<option>3</option>
<option >4</option>
<option >5</option>
<option >6</option>
<option>7</option>
<option>8</option>
</select>
</div>`;
                    $('#semester').html(Html);

        }else{
            $('#semester').html('');
        }
       
    })
})

</script>
