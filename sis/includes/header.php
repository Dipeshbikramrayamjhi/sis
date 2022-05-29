<!DOCTYPE html>
<html>

<head>
    <title>STUDENT INFORMATION SYSTEM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="shortcut icon" href="logo.png.crdownload">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

</head>

<body>
<?php if($_SERVER['REQUEST_URI']=='/sis/index.php' || $_SERVER['REQUEST_URI']=='/sis/'){ ?>
    <div class="bg">
<?php
 

} ?>
    <nav class="col-sm-12 nave">
        <div class="col-sm-12">
            <div class="col-sm-4 top-left">
                <h1><a href='index.php'> DIVYA GYAN COLLEGE</a></h1>

            </div>
            <div class="col-sm-8">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="https://www.facebook.com/divyagyancollege"><img src="b.png" height="60px" width="60px" class="top-img"></a>
                    </li>
                    <li>
                        <a href="https://divyagyan.edu.np/"><img src="aaa.png" height="60px" width="60px" class="top-img"></a>
                    </li>
                   
                   
                </ul>
            </div>
        </div>
        <?php if($_SERVER['REQUEST_URI']=='/sis/index.php' || $_SERVER['REQUEST_URI']=='/sis/'){ ?>
    <div class="g">
    <div class="col-sm-12">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <ul class="nav navbar-nav navbar-right menu">
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="result.php">RESULT</a></li>
                    <li><a class="btn btn-danger" href="logout.php">LOG OUT</a></li>

                </ul>
            </div>
        </div>     
<?php
} ?>
        
        
</nav>
    <?php if($_SERVER['REQUEST_URI']=='/sis/index.php' || $_SERVER['REQUEST_URI']=='/sis/'){ ?>
        </div>
    <?php

    } ?>
   



