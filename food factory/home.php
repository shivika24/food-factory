<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
    $server="localhost";
    $username="root";
    $password="";        
    $con=mysqli_connect($server,$username,$password,'food_factory');   
    
    if(!$con)
    {
        die("connection to this database failed".mysqli_connect_error());
    }
    
    $email=$_SESSION['email'];
    $sql = mysqli_query($con,"SELECT rname FROM restaurants");
    $sql1 = mysqli_query($con,"SELECT email FROM restaurants");
    $x = mysqli_num_rows($sql);
?>
<!DOCTYPE html>
<html>
<head>  
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Categories</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="style1.css">
</head>
<script>
var myVar;

function gifloader() {
myVar = setTimeout(showPage, 3000);
}

function showPage() {
document.getElementById("loader").style.display = "none";
document.getElementById("myDiv").style.display = "block";
}
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

<body background="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpmA1z3W99mjNuUui3WzimnXK53OPoD07IWRWIxLV2tSHjfUpY" style="background-size:cover;" onload="gifloader()">
<div style="height:100vh; width:100vw; background-image:url(https://cdn.dribbble.com/users/131684/screenshots/1368380/beingdad_v02.gif); background-repeat:no-repeat; background-size:cover;" id="loader" >
    
</div>
<div id="myDiv" style="display:none;">
<div>
 <header style="background-image:url(data:image/jpeg;base64,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);">
     <nav class="navbar navbar-dark navbar-expand-lg sticky-top border-bottom border-light" style="margin-top: -40px;">
         <div class="container-fluid"><a class="navbar-brand text-success" href="#header"><i class="fa fa-ticket fa-2x"></i>&nbsp;<br>FOOD FACTORY</a><button class="navbar-toggler collapsed" style="height: 25px; background-color: #f5c527;
         border: 2px solid black;" data-toggle="collapse" data-target="#navcol-1"><span></span><span></span><span></span></button>
             <div class="collapse navbar-collapse p-4" id="navcol-1">
                 <ul class="nav navbar-nav ml-auto">
                     <li class="nav-item , hvr-float-shadow" role="presentation">
                     <?php
                     if($_SESSION["uloggedin"] === true || $_SESSION["loggedin"] === true)
                     {
                     ?><a class="nav-link" href="logout.php">Logout</a>
                     <?php
                     }
                     else
                     {
                         ?>
                         <a class="nav-link" href="loginuser.php">Login & SignUp</a>
                         <?php

                     }
                     ?>                   
                    </li>
                     <li class="nav-item , hvr-float-shadow" role="presentation"><a class="nav-link" href="#mh">Restaurants</a></li>
                     <li class="nav-item , hvr-float-shadow" role="presentation">
                     <?php
                     if($_SESSION["loggedin"] === true)
                     {?>
                     <a class="nav-link" href="aboutr.php">Profile</a></li>
                     <?php
                     }
                     else if($_SESSION["uloggedin"] === true)
                     {
                     ?>
                     <a class="nav-link" href="aboutu.php">Profile</a></li>
                     <?php
                     }
                     ?>  
                     <?php
                     if($_SESSION["loggedin"] === true)
                     {?>
                     <a class="nav-link" href="rhome.php">Restaurant Panel</a></li>
                     <?php
                     }
                     ?>
                     <li class="nav-item , hvr-float-shadow" role="presentation"><a class="nav-link" href="#foot">Contact</a></li>
                    </ul>
         </div>
    </div>
    </nav>
 </header>
 <marquee><img src="bike.png" height="100px"><img src="statue.png" height="100px"><img src="bike.png" height="100px"><img src="statue.png" height="100px"></marquee>
 <style type="text/css">
  .navbar-dark .navbar-nav .nav-link
     {
         color: black;
         font-size: 20px;
     } 
 </style>
</div>

<div id="slides">
<a><img src="https://www.austinchronicle.com/binary/06b9/food_feature1-1.jpg" id="oo" class="slidee"></a>
<a><img src="https://fondue.bg/wp-content/uploads/2019/09/italiancuisine.jpg" class="slidee"></a>
<a><img src="https://drop.ndtv.com/albums/COOKS/pasta-vegetarian/pastaveg_640x480.jpg" class="slidee"></a>
<a><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRGg-vD1a-xD3DDF4KzBK6AwVhsNfz0bInQ3LDTnIKgNDG0EKFy&usqp=CAU" class="slidee"></a>
<a><img src="https://img.fixthephoto.com/blog/UserFiles/Image/111/Image/40-dark-food-photography-tips_640x640.jpg" class="slidee"></a>
<a><img src="https://b.zmtcdn.com/data/pictures/chains/4/18757684/90a6f03eca32085fd3f3f2c728ee4f4e.jpg" class="slidee"></a>
<a><img src="https://media.eggs.ca/assets/RecipePhotos/_resampled/FillWyIxMjgwIiwiNzIwIl0/Fluffy-Pancakes-New-CMS.jpg" class="slidee"></a>
<a><img src="https://i.pinimg.com/originals/20/df/16/20df166dfdb5b70e095c79a9ab0228df.jpg" class="slidee"></a>

