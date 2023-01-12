<?php

include_once("config.php");
$id_kupon = $_GET['id_kupon'];
$result = mysqli_query($connect, "DELETE FROM kupon WHERE id_kupon=$id_kupon");
header("Location:coupon-admin.php");

?>