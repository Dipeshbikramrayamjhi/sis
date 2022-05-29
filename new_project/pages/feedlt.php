<?php
$obj->delete("tbl_fee","fid",$_GET['fid']);
header("location:feedisplay.php");
?>
