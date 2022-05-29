<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>menu bar</title>
    
</head>
<body>
<div class="col-sm-12 top-left">
<div class="col-sm-4" >
<p class="h2">STUDENT INFORMATION SYSTEM</p></div>
<div class="col-sm-8">
<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><img src="b.png" height="40px" width="40px" class="top-img"></a></li>
					<li><a href="#"><img src="c.png" height="40px" width="40px" class="top-img"></a></li>
					<li><a href="#"><img src="d.png" height="40px" width="40px" class="top-img"></a></li>
				</ul>
			</div>
		</div>
        
<div class="col-sm-12 top-right focus">
<ul class="nav navbar-nav navbar-left ">
<li ><a href="home.php">Home</a></li>
    <li class="nav-item"><a href="#"> Student &#9660;</a>
        <ul>
        <li class="nav-item"><a href="stdinsert.php"> Student insert</a></li>
        <li class="nav-item"><a href="stddisplay.php">student table</a></li>

        </ul>
</li>
    <li class="nav-item"><a href="#">Result &#9660;</a>
    <ul>
        <li class="nav-item"><a href="rltinsert.php">Result Insert</a></li>
        <li class="nav-item"><a href="rltdisplay.php">Result Display</a></li>
    </ul>
</li>
    <li class="nav-item"><a href="seminsert.php">Semester</a></li>
    <li class="nav-item"><a href="#">Subject &#9660;</a>
<ul>
<li class="nav-item"><a href="subinsert.php">Subject Insert</a></li>
<li class="nav-item"><a href="subdisplay.php">Subject table</a></li>
</ul>
</li>
<li class="nav-item"><a href="#">Program &#9660;</a><ul>
    <li class="nav-item"><a href="proinsert.php">Program</a></li>
    <li class="nav-item"><a href="prodisplay.php">program table</a></li>
    </ul>
</li>
<li class="nav-item"><a href="#">Fee &#9660;</a><ul>
<li class="nav-item"><a href="feeinsert.php">Fee Insert</a></li>
    <li class="nav-item"><a href="feedisplay.php">Fee table</a></li>
    </ul>
</li>
    
     <!-- <li class="nav-item"><a href="feedisplay.php">fee table</a></li> -->
    
    <!-- <li class="nav-item"><a href="logout.php">logout</a></li>
    </ul> -->
</div>
<!-- 
<style>
.top-left{font-weight: bold; text-align:center;
 font-family: "algerian"; background-color:black; 
}
ul {
        padding-left: 0;
            border: 1px solid #222;
        }
        ul li {
            text-align: center;
        }
        ul li a {
            color: #fff;
            display: block;
            padding: 10px;
            text-decoration: none;
            text-transform: uppercase;
        }


ul li a:hover li:hover li:focus{background:white; }


.top-img{border-radius: 50%;}
.top-right{
    background-color:black;
    

}
.h2
{
 color:white; 
}

ul li a:hover, ul li a:focus{
		color: #F00;
		background:#fff ;
        
		}
 .li{
    size: 50px;
}
ul li a {
            color: blue;
            background:black;
        }
ul ul {     
            position: absolute;
            width: 100%;
            display: none;
            top: 100%;
        }
 ul ul li {
            width: 100%;
            display: block;
        }
 ul li:hover ul {
            display: block;
        }
        

</style> -->


</body>
</html>