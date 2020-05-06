<?php
$insert = false;
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if(isset($_POST['rname']))
{
//set connection variable
$server="localhost";
$username="root";
$password="";

//create a connection
$con1=mysqli_connect($server,$username,$password,'food_factory');

//check for connection success
if(!$con1)
{
    die("connection to this database failed".mysqli_connect_error());
}

//collect POST variables
$rname=$_POST['rname'];
$rphone=$_POST['rphone'];
$remail=$_POST['remail'];
$rpassword1=$_POST['rpassword'];
$rrepassword=$_POST['rrpassword'];
$raddress=$_POST['raddress'];

$query = mysqli_query($con1,"SELECT email FROM restaurants WHERE email='$remail'");
$count = mysqli_num_rows($query);

  if ($count == 1)
  {
      echo '<script>alert("This E-Mail is already registered")</script>';
      header("refresh: 0; url = http://localhost/food%20factory/restaurant.php"); 
  }
  else
  {
    //check if passwords match
    if($rpassword1==$rrepassword)
    {
    $sql1 = "INSERT INTO `food_factory`.`restaurants` ( `rname`, `phone`, `email`, `password`, `address`, `dt`) VALUES ( '$rname', '$rphone', '$remail', '$rpassword1', '$raddress', CURRENT_TIMESTAMP);";
    //execute the query
    if($con1->query($sql1) == true)
    {
    //flag for successfull insertion
    $insert="true";
    }
    else
    {
    echo "error:$sql1 <br> $con1->error";
    }
    }
    else
    {
    echo '<script>alert("Passwords Do Not Match")</script>';
    header("refresh: 0; url = http://localhost/food%20factory/restaurant.php"); 
    }
  }  

//echo "succesfully inserted"
//close the dB connection
$con1->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image:url('https://static.vecteezy.com/system/resources/previews/000/122/367/non_2x/vector-textured-grunge-background.jpg');">
<header style="background-image:url(data:image/jpeg;base64,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);">
     <nav class="navbar navbar-dark navbar-expand-lg sticky-top border-bottom border-light" style="margin-top: -40px;">
         <div class="container-fluid"><a class="navbar-brand text-success" href="home.php"><i class="fa fa-ticket fa-2x"></i>&nbsp;<br>FOOD FACTORY</a><button class="navbar-toggler collapsed" style="height: 25px; background-color: #f5c527;
         border: 2px solid black;" data-toggle="collapse" data-target="#navcol-1"><span></span><span></span><span></span></button>
             <div class="collapse navbar-collapse p-4" id="navcol-1">
                 <ul class="nav navbar-nav ml-auto">
                 <li class="nav-item , hvr-float-shadow" role="presentation"><a class="nav-link" href="home.php">Home</a></li>
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
                     <li class="nav-item , hvr-float-shadow" role="presentation"><a class="nav-link" href="home.php#mh">Restaurants</a></li>
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
<center><div class="container" style="background-image:url('bg.jpg');color:'black';">
    <a href="index.php"><button id="bid1"><b>REGISTER AS CUSTOMER</b></button></a><a href="restaurant.php"><button id="bid1"><b>REGISTER AS RESTAURANT</b></button></a>
        <h1>RESTAURANT REGISTERATION FORM</h1>
        <?php
        if($insert==true)
        {
        echo "<p>thanks for submitting</p>";
        }
        ?>
        <form action="restaurant.php" method="POST">
            <input type="text" name="rname" placeholder="enter your restaurant name" required>
            <input type="tel" name="rphone" placeholder="enter your contact-no" required>
            <input type="email" name="remail" placeholder="enter your email-id" required>
            <input type="password" name="rpassword" placeholder="enter your password" required> 
            <input type="password" name="rrpassword" placeholder="re-enter your password" required>
            <input type="text" name="raddress" placeholder="enter restaurant address" required>
            <br><br>
            <button class="btn" id=submitbut1>Submit</button>
        </form>
        <a href="loginrestaurant.php">Already Registered...?click here to login.</a>
        </div></center>
    <script src="index.js"></script>

</body>
</html>