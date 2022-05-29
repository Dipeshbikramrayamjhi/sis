<?php
session_start();
if(!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] != 'successful'){
    header('Location:admin.php');
}
include("includes/header.php");
require ("config/config.php");
require ("config/query.php");
$result = $obj->Select('tbl_student join tlb_program on tlb_program.pid=tbl_student.pid','*','sid',$_SESSION['sid']);
$data = mysqli_fetch_assoc($result);
//print_r($data);
?>
<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                <?php
                if(!empty($data["photo"])){//photo xa ki nai vanna lai
    //echo "<td><img src='_MG_0446.JPG'width='50' height='50'/></td>";
    echo "<td><img src='../new_project/photo/".$data['photo']."'width='50' height='50'/></td>";
    }
    else
    {
        echo '<td> <img src ="noiamge.png "width="50" height="50"></td>';
    } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5 style="text-transform: uppercase;" >
                    <?=$data['name']?>
                    </h5>
                    <h6>
                        DIVYA GYAN  COLLEGE
                    </h6>
                    <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" href="result.php" role="tab" aria-controls="profile" aria-selected="false">RESULT</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div col-md-12>
       <p>
       </p>
        </div>
       
        <div class="row">

            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div class="text-center">
                        <table class="table table-hover table-responsive">

                        <tr class="info">
                                <th>ROLL NUMBER</th>
                                <td><b><?= $data['roll_no'] ?></b></td>
                            </tr>
                            <tr class="info">
                                <th>BATCH</th>
                                <td><b><?= $data['batch'] ?></b></td>
                            </tr>
                            <tr class="info">
                                <th>ADDRESS</th>
                                <td><b><?= $data['address'] ?></b></td>
                            </tr>
                            <tr class="info">
                                <th>PHONE</th>
                                <td><b><?= $data['phone'] ?></b></td>
                            </tr>
                            <tr class="info">
                                <th>EMAIL</th>
                                <td><b><?= $data['email'] ?></b></td>
                            </tr>
                        </table>
                    </div>
                </div>
                    <div class="col-sm-6">
                    <div class="text-center">
                        <table class="table table-hover table-responsive">
                        <tr class="info">
                            <th>GUARDAIN NAME</th>
                            <td><b><?= $data['guardian_name'] ?></b></td>
                        </tr>
                        <tr class="info">
                            <th>GUARDAIN NUMBER</th>
                            <td><b><?= $data['guardian_number'] ?></b></td>
                        </tr>
                        <tr class="info">
                            <th>PROGRAM NAME</th>
                            <td><b><?= $data['proname'] ?></b></td>
                        </tr>
                        <tr class="info">
                            <th>SEMESTER</th>
                            <td><b><?= $data['semester'] ?></b></td>
                        </tr>
                         </div>
                    </div>
            </div>
                        </table>
                     </div>
                </div>
            </div>
        </div>
        </form>
    </div>



<?php
include("includes/footer.php");
?>