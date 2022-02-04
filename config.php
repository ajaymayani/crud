
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "crud";

$con = new  mysqli($servername,$username,$password,$dbName);

if($con->connect_error){
    die("connection failed --> ");
}
?>