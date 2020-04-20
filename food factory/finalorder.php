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
$oid=$_POST['oid'];
$oemail=$_POST['oemail'];
$ostr=$_POST['ostr'];
$e1=$_POST['h11email'];
$e2=$_POST['h22email'];
$arr=array();
$arr=explode(" ",$ostr);
$x=count($arr);

for($i=0;$i<$x-1;$i++)
{
    $id=$arr[$i];
    echo$id;
    $query = mysqli_query($con,"SELECT * FROM `cart` WHERE cartid='$id'");
    $row=mysqli_fetch_assoc($query);
    $oname=$row['itemname'];
    $oprice=$row['itemprice'];
    $ocat=$row['itemcat'];
    echo$oname;
    echo$oprice;
    echo $ocat;
    if($e1)
    {
        $femail=$$_SESSION['hotel'];
    }
    else
    {
        $femail=$_SESSION['hotel'];
    }
   // echo$femail;
   $sql = "INSERT INTO `order` (`orderid`, `email` , `hemail` , `itemname`, `itemprice` , `itemcat`) VALUES ('$oid', '$oemail','$femail','$oname','$oprice', '$ocat')";
   if ($con->query($sql) === TRUE) {
    echo '<script>alert("Order Processed")</script>';
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
 }
}
$sq1="DELETE FROM `cart` WHERE email='$oemail'";
 if($con->query($sq1) === TRUE)
 header("refresh: 0; url = http://localhost/food%20factory/home.php");
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-image:url('https://static.vecteezy.com/system/resources/previews/000/122/367/non_2x/vector-textured-grunge-background.jpg');">
    
</body>
</html>