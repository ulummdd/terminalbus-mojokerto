<?php 
 
$server = "localhost";
$user = "root";
$pass = "";
$database = "busmojokerto";
 
$connect = mysqli_connect($server, $user, $pass, $database);
 
if(!$connect){
    die("<script>alert('error')</script>");
}
 
?>