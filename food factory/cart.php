<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$insert = false;
$email=$_SESSION['email'];
if($email)
{
$server="localhost";
$username="root";
$password="";

$con=mysqli_connect($server,$username,$password,'food_factory');

if(!$con)
{
    die("connection to this database failed".mysqli_connect_error());
}
$name=$_POST['iname'];
$price=$_POST['iprice'];
$cat=$_POST['icat'];
$r1na=$_POST['r1nam'];
if($_POST['h1email'])
$_SESSION['hotel']=$_POST['h1email'];
else if($_POST['h2email'])
$_SESSION['hotel']=$_POST['h2email'];

if($name)
{
$sqlss = "INSERT INTO `cart` (`email`, `itemname`, `itemprice` , `itemcat`) VALUES ('$email', '$name','$price', '$cat');";

if ($con->query($sqlss) === TRUE) {
    echo '<script>alert("Item Added To Cart successfully")</script>';
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
}
$query = mysqli_query($con,"SELECT cartid FROM cart WHERE email='$email'");
// if($name)
// header("refresh: 0; url = http://localhost/food%20factory/cart.php"); 
$str='';
$ar=array();
$x=0;

$co = mysqli_num_rows($query);

while($row1=mysqli_fetch_assoc($query))
{

    $ar[$x]=$row1['cartid'];
    $x++;
}
$len=count($ar);
for($i=0;$i<$len;$i++)
{
    $str=$str.$ar[$i]." ";
}
$_SESSION['id']=$str;
//echo$str;


$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body style="background-image:url('https://static.vecteezy.com/system/resources/previews/000/122/367/non_2x/vector-textured-grunge-background.jpg');">
    <header style="background-image:url(data:image/jpeg;base64,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);">
     <nav class="navbar navbar-dark navbar-expand-lg sticky-top border-bottom border-light" style="margin-top: -40px;">
         <div class="container-fluid"><a class="navbar-brand text-success" href="home.php"><i class="fa fa-ticket fa-2x"></i>&nbsp;<br>FOOD FACTORY</a><button class="navbar-toggler collapsed" style="height: 25px; background-color: #f5c527;
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
                     <li class="nav-item , hvr-float-shadow" role="presentation"><a class="nav-link" href="home.php#foot">Contact</a></li>
                     <li class="nav-item , hvr-float-shadow" role="presentation">
                     <?php
                     if($_SESSION["uloggedin"] === true)
                     {
                     ?><a class="nav-link" href="cart.php">Cart</a>
                     <?php
                     }
                     ?>
                     </li>
                    </ul>
         </div>
    </div>
    </nav>
 </header>
    <center><h1>YOUR CART</h1></center>
    <table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Category</th>
    </tr>
      </thead>
      <?php
     $con=mysqli_connect($server,$username,$password,'food_factory');
    if($_SESSION["uloggedin"])
    {
    $email=$_SESSION['email'];
    for($s=0;$s<$len;$s++)
    {
        $id=$ar[$s];
        $sq = mysqli_query($con,"SELECT * FROM cart where cartid='$id'");
        $co1 = mysqli_num_rows($sq);
        while($row=mysqli_fetch_assoc($sq))
        {
        ?>
        <html>   
            <tr>                  
            <td><?php
             echo $row['itemname'];
             ?></td>
              <td><?php
             echo 'Rs.'.$row['itemprice'];
             ?></td>
            <td><?php
             echo $row['itemcat'];
             ?></td>
            </tr>
             
            </html>
            <?php
        }
    }
    }
    else
    {
        header("location: loginuser.php");
    }?>   
     
    </tr>
</table>
<center><h4>TOTAL AMOUNT :-  <?php
    $server="localhost";
    $username="root";
    $password="";
    
    $con=mysqli_connect($server,$username,$password,'food_factory');
    $sqqq=mysqli_query($con,"SELECT sum(itemprice) from cart WHERE email='$email'");
    $row=mysqli_fetch_assoc($sqqq);
    echo "Rs.".$row['sum(itemprice)'];

   ?></h4> </center>

    <center><button style="background-color:#bdad8f;color:black;border:2px solid rgb(197, 223, 231);width:30%;height:30px" onclick="f1('<?php echo $r1na;?>')" >BACK TO MENU</button></center><br>
    <?php
    if($_SESSION['uloggedin'])
    {
    ?>
    <center><button style="background-color:#bdad8f;color:black;border:2px solid rgb(197, 223, 231);width:30%;height:30px" onclick="f2('<?php echo uniqid();?>','<?php echo $email;?>','<?php echo $str;?>','<?php echo $_POST['h1email'];?>','<?php echo $_POST['h2email'];?>')">ORDER</button></center>
    <?php
    }
    else
    {
        echo '<script>alert("User Can Only Order Food")</script>';
        header("location: loginuser.php");
    }
    $con->close();
    ?>
   
<form id="f3" action="menu.php" method="POST">
    <input type="email" id="sss" name="r2name" hidden>
</form>

<form id="f4" action="finalorder.php" method="POST">
    <input type="email" id="o1" name="oemail" hidden>
    <input type="text" id="o2" name="oid" hidden>
    <input type="text" id="o3" name="ostr" hidden>
    <input type="email" id="o4" name="h11email" hidden>
    <input type="email" id="o5" name="h22email" hidden>
</form>
<script>
function f1(a)
{
document.getElementById("sss").value=a;
var y=document.getElementById("f3").submit();
}
function f2(id,email,str,e1,e2)
{
    console.log(e1);
    console.log(e2);
    console.log(str);
    document.getElementById("o1").value=email;
    document.getElementById("o2").value=id;
    document.getElementById("o3").value=str;
    document.getElementById("o4").value=e1;
    document.getElementById("o5").value=e2;
    var z=document.getElementById("f4").submit();
}
</script>
</body>
</html>