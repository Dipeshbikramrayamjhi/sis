<?php

require_once "tablejoin.php";

?>


<div class="container">
 <div class="row">
  <div class="col-md-5">
  <h2><i class="glyphicon glyphicon-user"></i>Insert Structure Fee</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data">
<div class="form-group">
<label for="Roll_no">Roll_no</label>
<select name="roll_no" class="form-control" id="rollno">
<option selected disabled >CHOOSE</option>
<?php foreach($student as $student): ?>
<option value="<?=$student['roll_no'];?>"><?=$student['roll_no'];?></option>
<?php endforeach ; ?>
</select>
</div>

<div class="form-group">
<label>Name</label>
<select name="sid" class="form-control" id='name'>
<option selected disabled >SELECT ROLLNO</option>
</select>
</div>
<div class="form-group">
<label for="batch">Batch</label>
<select name="batch" class="form-control" id='batch'>
<option selected disabled >SELECT ROLLNO</option>
</select>
</div>
<div class="form-group">
<label>Program Name</label>
<select name="pid" class="form-control" id="programname">
<option selected disabled >SELECT ROLLNO</option>
</select>
</div>
<div class="form-group">
<label for="feetype">FEE TYPE</label>
<select name='feetype' class="form-control"  >
<option selected disabled>CHOOSE FEE TYPE</option>
<option value="admission">ADMISSION</option>
<option value="semester">SEMESTER</option>
</select>
</div>
<div class="form-group">
<label for="semester">SEMESTER</label>
<select name='semester' class="form-control"  >
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
</div>

<div class="form-group">
<label for="admission_fee">ADMISSION FEE</label>
<select name="feetype" class="form-control" id="admissiontotal">
<option selected disabled >SELECT ROLLNO</option>
</select>
</div>
<div class="form-group">
<label for="paid_adm_fee">PAY ADMISSION FEE</label>
<input type="number" name="paid_adm_fee" class="form-control">
</div>
<div class="form-group">
<label for="remain_adm_fee">REMAINING ADMISSION FEE</label>
<select name="remain_adm_fee" class="form-control" id="admissionremaining">
<option selected disabled >SELECT ROLLNO</option>
</select>

</div>
<div class="form-group">
<label for="date">DATE</label>
<input type="date" id="date" name="date" class="form-control" value="<?= date('Y-m-d')?>">
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
    $('#rollno').on('change',function(){
        var name = $(this).val();
       // alert(name);
        var nameset = {name:name}
        $.ajax({
            type : 'POST',
            url : 'ajax.php?action=changename',
            data : nameset,
            success : function(response){
                //alert(response);
               $('#name').html(response);
            }
        })
    })
})
//  $(document).ready(function(){
//     $('#rollno').on('change',function(){
//         var batch = $(this).val();
//        // alert(name);
//         var batchset = {batch:batch}
//         $.ajax({
//             type : 'POST',
//             url : 'ajax.php?action=changebatch',
//             data : batchset,
//             success : function(response){
//                 //alert(response);
//                $('#batch').html(response);
//             }
//         })
//     })
// })


$(document).ready(function(){
    $('#rollno').on('change',function(){
        var programname = $(this).val();
       // alert(name);
        var pronameset = {programname:programname}
        $.ajax({
            type : 'POST',
            url : 'ajax.php?action=changefeeprogram',
            data : pronameset,
            success : function(response){
                //alert(response);
               $('#programname').html(response);
            }
        })
    })
})
$(document).ready(function(){
    $('#batch').on('change',function(){
        var admissiont = $(this).val();
       //alert(admissiont);
        var adtset = {admissiont:admissiont}
        $.ajax({
            type : 'POST',
            url : 'ajax.php?action=changeadmissiontotal',
            data : adtset,
            success : function(response){
                alert(response);
               $('#admissiontotal').html(response);
            }
        })
    })
})
$(document).ready(function(){
    $('#rollno').on('change',function(){
        var admissionr = $(this).val();
       // alert(name);
        var adtset = {admissionr:admissionr}
        $.ajax({
            type : 'POST',
            url : 'ajax.php?action=changeadmissionremaining',
            data : adtset,
            success : function(response){
                //alert(response);
               $('#admissionremaining').html(response);
            }
        })
    })
})
</script>