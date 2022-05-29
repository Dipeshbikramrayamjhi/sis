<?php
session_start();
if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] != 'successful') {
    header('Location:admin.php');
}
include("includes/header.php");
require("config/config.php");
require("config/query.php");
$result = $obj->Select('tbl_student join tlb_program on tlb_program.pid=tbl_student.pid','*','sid',$_SESSION['sid']);
$data = mysqli_fetch_assoc($result);
// print_r($data);
?>
<div class="container emp-profile">
    <div class="row">

        <div class="col-md-4">
            <div class="profile-img">
                <?php
                if (!empty($data["photo"])) { //photo xa ki nai vanna lai
                    echo "<td><img src='../new_project/photo/".$data['photo']."'width='50' height='50'/></td>";
                } else {
                    echo '<td> <img src ="noiamge.png "width="50" height="50"></td>';
                } ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5  style="text-transform: uppercase;">
                    <?= $data['name'] ?>
                </h5>
                <h6>
                    DIVYA GYAN COLLEGE
                </h6>
                <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" href="about.php" role="tab" aria-controls="home" aria-selected="true">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" href="result.php" role="tab" aria-controls="profile" aria-selected="false">RESULT</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
        </div>
    </div>

    <div col-md-12>
        <p>
        </p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form method="post" action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name='semester' class="form-control" required>
                                <option selected disabled>CHOOSE SEMESTER</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                            </select>
                        </div>
                        <select name="term" class="form-control">
                            <option selected disabled>CHOOSE TERM</option>
                            <option>First term</option>
                            <option>Mid term</option>
                            <option>Final term</option>
                        </select>
                        <button name="search" value="search" class="btn btn-primary">SEARCH</button>
                    </div>
                </div>
        </div>
    </div>

    </form>
    <?php
    if (isset($_POST['search'])) {
        $Result = $obj->Select("tbl_result join tbl_student on tbl_student.sid=tbl_result.sid join tlb_program on 
   tlb_program.pid= tbl_result.pid join tbl_subject on tbl_subject.subid=tbl_result.subid where tbl_result.semid=" . $_POST['semester'] . "
   AND term='" . $_POST['term'] ."' AND tbl_student.roll_no='".$_SESSION['roll_no']."' ", "*");
        $rows = mysqli_num_rows($Result);
        //   print_r($rows);
        if ($rows>0) {
    ?>
            <table class="table table-brodered">
                <tr>
                    <th>S.N</th>
                    <th>Semester</th>
                    <th>Term</th>
                    <td>Subject</td>
                    <th>Full Marks</th>
                    <td>Pass Marks</td>
                    <th>Obtained Marks</th>
                    <td>Percentage</td>
                    <th>Grade</th>
                    <th>Result</th>
                    <?php
                    $i = 1;

                    while ($row = mysqli_fetch_assoc($Result)) {
                        //   echo"<pre>";
                        //  print_r($row);
                        //  echo"</pre>";


                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $row["semid"] . "</td>";
                        echo "<td>" . $row["term"] . "</td>";
                        echo "<td>" . $row["sname"] . "</td>";
                        echo "<td>" . $row["fullmarks"] . "</td>";
                        echo "<td>" . $row["passmarks"] . "</td>";
                        echo "<td>" . $row["obt_marks"] . "</td>";
                        echo "<td>" . $row["percentage"] . "</td>";
                        echo "<td>" . $row["grade"] . "</td>";
                        echo "<td>" . $row["result"] . "</td>";
                        echo "<tr>";
                    }
                    ?>
                </tr>
            </table>
    <?php
        } else {

            echo "<h1  style='text-transform: uppercase;'>   NO DATA TO BE SHOWN OF" . ' ' . $_POST['semester'] . ' ' . 'SEMESTER' . '  ' . 'AND' . '  ' . $_POST['term'] . "</h1>";
        }
    }

    ?>
</div>
<?php
include("includes/footer.php");
?>