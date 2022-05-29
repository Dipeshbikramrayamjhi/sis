

<h2>Fee Details</h2>

<table class="table table-bordered">
<tr>
<th>S.N</th>
<td>ROLL NO</td>
<th>NAME</th>
<td>BATCH</td>
<td>FEE TYPE</td>
<td>Amount </td>
<td>PAYING</td>
<th>DATE</th>
<th >Delete</th>
<td >Update</td>
<?php
$i = 1;
$Result=$obj->Select("fee_installment join tbl_student on tbl_student.sid = fee_installment.sid join fee_structure on fee_structure.fid = fee_installment.fid","*");
while($row=mysqli_fetch_assoc($Result)){
echo "<tr>";
    echo "<td>".$i++."</td>";
    echo "<td>".$row['roll_no']."</td>";
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row['batch']."</td>";
    echo "<td>".$row['feetype']."</td>";
    echo "<td>".$row['amount']."</td>";
    echo "<td>".$row["paying"]."</td>";
    echo "<td>".$row['date']."</td>";
    
    echo "<td class='danger'><a href='feedlt.php?fid=".$row['fid']."'>DELETE</a></td>";
    echo "<td class='primary'><a href='feeupdate.php?fid=".$row['fid']."'>UPDATE</a></td>";
echo "<tr>";
}
 ?>
</tr>
 
