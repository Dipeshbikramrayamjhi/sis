<?php

$obj->delete("tbl_program","pid",$_GET['pid']);
header("location:prodisplay.php");
?>
