<?php
require 'tablejoin.php';
?>
<form method="post" action="">
<div class="col-md-2">
<input type="text" name="search" class="form-control" required>
<button name="searchrollno" value="searchrollno" class="btn btn-primary">SEARCH BY ROLLNO</button>
</div>
</form>
<form action="rltdisplay.php" method="post">
<div class="col-md-12">
<div class="row">
<div class="col-md-3"> 
<select name="batch" class="form-control">
<option selected disabled>CHOOSE Batch</option>
<?php foreach($batch as $batch):?>
<option value="<?=$batch['batch'];?>"><?=$batch['batch'];?></option>
<?php endforeach; ?>
</select>

<select name="pid" class="form-control">
<option selected disabled >CHOOSE Program Name</option>
<?php foreach($program as $program): ?>
<option value="<?=$program['pid'];?>"><?=$program['proname'];?></option>
<?php endforeach ; ?>
</select>

<select name="semid" class="form-control">
<option selected disabled >CHOOSE Semester</option>
<?php foreach($semester as $semester): ?>
<option value="<?=$semester['semid'];?>"><?=$semester['semester'];?></option>
<?php endforeach ; ?>
</select>
<button name='agree' value="agree" class="btn btn-primary">Search</button>
</div>
<div class="col-md-3"> 
<select name="roll_no" class="form-control" id="rollno">
<option selected disabled>CHOOSE SEMESTER</option>
<?php foreach($student as $student): ?>
<option value="<?=$student['roll_no'];?>"><?=$student['roll_no'];?></option>
<?php endforeach ; ?>
</select>

<select name="semid" class="form-control">
<option selected disabled>CHOOSE SEMESTER</option>
<?php foreach($s as $s): ?>
<option value="<?=$s['semid'];?>"><?=$s['semester'];?></option>
<?php endforeach ; ?>
</select>

<select name="term" class="form-control">
<option selected disabled >CHOOSE TERM</option>
<option>First term</option>
<option>Mid term</option>
<option>Final term</option>
</select>
<button name='find' value="find" class="btn btn-primary">Search</button>
</div>
</div>
</div>
</form>
<br>
<h2>Result Details</h2>

<table class="table table-brodered">
<tr>
<th>S.N</th>
<th>Roll_no</th>
<th>Batch</th>
<td>Program</td>
<th>Semester</th>
<td>Name</td>
<th>Term</th>
<td>Subject</td>
<th>Full Marks</th>
<td>Pass Marks</td>
<th>Obtained Marks</th>
<td>Percentage</td>
<th>Grade</th>
<th>Result</th>
<td>Delete</td>
<th>Update</th>
<?php
$Result=$obj->Select("tbl_result join tbl_student on tbl_student.sid=tbl_result.sid join tlb_program on 
tlb_program.pid= tbl_result.pid join tbl_subject on tbl_subject.subid=tbl_result.subid","*");

if(isset($_POST['agree']))
{   
    $Result=$obj->Select("tbl_result join tbl_student on tbl_student.sid=tbl_result.sid join tlb_program on 
    tlb_program.pid= tbl_result.pid join tbl_subject on tbl_subject.subid=tbl_result.subid WHERE tbl_student.batch=".$_POST['batch']." AND tbl_result.pid=".$_POST['pid']." AND tbl_result.semid=".$_POST['semid']."");
   
}
if(isset($_POST['find']))
{   
    $Result=$obj->Select("tbl_result join tbl_subject on tbl_subject.subid=tbl_result.subid join tlb_program on tlb_program.pid=tbl_result.pid
    join tbl_student on tbl_student.sid=tbl_result.sid join tbl_semester on tbl_semester.semid=tbl_result.semid  WHERE tbl_student.roll_no='".$_POST['roll_no']."'  AND tbl_result.semid=".$_POST['semid']." AND term='".$_POST['term']."'");
   
}
if(isset($_POST['searchrollno']))
{
    $Result=$obj->Select("tbl_result join tbl_subject on tbl_subject.subid=tbl_result.subid join tlb_program on tlb_program.pid=tbl_result.pid
    join tbl_student on tbl_student.sid=tbl_result.sid join tbl_semester on tbl_semester.semid=tbl_result.semid
    WHERE tbl_result.roll_no LIKE '%".$_POST['search']."%'","*");
}   
$num_row = mysqli_num_rows($Result);
// print_r($num_row);
$i = 1;
if ($num_row > 0)
{

while($row=mysqli_fetch_assoc($Result)){
//   echo"<pre>";
//  print_r($row);
//  echo"</pre>";


echo "<tr>";
echo "<td>".$i++."</td>";
    echo "<td>".$row["roll_no"]."</td>";
    echo "<td>".$row["batch"]."</td>";
    echo "<td>".$row["proname"]."</td>";
    echo "<td>".$row["semid"]."</td>";
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["term"]."</td>";
    echo "<td>".$row["sname"]."</td>";
    echo "<td>".$row["fullmarks"]."</td>";
    echo "<td>".$row["passmarks"]."</td>";
    echo "<td>".$row["obt_marks"]."</td>";
    echo "<td>".$row["percentage"]."</td>";
    echo "<td>".$row["grade"]."</td>";
    echo "<td>".$row["result"]."</td>";
    echo "<td class='btn btn-danger'><a href='rltdlt.php?rid=".$row['rid']."'>DELETE</a></td>";
    echo "<td><a href='rltupdate.php?rid=".$row['rid']."'>UPDATE</a></td>";
echo "<tr>";
}
 ?>
</tr>
</table>
<?php
}
else
{
?>
<p><a class="btn btn-danger">NO DATA TO SHOW</a></p>
<?php
}
?>
