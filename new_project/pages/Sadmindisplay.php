<h2>Student Registration Detail </h2>

<table class="table table-bordered">
<tr>
<th>S.N</th>
<td>Name</td>
<th>Rollno</th>
<td>Email</td>
<th>Password</th>
<!-- <th>Delete</th>
<td>Update</td> -->
<?php

$i = 1;
$Result=$obj->Select("tlb_login join tbl_student on tbl_student.sid = tlb_login.sid","*");
while($row=mysqli_fetch_assoc($Result)){
    $password = $row['password'];
echo "<tr>";
echo "<td>".$i++."</td>";
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["roll_no"]."</td>";
    echo "<td>".$row["email"]."</td>";
    echo "<td>".md5( $password)."</td>";
    
    // echo "<td class='btn btn-danger'><a href='prodlt.php?pid=".$row['pid']."'>DELETE</a></td>";
    // echo "<td><a href='proupdate.php?pid=".$row['pid']."'>UPDATE</a></td>";
echo "<tr>";
}
 ?>
</tr>
</table>