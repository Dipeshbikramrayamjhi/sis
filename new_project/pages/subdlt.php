<?php
$obj->delete("tbl_subject","subid",$_GET['subid']);
 header("location:subdisplay.php");
?>
