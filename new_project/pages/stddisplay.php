<?php

if(isset($_POST['search']) && $_POST['search']="search"){
  $searchKeyword=$_POST['searchKeyword'];
  $searchData=$obj->Select("tbl_student join tbl_semester on tbl_semester.semid=tbl_student.semester
  join tlb_program on tlb_program.pid = tbl_student.pid WHERE tbl_student.name LIKE '%".$searchKeyword."%'","*");
//  echo "<script>window.location.href='stddisplay.php?search=1'</script>";
}
// if(isset($_POST['searchsem'])) // semester search gareko hai
// {
//   $searchsem=$_POST['searchsemester'];
//   $searchsemester=$obj->select("tbl_student join tbl_semester on tbl_semester.semid=tbl_student.semester
//   join tlb_program on tlb_program.pid = tbl_student.pid WHERE tbl_semester.semester LIKE '%".$searchsem."%'","*");
// }

//print_r($_GET) ;


?>
<form action="stddisplay.php?search=1" method="post">
  <div class="col-md-12">
  <div class="col-md-3">
    <div class="row">
      <input type="text" name="searchKeyword" id="" class="form-control" placeholder="SEARCH BY NAME">
      <button type="submit" name="search" class="btn btn-primary" value="search">Search By Name</button>
    </div>
  </div>
  <!-- <div class="col-sm-3">
    <div class="row">
      <input type="text" name="searchsemester" id="" class="form-control">
      <button type="submit" name="searchsem" class="btn btn-primary" value="searchsem">Search by Semester</button>
    </div> -->
  </div>
  </div>
</form>

<form action="stddisplay.php?success" method="post">
<div class="col-md-12">
<div class="row">
<div class="col-md-3"> 
<?php
require_once 'tablejoin.php';
?>

<select name="batch" class="form-control" id="batch">
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

<select name="semester" class="form-control">
<option selected disabled >CHOOSE Semester</option>
<?php foreach($semester as $semester): ?>
<option value="<?=$semester['semester'];?>"><?=$semester['semester'];?></option>
<?php endforeach ; ?>
</select>
<button name='agree' value="agree" class="btn btn-primary">Agree</button>
</div>
</div>
</div>
</form>
<br>
<br>
<br>


<h2>Student Details</h2>
<table class="table table-bordered">
<tr>
<th>S.N</th>
<td>photo</td>
<td>Rollno<a href="stddisplay.php?sort=roll_no&ascdesc=ASC">A </a><a href="stddisplay.php?sort=roll_no&ascdesc=DESC">D</a></td>
<th>name<a href="stddisplay.php?sort=name&ascdesc=ASC">A </a><a href="stddisplay.php?sort=name&ascdesc=DESC">D</a></th>
<td>Batch</td>
<td>Address</td>
<th>Email</th>
<td>phone</td>
<th>Guadrain_name</th>
<td>guadrain_number</td>
<th>semester<a href="stddisplay.php?sort=semid&ascdesc=ASC">A </a><a href="stddisplay.php?sort=semid&ascdesc=DESC">D</a></th>
<th>proname<a href="stddisplay.php?sort=proname&ascdesc=ASC">A </a><a href="stddisplay.php?sort=proname&ascdesc=DESC">D</a></th>
<th>Delete</th>
<td>Update</td>
<?php

$Result=$obj->Select("tbl_student join tbl_semester on tbl_semester.semid=tbl_student.semester 
join tlb_program on tlb_program.pid = tbl_student.pid","*");
if(isset($_GET['search']) && $_GET['search']==1 && isset($_POST['search'])){
  $Result=$searchData;
}
// if(isset($_GET['search']) && isset($_POST['searchsem'])){
//   $Result=$searchsemester;
// }
if(isset($_POST['agree']) )
{
  
  $Result=$obj->Select("tbl_student  join tlb_program on tlb_program.pid=tbl_student.pid join tbl_semester on tbl_semester.semid=tbl_student.semester WHERE batch=".$_POST['batch']." AND tbl_student.pid=".$_POST['pid']." AND tbl_semester.semester=".$_POST['semester'].""
   );
  //  tbl_student  join tbl_semester on tbl_semester.semid=tbl_student.semester
    // join tlb_program on tlb_program.pid = tbl_student.pid WHERE proname=".$_POST['proname']." AND semester =".$_POST['semester'].
}

if(isset($_GET['sort'])) // name sort gareko 
{
    $name=$obj->Select("tbl_student  join tbl_semester on tbl_semester.semid=tbl_student.semester
    join tlb_program on tlb_program.pid = tbl_student.pid order by ".$_GET['sort']." ".$_GET['ascdesc']);
}
if(isset($_GET['sort']))
{
  $Result=$name;
}
$num_row = mysqli_num_rows($Result);

if ($num_row > 0)
{$i = 1;
while($row=mysqli_fetch_assoc($Result)){
echo "<tr>";
echo "<td>".$i++."</td>";
if(!empty($row["photo"])){//photo xa ki nai vanna lai
    echo "<td><img src='photo/".$row["photo"]."'width='50' height='50'/></td>";
    }
    else
    {
        echo '<td>no image</td>';
    }
    echo "<td>".$row["roll_no"]."</td>";
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["batch"]."</td>";
    echo "<td>".$row["address"]."</td>";
    echo "<td>".$row["email"]."</td>";
    echo "<td>".$row["phone"]."</td>";
    echo "<td>".$row["guardian_name"]."</td>";
    echo "<td>".$row["guardian_number"]."</td>";
    echo "<td>".$row["semester"]."</td>";
    echo "<td>".$row["proname"]."</td>";
    echo "<td class='btn btn-danger' onclick='conf()'><a href='stddisplay.php?DELETE=DELETE&sid=".$row['sid']."'>DELETE</a></td>";
    echo "<td ><a href='stdupdate.php?sid=".$row['sid']."'>UPDATE</a></td>";
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
<script>
  function conf()
  {
    var okey = confirm("do you really want to delete");
    if (okey != "")
    {
      <?php
  if(isset($_GET['DELETE']) && $_GET['DELETE'] =="DELETE")//delete gareko 
  {
  
   
    $obj->delete("tbl_student","sid",$_GET['sid']);
  }
      ?>
    }
  }
</script>