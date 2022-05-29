<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Student management system</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" href="./css/select2.css">
  <link rel="stylesheet" href="./css/select2-bootstrap.css">
  <link rel="stylesheet" href="./css/custom.css">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
  <script src="lib/jquery/jquery.min.js"></script>

</head>

<body>
<section id="container">
<header class="header black-bg">
      
      <!--logo start-->
      <a href="index.html" class="logo"><b>S<span>M</span>S</b></a>
      <!--logo end-->
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="logo.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">SMS</h5>
          <li class="mt">
            <a class="active" href="home.php">
              <i class="fa fa-dashboard"></i>
              <span>home</span>
              </a>
          </li>
          <?php //if($_SESSION['email']=='dipesh@gmail.com'){ ?>
            
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>STUDENT</span>
              </a>
            <ul class="sub">
              <li><a href="stdinsert.php">Insert Student</a></li>
              <li><a href="stddisplay.php">Display Student</a></li>
              
            </ul>
          </li>
          <?php
          //} ?>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>RESULT</span>
              </a>
            <ul class="sub">
              <li><a href="rltinsert.php">Insert Result</a></li>
              <li><a href="rltdisplay.php">Display Result</a></li>
              </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>SUBJECT</span>
            </a>
            <ul class="sub">
              <li><a href="subinsert.php">Insert Subject</a></li>
              <li><a href="subdisplay.php">Display Subject</a></li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Program</span>
            </a>
            <ul class="sub">
              <li><a href="proinsert.php">Insert Program</a></li>
              <li><a href="prodisplay.php">Display Program</a></li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>FEE</span>
            </a>
            <ul class="sub">
              <!-- <li><a href="feeinsert.php">Insert FEE</a></li> -->
              <li><a href="feedisplay.php">Display FEE</a></li>
              <!-- <li><a href="feepay.php">PAY FEE</a></li> -->
              <li><a href="feestructure.php">feestructure</a></li>
              <li><a href="installment.php">Installment fee</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="sub" href="seminsert.php">
              <i class="fa fa-desktop"></i>
              <span>Semester</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="sub" href="batchinsert.php">
              <i class="fa fa-desktop"></i>
              <span>Batch</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="sub" href="upgrade.php">
              <i class="fa fa-desktop"></i>
              <span>UPGRADE</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Student Login Form</span>
            </a>
            <ul class="sub">
              <li><a href="Sadminfrom.php">Create Id</a></li>
              <li><a href="Sadmindisplay.php">Display Id</a></li>
              
            </ul>
          </li>

          
          
         
         
         
         
         
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <section id="main-content">
      <section class="wrapper">
          <div class="container-fluid">
        <div class="row">