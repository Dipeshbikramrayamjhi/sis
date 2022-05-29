<?php
require_once "config/query.php";
// print_r($_POST);
if (isset($_GET['action']) && $_GET['action'] == 'changeProgram') { // for selecting subject 
   //name by program name in result table
   $subject = $obj->Select("tbl_subject", "*", "pid", $_POST['proname']);
?>

   <?php foreach ($subject as $s) { ?>
      <option value="<?= $s['subid']; ?>"><?= $s['sname']; ?></option>
<?php }
} ?>
<?php
if (isset($_GET['action']) && $_GET['action'] == 'changename') {
   //for selecting name from roll no in result and fee table   
   $name = $obj->Select("tbl_student", "*", "sid", $_POST['name']);
   $result = mysqli_fetch_assoc($name);
?>
   <input type=hidden name="sid" value="<?= $result['sid']; ?>">
   <p>Name : <?= $result['name']; ?></p>
<?php } ?>
<?php
if (isset($_GET['action']) && $_GET['action'] == 'changebatch') {
   //for selecting batch from roll no in result and fee table   
   $batch = $obj->Select("tbl_student", "*", "sid", $_POST['batch']);
   $result = mysqli_fetch_assoc($batch);
?>


   <input type=hidden name="batch" value="<?= $result['batch']; ?>">
   <p>Batch : <?= $result['batch']; ?></p>


<?php } ?>


<?php
if (isset($_GET['action']) && $_GET['action'] == 'changefeeprogram') {
   //for selecting program name from rollno fee table 
   $subject = $obj->Select("tbl_student join tlb_program on tlb_program.pid=tbl_student.pid", "*", "roll_no", $_POST['programname']);
   $result = mysqli_fetch_assoc($subject);
?>

   <label>Program name</label>
   <select name="pid" class="form-control">
      <option value="<?= $result['pid']; ?>"><?= $result['proname']; ?></option>
   </select>
<?php } ?>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'changeadmissiontotal') {
   //for selecting total admission name from rollno on  fee table 
   $subject = $obj->Select("fee_tbl JOIN batch_tbl on batch_tbl.bid = fee_tbl.bid", "*", "batch_tbl.batch", $_POST['admissiont']);
   $result = mysqli_fetch_assoc($subject);
?>


   <select name="feetype" class="form-control">
      <option value="<?= $result['fid']; ?>"><?= $result['amount']; ?></option>
   </select>
<?php } ?>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'changeadmissionremaining') {
   //for selecting  remaining admission name from rollno on  fee table 
   $subject = $obj->Select("tbl_fee", "*", "roll_no", $_POST['admissionr']);
   $result = mysqli_fetch_assoc($subject);
?>

   <label>Program name</label>
   <select name="remain_adm_fee" class="form-control">
      <option value="<?= $result['remain_adm_fee']; ?>"><?= $result['remain_adm_fee']; ?></option>
   </select>
<?php } ?>
 <?php
      if (isset($_GET['action']) && $_GET['action'] == 'showstudent') {

         $result = $obj->Select("tbl_student", "*", "batch", $_POST['batch']);
         $data = mysqli_fetch_assoc($result);
         ?>
         <button class="btn btn-danger" ><?=$data['batch']?>   BATCH IS IN <?=$data['semester']?> SEMESTER</button>
         
         <?php   
      ?>
      <!-- 
 //    <table border="5">
//    <tr>
//    <th>NAME</th>
//    <th>Roll_no</th>
   
//    </tr>
//    <?php
         //    foreach( $data as $d)
         //    { print_r($data);
         //       echo '<tr>';
         //       echo '<td>'.$d['name'].'</td>';
         //       echo '<td>'.$d['roll_no'],'</td>';
         //    }

         //    
      ?>
//    </tr>
// </table>
   <?php } ?> 
<?php
if (isset($_GET['action']) && $_GET['action'] == 'showfee') {

   //for selecting amount from fee type
   $batch = $obj->Select("fee_structure join batch_tbl on batch_tbl.bid=fee_structure.bid", "*", "fid", $_POST['showfee']);
   $result = mysqli_fetch_assoc($batch);

   if ($result['feetype'] == 'semester') { ?>
      <h1 class="btn btn-danger">TOTAL AMOUNT OF <?= $result['semester']; ?> SEMESTER= RS: <?= $result['amount']; ?></h1>
   <?php } else { ?>
      <h1 class="btn btn-danger">TOTAL ADMISSION AMOUNT OF BATCH <?= $result['batch'] ?> = RS: <?= $result['amount']; ?></h1>
   <?php }
}

if (isset($_GET['action']) && $_GET['action'] == 'show') {

   $sid = $_POST['roll'];
   $fid = $_POST['fee'];

   $total_amt = $obj->select('fee_structure', '*', 'fid', $fid);
   $total = mysqli_fetch_assoc($total_amt);
   $total = $total['amount'];
   $sql = "SELECT SUM(paying) as paid FROM fee_installment WHERE sid='$sid'";
   $paid = $obj->Query($sql);
   $paid = mysqli_fetch_assoc($paid);

   if ($paid['paid'] == '' || $paid['paid'] == null) {
      $paid = 0;
   } else {
      $paid = $paid['paid'];
   }
   $show = $total - $paid; ?>

   <div class="alert " style="color:#fff;background:green;width:55%;">
      Your total payable amount is Rs.<?= $show; ?>
   </div>

<?php } ?>