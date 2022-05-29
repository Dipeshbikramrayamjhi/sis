<?php

$student =$obj->select("tbl_student","*");
$program = $obj->Select("tlb_program","*");
$semester = $obj->Select("tbl_semester","*");
$name = $obj->Select("tbl_student","*");
$subject = $obj->Select("tbl_subject","*");
$fee= $obj->Select("tbl_fee","*");
$result = $obj->select("tbl_result","*");
$batch= $obj->select("tbl_batch","*");

$rollno=$obj->select("tbl_student","*");
$batchgrp=$obj->Select("tbl_result group by batch","*");
$s = $obj->Select("tbl_semester","*");
$rollnogrp=$obj->Select("tbl_fee group by roll_no","*");
$fbatch=$obj->select("batch_tbl join tlb_program on tlb_program.pid = batch_tbl.pid","*");
$fees= $obj->Select("fee_structure join batch_tbl on batch_tbl.bid=fee_structure.bid join tlb_program on tlb_program.pid = batch_tbl.pid","*");

?>