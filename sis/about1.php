<?php
session_start();
if(!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] != 'success'){
    header('Location:admin.php');
}
include("includes/header.php");
require ("config/config.php");
require ("config/query.php");
$result = $obj->Select('tbl_student join tlb_program on tlb_program.pid=tbl_student.pid','*');
$data = mysqli_fetch_assoc($result);
?>


<div class="container emp-profile">
    <h1><?=$data['name']?></h1>
    <div class="col-sm-12">
            <div class="row">
        
            <div class="col-sm-6">
                <div class="row  text-center">
                 <table class="table table-striped table-responsive">
                   
                        <tr>
                        <th>ROLL NUMBER</th>
                        <td><b><?=$data['roll_no']?></b></td>
                        </tr>
                        <tr>
                        <th>BATCH</th>
                        <td><b><?=$data['batch']?></b></td>
                        </tr>
                        <tr>
                        <th>ADDRESS</th>
                        <td><b><?=$data['address']?></b></td>
                        </tr>
                        <tr>
                        <th>PHONE</th>
                        <td><b><?=$data['phone']?></b></td>
                        </tr>
                        <tr>
                        <th>EMAIL</th>
                        <td><b><?=$data['email']?></b></td>
                        </tr>
                        <tr>
                        <th>GUARDAIN NAME</th>
                        <td><b><?=$data['guardian_name']?></b></td>
                        </tr>
                        <tr>
                        <th>GUARDAIN NUMBER</th>
                        <td><b><?=$data['guardian_number']?></b></td>
                        </tr>
                        <tr>
                        <th>PROGRAM NAME</th>
                        <td><b><?=$data['proname']?></b></td>
                        </tr>
                        <tr>
                        <th>SEMESTER</th>
                        <td><b><?=$data['semester']?></b></td>
                        </tr>
                   </table>
                </div>
            </div>
            <div class="col-sm-6">
            <img src="./download.jpg" alt="Picture" width="70%" >
            </div>
        </div>
    </div>
     
</div>
<?php
include("includes/footer.php");
?>