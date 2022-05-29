<?php
 include "tablejoin.php";
if(isset($_POST['submit'])=='submit')
{
    
    unset($_POST['submit']);
    unset($_POST['repassword']);
    $_POST['password'] = md5($_POST['password']);
    $obj->Insert("tlb_login",$_POST);
}

?>




<script>
 function f()
 {
  var val = document.getElementById('email').value;
            if (val == '' | null) {
                document.getElementById('emailError').innerHTML = 'Email is required!';
                return false;
            } else {
                document.getElementById('emailError').innerHTML = '';
            }

  var password = document.getElementById('password').value;
            if (password == '' | null) {
                document.getElementById('passwordError').innerHTML = 'Password is required!';
                return false;
            } else {
                document.getElementById('passwordError').innerHTML = '';
            }
  var repassword =  document.getElementById('repassword').value;
  var password = document.getElementById('password').value;
            if (repassword == '' | null) {
                document.getElementById('repasswordError').innerHTML = 'Password is required!';
                return false;
            } else {
                document.getElementById('repasswordError').innerHTML = '';
            }
            if  (repassword != password)
            {
              document.getElementById('repasswordError').innerHTML = 'Password is Mismatch!';
                return false;
            }
            else {
                document.getElementById('repasswordError').innerHTML = '';
            }

            var password = document.getElementById('rollno').value;
            if (password == '' | null) {
                document.getElementById('rollnoError').innerHTML = 'Flied is required!';
                return false;
            } else {
                document.getElementById('rollnoError').innerHTML = '';
            }

            var password = document.getElementById('rid').value;
            if (password == '' | null) {
                document.getElementById('resultError').innerHTML = 'Flied is required!';
                return false;
            } else {
                document.getElementById('resultError').innerHTML = '';
            }

 } 
 </script>
<div class="container">
 <div class="row">
 <div class="col-md-5">
  
  <h2><i class="glyphicon glyphicon-user"></i>Create Student  Id</h2>

<form action="" method="post" class="form-group" enctype="multipart/form-data" onsubmit="return f()">
<div class="form-group">
<label for="semname">Email</label>
<input type="email" name="email" id="email" class="form-control">
<a style="color:red;" id="emailError"></a>
</div>
<div class="form-group">
<label for="semname">Password</label>
<input type="password" name="password" id="password" class="form-control">
<a style="color:red;" id="passwordError"></a>
</div>
<div class="form-group">
<label for="semname">Re-Password</label>
<input type="password" name="repassword" id="repassword" class="form-control">
<a style="color:red;" id="repasswordError"></a>
</div>
<div class="form-group">
<label for="roll no">Roll_no</label>
<select name="sid" class="form-control" id="rollno">
<option selected disabled >CHOOSE</option>
<?php foreach($student as $student): ?>
<option value="<?=$student['sid'];?>"><?=$student['roll_no'];?>.  .<?=$student['name'];?>
</option>
<?php endforeach ; ?>
</select>
<a style="color:red;" id="rollnoError"></a>
</div>

<div class="form-group">
<label for="rid">Result Id</label>
<select name="rid" class="form-control" id="rid">
<option selected disabled >CHOOSE</option>
<?php
$result = $obj->Select("tbl_result join tbl_student on tbl_result.sid = tbl_student.sid group by tbl_student.name","*");
 foreach($result as $result): ?>
<option value="<?=$result['rid'];?>"><?=$result['name'];?></option>
<?php endforeach ; ?>
<a style="color:red;" id="resultError"></a>
</select>
</div>

<div class="form-group">
<button type="submit" name="submit" value="submit"  class="btn btn-primary">Register</button>

</div>

</div>


 </div>
</div>
</form>