</div>

<style type="text/css">
.slidee
{
 display: none;
 width: 100%;
 height: 400px;
}

#oo
{
 display: block;

}

</style>
<script type="text/javascript">
var i=0;
function fun()
{
 var a=document.getElementsByClassName('slidee');
 for(var j=0;j<a.length;j++)
 {
     a[j].style.display="none";
 }
 a[i].style.display="block";
 if(i==7)
 {
     i=0;
     fun();
 }
 i++;
 
}
setInterval(fun,1500);
</script>
<script type="text/javascript">

</script>
<br>
<div class="container">
<center><h3 id="mh">Our Partenered Restaurant's</h3></center>
<br>
<div class="row">
<?php
if($x>0)
{
while($row=mysqli_fetch_assoc($sql))
{$row1=mysqli_fetch_assoc($sql1)?>
<div class="col-md-3">
<div class="card" style="width:'10px';">
<img src="data:image/jpeg;base64,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" style="height:'2px';" onclick="bigme('<?php echo $row1['email'];?>')">
<p class="card-title"><center><?php echo $row['rname'];?></center></p>
</div>
</div>
<?php
}
?>
<?php
}
?>
</div>
</div>
<br>

<style type="text/css">
#b1,#b2,#b3
{
font-size: 25px;
}
#bb1,#bb2 ,#bb3
{
 font-size: 45px;
}
</style>
<section>

<div  id="b2" style=" background:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNshvkAHm1L1dYpx0cZIIIt4DtD6ADvB2muTm1mCpRf_ZnuCLMyQ);">
<center><p id="bb2">Order Food Online From Food Factory </p></center>
Food Factory is an Indian restaurant aggregator and it is a start up founded by Shivika Singla.Food Factory provides information, menus and user-reviews of restaurants, and also has food delivery options from partner restaurants in select cities.<br><br>
</div>

</section>








<div id="foot" class="footer-dark">
 <footer>
     <div class="container">
         <div class="row"> 
             <div class="col-sm-6 col-md-3 item">
                 <h3>Services</h3>
                 <ul>
                     <li><a href="#">Web design</a></li>
                     <li><a href="#">Development</a></li>
                     <li><a href="#">Designing</a></li>
                     <li style="color:rgb(146,157,164);"></li>
                 </ul>
             </div>
             <div class="col-sm-6 col-md-3 item">
                 <h3>About</h3>
                 <ul>
                     <li><a href="#">Company</a></li>
                     <li><a href="#">Team</a></li>
                     <li><a href="#">Careers</a></li>
                 </ul>
             </div>
             <div class="col-md-6 item text">
                 <h3 style="font-size:25px;">FOOD FACTORY</h3>
                 <p>Give me a miss call on&nbsp;</p>
                 <p>+91 9988655750<br></p>
                 <p>shivikasingla24@gmail.com</p>
             </div>
             <div class="col item social "><a href="#"><i class="icon ion-social-facebook "></i></a><a href="#"><i class="icon ion-social-twitter "></i></a><a href="#"><i class="icon ion-social-snapchat "></i></a><a href="#"><i class="icon ion-social-instagram "></i></a></div>
         </div>
         <p class="copyright">Foodfactory © 2020</p>
     </div>
 </footer>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/-Fixed-Navbar-start-with-transparency-background-BS4-.js"></script>
<script src="assets/js/Bootstrap-4-Navbar-with-Logo-Image-Brand-Name-and-Responsive-Menu.js"></script>
<script src="assets/js/Bootstrap-4-Navbar-with-Logo-Image-Brand-Name-and-Responsive-Menu.js"></script>
<script src="assets/js/Bootstrap-4-Navbar-with-Logo-Image-Brand-Name-and-Responsive-Menu.js"></script>
<script src="assets/js/MUSA_navbar-metro.js"></script>
<script src="assets/js/SO-Floating-Nav_v10.js"></script>
<script type="search.js"></script>
</body>
<form id="f1" action="menu.php" method="POST">
<input type="email" id="ss" name="r1name" hidden>
</form>
<script>
function bigme(a)
{
document.getElementById("ss").value=a;
var y=document.getElementById("f1").submit();
}
</script>
</div>
</section>
</div>
</body>
</html>

