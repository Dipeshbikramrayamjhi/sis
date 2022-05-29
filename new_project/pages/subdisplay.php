<?php
require_once 'tablejoin.php';
?>
<form method="post" action="">
<div class="col-md-2">
<input type="text" name="search" class="form-control">
<button name="searchsubject_code" value="searchsubject_code" class="btn btn-primary">SEARCH BY SUBJECT</button>
</div>
</form>
<form action="" method="post">
<div class="col-md-12">
<div class="row">
<div class="col-md-3"> 


<select name="pid" class="form-control">
<option selected disabled >CHOOSE Program Name</option>
<?php foreach($program as $program): ?>
<option value="<?=$program['pid'];?>"><?=$program['proname'];?></option>
<?php endforeach ; ?>
</select>
<select name="semid" class="form-control" >
<option selected disabled>CHOOSE semester</option>
<?php foreach($semester as $semester):?>
<option value="<?=$semester['semid'];?>"><?=$semester['semester'];?></option>
<?php endforeach; ?>
</select>
<button name='searchsubject' value="searchsubject" class="btn btn-primary">Search</button>
</div>
</div>
</div>
</form>
<br>
<br>
<h2>Subject Display</h2>

<table class="table table-brodered">
<tr>
<th>S.N</th>
<td>Program Name</td>
<th>Semester</th>
<th>Subject Code</th>
<td>Subject Name</td>
<td>Subject Credit Hour</td>
<th>Delete</th>
<td>Update</td>
<?php


$Result=$obj->Select("tbl_subject join tbl_semester on tbl_semester.semid=tbl_subject.semid
join tlb_program on tlb_program.pid=tbl_subject.pid","*");

if(isset($_POST['searchsubject_code']))
{
    $Result=$obj->Select("tbl_subject join tbl_semester on tbl_semester.semid=tbl_subject.semid
    join tlb_program on tlb_program.pid=tbl_subject.pid where tbl_subject.sub_code LIKE '%".$_POST['search']."%'","*");
} 
if(isset($_POST['searchsubject']))
{   
    $Result=$obj->Select("tbl_subject join tbl_semester on tbl_semester.semid=tbl_subject.semid
    join tlb_program on tlb_program.pid=tbl_subject.pid WHERE  tbl_subject.pid=".$_POST['pid']." AND tbl_subject.semid=".$_POST['semid']."");
   
}
$i = 1;
while($row=mysqli_fetch_assoc($Result)){
echo "<tr>";
echo "<td>".$i++."</td>";
    echo "<td>".$row["proname"]."</td>";
    echo "<td>".$row["semester"]."</td>";
    echo "<td>".$row["sub_code"]."</td>";
    echo "<td>".$row["sname"]."</td>";
    echo "<td>".$row["scredit_hour"]."</td>";
    
    echo "<td class = 'btn btn-danger'><a href='subdlt.php?subid=".$row['subid']."'>DELETE</a></td>";
    echo "<td><a href='subupdate.php?subid=".$row['subid']."'>UPDATE</a></td>";
echo "<tr>";
}
 ?>
</tr>
</table>

