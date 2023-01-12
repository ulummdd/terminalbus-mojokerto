<?php

include_once("config.php");
$id = $_GET['id'];
$result = mysqli_query($connect, "DELETE FROM users WHERE id=$id");
$resultt = mysqli_query($connect, "DELETE FROM kupon WHERE id_user=$id");
header("Location:user-data.php");

?>