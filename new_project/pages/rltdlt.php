<?php

$obj->delete("tbl_result","rid",$_GET['rid']);
header("location:rltdisplay.php");
?>
