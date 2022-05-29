
<h2>Program Details</h2>

<table class="table table-bordered">
<tr>
<th>S.N</th>
<td>Program Name</td>
<th>Duration</th>
<td>Total Credit</td>
<th>Delete</th>
<td>Update</td>
<?php

$i = 1;
$Result=$obj->Select("tlb_program","*");
while($row=mysqli_fetch_assoc($Result)){
echo "<tr>";
echo "<td>".$i++."</td>";
    echo "<td>".$row["proname"]."</td>";
    echo "<td>".$row["duration"]."</td>";
    echo "<td>".$row["total_credit"]."</td>";
    
    echo "<td class='btn btn-danger'><a href='prodlt.php?pid=".$row['pid']."'>DELETE</a></td>";
    echo "<td><a href='proupdate.php?pid=".$row['pid']."'>UPDATE</a></td>";
echo "<tr>";
}
 ?>
</tr>
</table>
 