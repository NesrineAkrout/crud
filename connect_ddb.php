<?php 

$host = "localhost";
$username = "root";
$password ="";
$dbname ="crud" ;
$conn = mysqli_connect($host , $username ,$password , $dbname);
//check connection
if(!$conn){
    die("connection failed: ".mysqli_connect_error());
}
?>